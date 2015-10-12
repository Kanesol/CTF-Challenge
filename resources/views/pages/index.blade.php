@extends('app')


@section('content')

        <h1 class="page-header">Dashboard</h1>

        <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
                <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="{{$data['stats']['num_users']}}">
                <h4>Number of Registered Participants</h4>
                <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="{{$data['stats']['completed']}}">
                <h4>Number of Completed Challenges</h4>
                <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="{{$data['stats']['average']}}%">
                <h4>Average Completion Per User</h4>
                <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
                <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
                <h4>Success to Failure Ratio</h4>
                <span class="text-muted">Something else</span>
            </div>
        </div>


        <h2 class="sub-header">Welcome {{$data['user']['name']}} to the {{$data['game']['name']}}</h2>

        The Suncorp CTF is a yearly event and is open to all Suncorp employees. It is primarily focused at security
        challenges but it touches on a number of other disiplines, such as, scripting, web development and plain old
        problem solving. <br>

        <t1>What is a CTF?</t1>

        CTF is short for Capture the Flag. The objective is to find flags that are hidden within each challenge. 
        Unless stated otherwise each flag will take to form flag{some random value here} to aid in identification. 

        <t1>What types of Challenges are on offer?</t1>

        RE - Reverse Engineering, these challenges require you to take apart a program, understand it's componets and occasionally change the program logic! <br>
        Crypto - Cryptographic Challenge, these challenges require you to solve a challenge that is based on cryptography<br>
        Web - Web based challenges, these are your more familar web based challenges such as those listed in the OWASP top 10<br>
        Triva - a set of question based challenges to test your triva knowledge (Google is allowed)<br>

        Please be aware of some conditions when participating in these events: <br>
        <ul>
            <li>Do not perform any activity that is detrimental to the enjoyment of others </li>
            <li>If you do find a vulnerability that is not related to the challenges (there is a good chance there are
                some!), do not exploit it to gain advantage. Submit it to get bonus points! </li>
        </ul>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Type
                        </th>
                        <th>
                           Title
                        </th>
                        <th>
                            Points
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Link
                        </th>
                    </tr>
                </thead>
                @foreach($data['categories'] as $category)
                    <tr>
                        <td>{{$category['name']}}</td>
                        @foreach($category['challenges'] as $challenge)
                            <td>
                                {{$challenge['name']}}
                            </td>
                            <td>
                                {{$challenge['point_value']}}
                            </td>
                            <td>
                                {{$challenge['description']}}
                            </td>
                            <td>
                                @foreach($data['files'] as $filename)
                                    @if (strpos($filename, $challenge['id'], 0) === 0)

                                        {!! link_to('/Challenges_Repo/'.$filename, 'Link') !!}
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>



@stop
