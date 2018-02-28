@extends('mail.account.layout')

@section('title', 'Email Confirmation')


@section('tr1')
    <h3> You are receiving this email because we received a registration request and you must confirm your email before
        it's completed.
    </h3>
@endsection

@section('tr2')
    <a href="{{ url('/register/confirm')}}/{{$user->token}}" style="font-family: Avenir,Helvetica,sans-serif;
    box-sizing: border-box;
    border-radius: 3px;
    color: #fff;
    display: inline-block;
    text-decoration: none;
    background-color: #9c27b0;
    border-top: 10px solid #9c27b0;
    border-right: 18px solid #9c27b0;
    border-bottom: 10px solid #9c27b0;
    border-left: 18px solid #9c27b0;
margin: 50px">CONFIRM</a>
@endsection

@section('tr3')
    <p>If you did not register on our website no further action is required from you.
        Your email address will be removed from our database in a few days if left unconfirmed</p>
@endsection

@section('small-print')
    If you’re having trouble clicking the "Confirm" button, copy and paste the URL below into your web browser:
    <br>
    <a href="{{ url('/register/confirm')}}/{{$user->token}}">{{ url('/register/confirm')}}/{{$user->token}}</a>
@endsection