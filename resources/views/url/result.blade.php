@extends('layout')

@section('content')
    <h1 class="title">Your code is :  </h1>
    <a href="{{url( $url -> url)}}" target="_blank">{{$url -> short}}</a>
@endsection