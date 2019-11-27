@extends('layouts.topNav')

@section('topNav')

<!DOCTYPE html>
<html>
<head>


<style>


html {
  box-sizing: border-box;
}
*,
*:before,
*:after {
  box-sizing: inherit;
}

.ansSheetContent{
	margin-left : 200px;
	margin-top : 100px;
}

body {
  font-family: sans-serif;
  padding: 1rem;
}

.quiz,
.choices {
  list-style-type: none;
  padding: 0;
}

.choices li {
  margin-bottom: 5px;
}
.note{
	background-color:#bfafdd; border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
  width:50%;
  margin-left: 50px;
}


.my-results {
  padding: 1rem;
  border: 1px solid goldenrod;
}



</style>

</head>
<body>

<div class="ansSheetContent">


<ul class="quiz">

  @foreach($ret as $t)
    <h4>Question: {{$t->question}}</h4>
        
        <li>
  
      <ul class="choices">
      @if($t->correctOption == 1) <p>&#9989; {{$array[0][0]->option_text}}</p>  
      @else <p>&#10066; {{$array[0][0]->option_text}}</p>
      @endif

      @if($t->correctOption == 2) <p>&#9989; {{$array[0][1]->option_text}}</p>  
      @else <p>&#10066; {{$array[0][1]->option_text}}</p>
      @endif

      @if($t->correctOption == 3) <p>&#9989; {{$array[0][2]->option_text}}</p>  
      @else <p>&#10066; {{$array[0][2]->option_text}}</p>
      @endif

      @if($t->correctOption == 4) <p>&#9989; {{$array[0][3]->option_text}}</p>  
      @else <p>&#10066; {{$array[0][3]->option_text}}</p>
      @endif

      @if($t->correctOption == 5) <p>&#9989; {{$array[0][4]->option_text}}</p>  
      @else <p>&#10066; {{$array[0][4]->option_text}}</p>
      @endif

      </ul>
    </li>
    <div class='note'>
      <span style='font-size:50px;'>&#10071; </span>
      <span>{{$t->note}}</span>
      </div>
  <li>  
     
     @php(\array_splice($array, 0, 1))
   @endforeach 


</div>


</body>

</html>
@endsection