<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.avatar {
  vertical-align: middle;
  width: 300px;
  height: 300px;
  border-radius: 50%;
}
</style>

</head>
<body id="myPage">



<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="{{ url('/') }}" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>W3MTest</a>
  <a href="{{ route('MyParticipations') }}" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Participation History</a>

  <a class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" href="{{ url('/showprofile') }}">{{ Auth::user()->name }}</a>

</div>
</div>


<img style="margin-top:4%;margin-left:40%" src="{{ asset('css/img/me.jpg') }}" alt="Avatar" class="avatar"> 
<div style="margin-left:48%;">
  <h2>{{ $name }}</h2>
</div>


<div class="w3-container w3-padding-64 w3-center" id="team">
  <div class="w3-row"><br>
    @foreach($result as $t)
    <div class="w3-quarter">
      <img src="{{ asset('css/img/rating.png') }}" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>{{$t->Name}}</h3>
      <p>{{$t->rating}}%</p>
    </div>
     @endforeach

  <!--  <div class="w3-quarter">
      <img src="{{ asset('css/img/rating.png') }}" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Math</h3>
      <p>90%</p>
    </div>

    <div class="w3-quarter">
      <img src="{{ asset('css/img/rating.png') }}" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>English</h3>
      <p>80%</p>
    </div>

    <div class="w3-quarter">
      <img src="{{ asset('css/img/rating.png') }}" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Physics</h3>
      <p>60%</p>
    </div>-->


  </div>
</div>



</body>
</html>
