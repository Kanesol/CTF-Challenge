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

        <h1 class="page-header">Challenges</h1>

        @foreach($data['categories'] as $category)
            <h2 class="sub-header">{{$category['name']}}</h2>


            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">
                               Title
                            </th>
                            <th class="text-center">
                                Points
                            </th>
                            <th class="text-center">
                                Description
                            </th>
                            <th class="text-center">
                                Link
                            </th>
                            <th class="text-center">
                                Completed
                            </th>
                        </tr>
                    </thead>
                
                    
                        
                        @foreach($category['challenges'] as $challenge)
                        <tr>
                            
                            <td class="col-md-2">
                                {!!nl2br($challenge['name'])!!}
                            </td>
                            <td class="col-md-1 text-center">
                                {{$challenge['point_value']}}
                            </td>
                            <td class="col-md-3">
                                {!!nl2br($challenge['description'])!!}
                            </td>
                            <td class="col-md-1 text-center">
                                @foreach($data['files'] as $filename)
                                    @if (strcmp(explode('.', $filename)[0], $challenge['id']) === 0)

                                        {!! link_to('/Challenges_Repo/'.$filename, 'Link') !!}
                                    @endif
                                @endforeach
                            </td>
                            <td class="col-md-1 text-center">
                                 <?php $flag = 0 ?>
                                @foreach($data['completed'] as $comp)

                                    @if( $comp['challenge_id'] === $challenge['id'])
                                        <?php $flag = 1 ?>
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    @endif
                                @endforeach
                                @if($flag == 0)
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    
               </table>
               @endforeach
            
        </div>



@stop

@section('script')

    @if(!$data['start'])
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