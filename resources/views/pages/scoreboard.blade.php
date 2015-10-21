@extends('app')

@section('content')
    <h1>Scoreboard for {{$data['game']->name}}</h1>

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
                </tr>

            @endforeach
        </table>
    </div>



@stop