@extends('app.master') {{-- ժառանգում ենք --}}
@section('css')
    <link rel="stylesheet" href="css/welcome.css">
@endsection
@section('title','Welcome')

@section('content') {{-- սեկցիայի մեջ ենք վերցնում--}}

<h3>Welcome</h3>
<table class="table table-dark table-borderless">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Age</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
        <td>{{$user['id']}} </td>
        <td>{{$user['first_name']}} </td>
        <td>{{$user['last_name']}} </td>
        <td>{{$user['age']}} </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
{{--{!!  !!}--}} {{--senc html teger@ tpelu a--}}
{{--htmlspecialcharset {{}}--}}



