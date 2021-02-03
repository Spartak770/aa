@extends('app.master') {{--jarangum enq--}}
@section('css')
    <link rel="stylesheet" href="css/login.css">
@endsection
@section('title','Signup')
@section('content')
    <div>
        <div class="col-4 mx-auto loginForm">
            <form class="mx-auto text-center" action="/signup" method="post">
{{--                <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                @csrf
                <h6 class="text-center mb-4 mt-4">Signup</h6>

                <div class="mb-3">
                    <input type="text" name="name" class="form-control  mx-auto" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name">
                </div>

                <div class="mb-3">
                    <input type="number" name="age" class="form-control  mx-auto" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="age">
                </div>

                <div class="mb-3">
                    <input type="email" name="email" class="form-control  mx-auto" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email">
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control  mx-auto" id="exampleInputPassword1" placeholder="password">
                </div>
                <button type="submit" class="btn btn-primary mx-auto px-5 mb-2">Submit form</button>
            </form>
        </div>
    </div>
@endsection
