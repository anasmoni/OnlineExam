<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>W3MTest</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">



          <style>
          /* Code By Webdevtrick ( https://webdevtrick.com ) */
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }
        html, body {
          height: 100%;
        }
        body {
          font: 12px 'Open Sans', sans-serif;
          color: #212121;
          background: #eeeeee;
          overflow-x: hidden;
        }
        .container {
          display: flex;
          min-height: 100%;
        }
        input[data-function*='swipe'] {
          position: absolute;
          opacity: 0;
        }
        label[data-function*='swipe'] {
          position: absolute;
          top: 30px;
          left: 30px;
          z-index: 1;
          display: block;
          width: 42px;
          height: 42px;
          font: 42px fontawesome;
          text-align: center;
          color: #333;
          cursor: pointer;
          transform: translate3d(0, 0, 0);
          transition: transform .3s;
        }
        label[data-function*='swipe']:hover {
          color: #263249;
        }
        input[data-function*='swipe']:checked ~ label[data-function*='swipe'] {
          transform: translate3d(280px, 0, 0);
        }
        label[data-function*='swipe']:checked {
          display: block;
        }
        label:nth-child(2){
          display: none;
        }
        input[data-function*='swipe']:checked ~ label:nth-child(2){
          display: block;
          transform: translate3d(280px, 0px, 0px);
        }
        input[data-function*='swipe']:checked ~ label:nth-child(3){
          display: none;
        }
        .headings {
          flex: 1;
          padding: 80px 30px;
          background: #eee;
          box-shadow: 0 0 5px black;
          transform: translate3d(0, 0, 0);
          transition: transform .3s;
        }
        input[data-function*='swipe']:checked ~ .headings {
          transform: translate3d(280px, 0px, 0px);
        }
        input[data-function*='swipe']:checked ~ .sidebar {
          transform: translate3d(0px, 0px, 0px);
        }
        input[data-function*='swipe']:checked ~ .sidebar .menu li {
          width: 100%;
        }
        .sidebar {
          transform: translate3d(-280px, 0px, 0px);
          position: absolute;
          width: 280px;
          background: #263249;
          color: #eee;
          left: 0;
          height: 100%;
          transition: all .3s;
        }
        .menu li {
          padding: 10px;
          list-style: none;
          width: 0%;
        }
        .menu li a {
          color: #fff;
          border: 3px solid #fff;
          text-align: center;
          font-size: 18px;
          font-weight: 900;
          display: block;
          text-decoration: none;
          padding: 5px 0px 5px 0;
          margin: 0 20px;
        }
        h1, p {
          margin: 30px 0;
          font-size: 45px;
          font-weight: 280;
        }
        p {
          font-size: 30px;
        }

          </style>

          <meta charset="UTF-8">
          <title>Pure CSS Off Canvas Menu</title>
          <link rel="stylesheet" href="style.css">
          <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    </head>

    <body>
        <div class="bg-image"></div>
        <div class="bg-content flex-center position-ref full-height">

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else

                    <a href="{{ route('login') }}"><button class="button" >Login</button>
                        @if (Route::has('register'))

                        <a href="{{ route('register') }}"><button class="button" >Register</button>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    W3MTest
                </div>

                <div class="links">

                </div>
            </div>

            <div class="container">
            <input data-function="swipe" id="swipe" type="checkbox">
            <label data-function="swipe" for="swipe">&#xf057;</label>
            <label data-function="swipe" for="swipe">&#xf0c9;</label>

            <div class="sidebar">
              <nav class="menu">

               <li><a href="{{ route('setMTest') }}">Set Model Test</a></li>
                    <li> <a href="{{ route('AddMCQ') }}">Add MCQ</a></li>
                    <li> <a href="{{ route('show') }}">Show Questions</a></li>
                    <li> <a href="{{ route('myprofile') }}">My Profile</a> </li>
                    <li> <a href="{{ route('addSubject') }}">Add Subject</a></li>
                    <li> <a href="{{ route('users') }}">Users</a></li>
                    <li> <a href="{{ route('draw') }}">Draw</a></li>
                    <li> <a href="{{ route('hexagone') }}">Geometrical Challenge(For kids)</a></li>

              </nav>

          </div>

            </div>

            <!--<div class="content">
                <div class="title m-b-md">
                    W3MTest
                </div>

                <div class="links">
                    <a href="{{ route('setMTest') }}"><button class="button" >Set Model Test</button>
                    <a href="{{ route('AddMCQ') }}"><button class="button" >Add MCQ</button>
                    <a href="{{ route('show') }}"><button class="button" >Show Questions</button>
                    <a href="{{ route('myprofile') }}"><button class="button" >My Profile</button> 
                    <a href="{{ route('addSubject') }}"><button class="button" >Add Subject</button>
                    <a href="{{ route('users') }}"><button class="button" >Users</button>
                    <a href="{{ route('draw') }}"><button class="button" >Draw</button>
                    <a href="{{ route('hexagone') }}"><button class="button" >Geometrical Challenge(For kids)</button>
                </div>
            </div>
        -->
            -
        </div>

    </body>
</html>
