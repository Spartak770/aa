@extends('app.master')

@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="/me/edit" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="name" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" name="password" class="form-control" id="pwd">
            </div>
            <div class="form-group">
                <label for="file">image:</label>
                <input type="file" name="image" class="form-control" id="file">
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
