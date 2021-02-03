@extends('app.master') {{--jarangum enq--}}
@section('css')
    <link rel="stylesheet" href="css/login.css">
@endsection
@section('title','Login')

@section('content')
<div>
    <div class="col-4 mx-auto loginForm">
        <form class="mx-auto text-center" action="/login" method="post">
{{--            <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            @csrf
            <h6 class="text-center mb-4 mt-4">Login</h6>
            <div class="mb-3">
                <input type="email" name="email" class="form-control  mx-auto" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control  mx-auto" id="exampleInputPassword1" placeholder="password">
            </div>
            <button type="submit" class="btn btn-primary mx-auto px-5">Submit</button>
            <div class="mt-5 p-3 fagot">
                Fargot Password?
            </div>
        </form>
    </div>
</div>
@endsection
