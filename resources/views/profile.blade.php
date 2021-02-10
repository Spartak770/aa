@extends('app.master')


@section('content')

    <h1>Welcome {{ $user->name }}</h1>
    <small>{{ $user->email }}</small>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" class="btn btn-primary" value="logout">
            </form>
        </div>
    </div>
    <div class="form-control">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('post-create') }}" class="btn btn-info">New Post</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @foreach($posts as $post)
                <div class="col-md-12">
                    <h2>{{ $post->data }}</h2>
                    <small>{{ $post->user->name }}</small>
                    <small>{{ $post->created_at }}</small>
                </div>
                <hr>
            @endforeach
        </div>
    </div>


@endsection
