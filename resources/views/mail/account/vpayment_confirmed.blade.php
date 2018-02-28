@extends('mail.account.layout')

@section('tr1')
    A v-payment has been made for the Tsamba platform.
@endsection

@section('tr2')
    {{json_encode($data)}}
@endsection

@section('tr3')
@endsection