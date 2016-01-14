@extends('app')
@section('log')
    <li id="countdown1"></li>
    @if(isset($user))
        <li><a href="/auth/login">Log In</a></li>
    @else
        <li><a href="/auth/logout">Log Out</a></li>    
    @endif
@stop
@section('content')
    <h1>Scoreboard</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Score
                </th>
                <th>
                    Last Submit
                </th>
            </tr>
            </thead>
            @foreach($data['scores'] as $score)
                <tr>
                    <td>
                        {{$score->name}}
                    </td>
                    <td>
                        {{$score->Total}}
                    </td>
                                        <td>
                        {{$score->time}}
                    </td>
                </tr>

            @endforeach
        </table>
    </div>



@stop