@extends('app')


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
            <li>Ida pro free: https://www.hex-rays.com/products/ida/support/download_freeware.shtml</li>
            <li>Phython script for patching executables: stalkr.net/files/ida/idadif.py</li>
            <li>Olly Debug: http://www.ollydbg.de/download.htm</li>
            <li>Crypt Tool: https://www.cryptool.org/en/ </li>
            <li>JPHide: http://io.acad.athabascau.ca/~grizzlie/Comp607/jphs05.zip </li>
            <li>A hex editor: http://sourceforge.net/projects/hexplorer/ </li>
            <li>Packet Viewer: https://www.wireshark.org/ and http://www.netresec.com/?page=NetworkMiner</li>
            <li>Google</li>
        </ul>



@stop
