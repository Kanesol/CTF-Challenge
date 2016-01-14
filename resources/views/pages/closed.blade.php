@extends('app')

@section('log')
    @if(isset($user))
        <li><a href="/auth/login">Log In</a></li>
    @else
        <li><a href="/auth/logout">Log Out</a></li>    
    @endif
@stop

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div id="main">
<div class="content">
<div class="text">
<h2>CTF is now Closed</h2>
</div> <!-- /.Text Div -->

</div> <!-- /.Content Div -->
</div> <!-- /#Main Div -->
</div> <!-- /.Columns Div -->
</div> <!-- /.Row Div -->
</div> <!-- /.Container Div -->

<style>


.container {
  margin: 0px auto;
  padding: 0px;
}

#main { 
  background: #3B3B3B;
  height: 430px;
}

.content {
  padding: 10px 44px;
}

.text {
  border-bottom: 1px solid #262626;
  margin-top: 40px;
  padding-bottom: 40px;
  text-align: center;
}

.text h2 {
  color: #E5E5E5;
  font-size: 30px;
  font-style: normal;
  font-variant: normal;
  font-weight: lighter;
  letter-spacing: 2px;
}

.counter {
  background: #2C2C2C;
  -moz-box-shadow:    inset 0 0 5px #000000;
  -webkit-box-shadow: inset 0 0 5px #000000;
  box-shadow:         inset 0 0 5px #000000;
  min-height: 150px;
  text-align: center;
}

.counter h3 {
  color: #E5E5E5;
  font-size: 14px;
  font-style: normal;
  font-variant: normal;
  font-weight: lighter;
  letter-spacing: 1px;
  padding-top: 20px;
  margin-bottom: 30px;
}

#countdown {
  color: #FFFFFF;
}

#countdown span {
  color: #E5E5E5;
  font-size: 26px;
  font-weight: normal;
  margin-left: 20px;
  margin-right: 20px;
  text-align: center;
}
</style>

@stop