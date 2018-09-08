<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Mail\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('contactmail');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('home', compact('posts'));
    }


    public function contactmail(Request $request)
    {
        $this->validate(request(), [
          'name'    => 'required|min:2|max:190',

          'email'   => 'required|email|min:5',

          'subject' => 'min:2',

          'message' => 'required|min:2'
        ]);

        $user = auth()->user();

        // return new \App\Mail\Contact($request);

        // Send a Mail to the Help Desk <helpdesk@example.com>
        \Mail::to('helpdesk@example.com', 'Help Desk')->send(new Contact($request));
        // Then
        // Send a mail to the user, tell them their mail has been recieved
        // \Mail::to($request->email, $request->name)->from('helpdesk@example.com', 'Help Desk')->send(new Contactconfirm($request));
        // 
        // $message = [
        //     'subject' = '',
        //     'body' = ''
        // ];
        // \Mail::raw('hello world', function($message) {
        //     $message->subject('message subject')->to('test@example.org');
        // });

        session()->flash('success', 'Message Sent');
        session()->flash('message', 'We will get back to you in no time');

        return redirect('/contact');
        // return redirect()->back();

    }

}
