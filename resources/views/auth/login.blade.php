@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="/auth/login">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Employee Number</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Subscription Code</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="password">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')


<!-- resources/views/auth/login.blade.php -->

<form method="POST" action="/auth/login">
{!! csrf_field() !!}

<div>
    Email
    <input type="email" name="email" value="{{ old('email') }}">
</div>

<div>
    Password
    <input type="password" name="password" id="password">
</div>

<div>
    <input type="checkbox" name="remember"> Remember Me
</div>

<div>
    <button type="submit">Login</button>
</div>
</form>

@endsection