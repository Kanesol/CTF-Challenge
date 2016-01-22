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

@section('script')

    @if($data['start'])
        <script>

        var date;
        $.get( "/api/get_start", function( data ) {
            date = data;
                


            // set the date we're counting down to
            var target_date = new Date(date).getTime();


            // variables for time units
            var days, hours, minutes, seconds;
             
            // get tag element
            var countdown = document.getElementById('countdown1');

            // update the tag with id "countdown" every 1 second
            setInterval(function () {
             
                
                // find the amount of "seconds" between now and target
                var current_date = new Date().getTime();
                var seconds_left = (target_date - current_date) / 1000;
                
                // do some time calculations
                days = parseInt(seconds_left / 86400);
                seconds_left = seconds_left % 86400;
                 
                hours = parseInt(seconds_left / 3600);
                seconds_left = seconds_left % 3600;
                 
                minutes = parseInt(seconds_left / 60);
                seconds = parseInt(seconds_left % 60);
                 
                // format countdown string + set tag value
                countdown.innerHTML = '<a> <b> Time to Start: </b>' + days +  ' <b>Days</b> ' + hours + ' <b>Hours</b> '
                + minutes + ' <b>Minutes</b> ' + seconds + ' <b>Seconds</b>';  
             
            }, 1000);

        });
        </script>
    @else
        <script>

        $.get( "/api/get_finish", function( data ) {

                
            // set the date we're counting down to
            var target_date = new Date(data).getTime();

            // variables for time units
            var days, hours, minutes, seconds;
             
            // get tag element
            var countdown = document.getElementById('countdown1');

            if (countdown!= null)
            {
                 // update the tag with id "countdown" every 1 second
                setInterval(function () {
                 
                    
                    // find the amount of "seconds" between now and target
                    var current_date = new Date().getTime();

                    var seconds_left = (target_date - current_date) / 1000;
                    
                    // do some time calculations
                    days = parseInt(seconds_left / 86400);
                    seconds_left = seconds_left % 86400;
                     
                    hours = parseInt(seconds_left / 3600);
                    seconds_left = seconds_left % 3600;
                     
                    minutes = parseInt(seconds_left / 60);
                    seconds = parseInt(seconds_left % 60);
                     
                    // format countdown string + set tag value
                    countdown.innerHTML = '<a> <b>Time Remaining:</b> ' + days +  ' <b>Days</b> ' + hours + ' <b>Hours</b> ' + minutes + ' <b>Minutes</b> ' + seconds + ' <b>Seconds</b> ' + '</a>';  
                 
                }, 1000);
            }

           

        });
        </script>
    @endif
@stop  