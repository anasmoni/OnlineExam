<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>W3MTest</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/setMtest.css') }}" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
            <form style="width:50%;" action="{{ url('/test2') }}" method="post">  
              @csrf
            <div  style="width:80%; padding:10%;margin:10%;" class="panel panel-primary">
<!--  <form action="{{url('/myexams')}}"> -->
    <div class="panel-heading">Select Topic</div>
      <div >
         <div class="row">
            
            <div class="col-md-6">

      <div class="form-group">
            <label class="control-label">Topic</label>
            <input type="text" class="form-control" name="topic" id="fname"placeholder="Enter...">
            </div>
            </div>
         </div>
         

	       </div>



        <input style="background-color:#1166EB;"type="submit" class="btn btn-primary" value="Filter">


        </div>
 </form> 

    </body>
</html>
