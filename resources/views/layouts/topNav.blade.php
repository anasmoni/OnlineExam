<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('W3MTest')}}</title>

    <!--begin nav-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <!--end nav-->

</head>
<body>
    <div>

      <div id='cssmenu'>
        <ul>
           <li class="active" style="padding-right:30%;"><a href="{{ url('/') }}">W3MTest</a></li>
           <li ><a href="{{ route('setMTest') }}">Set Model Test</a></li>
           <li><a href="{{ route('AddMCQ') }}">Add MCQ</a></li>
           <li><a href="{{ route('show') }}">Show Questions</a></li>
           <li><a href="{{ route('MyParticipations') }}">Participation History</a></li>
           <li><a href="{{ route('addSubject') }}">Add Subject-Topic</a></li>
           <li><a href="{{ route('myprofile') }}">{{ Auth::user()->name }}</a></li>

        </ul>
      </div>

        <main class="py-4">
            @yield('topNav')
        </main>

    </div>
</body>
</html>
