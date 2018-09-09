<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

use App\Post;
use App\Profile;
use App\Category;
use App\Tag;
use App\User;

use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $noOfPosts = count(Post::all());
        $noOfUsers = count(User::all());

        return view('admin.dashboard', compact('noOfPosts', 'noOfUsers'));
    }


    // User Management
    public function users()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function usersAdd()
    {
        return view('admin.users.add');
    }

    public function usersSave(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('reader');

        // Create a Profile for a new user on registration
        Profile::create([
            'user_id'   => $user->id,
            'username'  => "user".rand(10000,99999)
        ]);

        // return view('admin.users.index');
        session()->flash('success', 'User was successfully created');
        return redirect('/admin/users/add');
    }

    public function usersDelete(User $user)
    {


        // Before deleting user
        // Remove Role
        // $roles = $user->roles; //This will return an Eloquent collection instead of a Spatie\Permission\Contracts\Role interface
        $user->syncRoles([]); // An empty set will remove all roles and add none back(empty array)

        // Delete Profile
        if (($user->profile))
        {
            $user->profile->delete();
        }
        
        // Delete all comments
        $user->comments()->delete();
        // Delete all Post
        $user->posts()->delete();

        // Then delete the user
        $user->delete();
        // Because user might have post we wont be deleting the user completely

        session()->flash('success', 'User was deleted successfully');

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
