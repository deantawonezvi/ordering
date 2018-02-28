@extends('mail.layout')

@section('tr1')
    You are receiving this email because this email address has been used on {{config('app.name')}}.
    <p>An account has been created and is awaiting approval by the system admin</p>
@endsection

@section('tr2')
@endsection

@section('tr3')
    <p>If you did not register on our platform please contact <code>it@getcash.co.zw</code>. Someone may have illegally used your email address.</p>
@endsection