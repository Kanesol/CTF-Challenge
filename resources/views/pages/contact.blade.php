@extends('app')

@section('log')
    @if(isset($user))
        <li><a href="/auth/login">Log In</a></li>
    @else
        <li><a href="/auth/logout">Log Out</a></li>    
    @endif
@stop

@section('content')
    <h1>Help?!!!!</h1>
    There is no help!
@stop