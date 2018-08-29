@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- You are logged in! --}}

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Title</th>
                                            <th>Date Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ url('/posts') }}/{{ $post->slug }}">{{ $post->title }}</a></td>
                                                <td>{{ $post->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('/posts') }}/{{ $post->slug }}/edit" class="btn btn-warning btn-sm" style="border-radius: 0;">Edit</a>
                                                    <a class="btn btn-danger btn-sm" style="border-radius: 0;" href="" 
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('delete-post').submit();">
                                                        Delete
                                                    </a>
                                                    <form id="delete-post" action="{{ url('/posts') }}/{{ $post->slug }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
