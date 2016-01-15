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

        <h1 class="page-header">Dashboard</h1>
<style type="text/css">
#centerit {
  width: 1000px ;
  margin-left: auto ;
  margin-right: auto ;
}
</style>

        <div class="row placeholders" id="centerit">
            <div class="col-xs-6 col-sm-3 placeholder">
                <h3><span class="label label-default">{{$data['stats']['num_users']}}</span></h3>
                <h4>Number of Registered Participants</h4>
                
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <h3><span class="label label-default">{{$data['stats']['completed']}}</span></h3>
                <h4>Number of Completed Challenges</h4>
                
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <h3><span class="label label-default">{{$data['stats']['average']}}%</span></h3>
                <h4>Average Completion Per User</h4>
                
            </div>
        </div>


        <h2 class="sub-header">Welcome {{$data['user']['name']}}</h2>

        The CTF is a yearly event and is open to all employees. It is primarily focused at security
        challenges but it touches on a number of other disiplines, such as, scripting, web development and plain old
        problem solving. <br>

        <h3>What is a CTF?</h3><br>

        CTF is short for Capture the Flag. The objective is to find flags that are hidden within each challenge. 
        Unless stated otherwise each flag will take to form flag{some random value here} to aid in identification. 

        <h3>What types of Challenges are on offer?</h3><br>

        Reverse Engineering - RE, these challenges require you to take apart a program, understand it's componets and occasionally change the program logic! <br>
        Crypto - Cryptographic Challenge, these challenges require you to solve a challenge that is based on cryptography<br>
        Forensics - Detective like challenges to test your digital forensic capability. <br>
        Triva - a set of question based challenges to test your triva knowledge (Google is allowed). These are submitted without the flag{} sytax<br>

        <h3>Terms and Conditions</h3>
        Please be aware of some conditions when participating in these events: <br>
        <ul>
            <li>Do not perform any activity that is detrimental to the enjoyment of others </li>
            <li>If you do find a vulnerability that is not related to the challenges (there is a good chance there are
                some!), do not exploit it to gain advantage. Submit it to get bonus points! </li>
        </ul>

        <h3>Helpful links and tools</h3>
        <ul>
            <li><a href='https://www.hex-rays.com/products/ida/support/download_freeware.shtml'>Ida pro free</a></li>
            <li><a href='http://stalkr.net/files/ida/idadif.py'>Phython script for patching executables </a> </li>
            <li><a href='http://www.ollydbg.de/download.htm'> Olly Debug </a> </li>
            <li><a href='https://www.cryptool.org/en/'>Crypt Tool </a> </li>
            <li><a href='http://io.acad.athabascau.ca/~grizzlie/Comp607/jphs05.zip'>JPHide</a> </li>
            <li><a href=' http://sourceforge.net/projects/hexplorer/'> A hex editor </a> </li>
            <li><a href='https://www.wireshark.org/'> Packet Analysis </a> </li>
            <li><a href='http://www.netresec.com/?page=NetworkMiner'> Packet Analysis </a></li>
            <li><a href='http://www.google.com'>Google</a></li>
        </ul>



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





