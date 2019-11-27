<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/front.css') }}">
<!--<link rel="stylesheet" href="{{ asset('css/Timer.css') }}"> -->
</head>
<body>
  

<div class="ansSheetContent">  
 <form action = "{{ url('/ansSheetInsert') }}" method = "post"> 
  @csrf
<!-- <input type="submit" value="submit"> -->
<p id="timer"></p>
  <ul class="quiz">
  <li>
    
    @foreach($ret as $t)
    <div>{{$number[0]}}: {{$t->question}}</div>
  <li style="margin-left: 35px"><label><input type="radio" name= "{{$t->id}}" value="1"><span>{{$array[0][0]->option_text}}</span></label></li>
     <li style="margin-left: 35px"><label><input type="radio" name="{{$t->id}}" value="2"><span>{{$array[0][1]->option_text}}</span></label></li>
     <li style="margin-left: 35px"><label><input type="radio" name="{{$t->id}}" value="3"><span>{{$array[0][2]->option_text}}</span></label></li>
     <li style="margin-left: 35px"><label><input type="radio" name="{{$t->id}}" value="4"><span>{{$array[0][3]->option_text}}</span></label></li>
     <li style="margin-left: 35px"><label><input type="radio" name="{{$t->id}}" value="5"><span>{{$array[0][4]->option_text}}</span></label></li>
    
          @php(\array_splice($array, 0, 1))
          @php(\array_splice($number, 0, 1))
   @endforeach 

  </li>

</ul>

<input style="
      padding: 15px 25px;
      font-size: 19px;
      text-align: center;
      cursor: pointer;
      outline: none;
      color: #fff;
      background-color: #1116af;
      border: none;
      border-radius: 15px;
      box-shadow: 0 9px #999;
      opacity:0.3;
      margin-left: 40%;
    " type="submit" value="submit">
</form>
 
</div>
<!--
<button class="view-results" onclick="returnScore()">View Results</button>
<span id="myresults" class="my-results">My results will appear here</span>
  -->
<!--
<script type="text/javascript">
//  var str = @json($ara);
 // var answers = JSON.parse(str);
 
var op = <?php echo json_encode($ret); ?>;
var answers =  <?php echo json_encode($ara); ?>;
  tot = answers.length ;
function getCheckedValue(radioName) {

  var radios = document.getElementsByName(radioName); // Get radio group by-name
//  document.getElementById("demo").innerHTML =  "Okkkkkkkkkkkk";
  for (var y = 0; y < radios.length; y++)
    if (radios[y].checked) return radios[y].value; // return the checked value
}

function getScore(){
  var score = 0;
  for (var i = 0; i < tot; i++)
   if (getCheckedValue(op[i].id.toString(10)) === answers[i].correctOption.toString(10)) score += 1; // increment only
  return score;
}

function returnScore() {
  document.getElementById("myresults").innerHTML =
    "Your score is " + getScore() + "/" + tot;
}


</script>
-->

<script type="text/javascript">
var test = {!! json_encode($total_time) !!};
var countDownDate = new Date(Date.parse(new Date())+ test*1000 * 45 );
var fromController = {!! json_encode($results) !!};
      //    var count_down  = new Date(fromController.start_time);
//          var end = new Date(fromController.end_time);
//          var now = count_down - end;
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  if( distance <= 0 ){
            alert("Exam Finished");
            window.location = "{{url('/ShowAnsSheet')}}";
  }
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "EXam Ended";
  }
}, 1000); 



</script>  
<!--
<script>
        //  
          function getTimeRemaining(endtime) {
          var t = Date.parse(endtime) - Date.parse(new Date());
          if( t <= 0 ){ 
            alert("Your Exam Started");
            window.location = "{{url('/ShowQuestions')}}";
            return;
          }
       //   else ift < 0 ){
       //     alert("Your Exam Time is up");
       //     return;
       //   }

          
      //    document.getElementById("id").innerHTML =  count_down ;
          var seconds = Math.floor((t / 1000) % 60);
          var minutes = Math.floor((t / 1000 / 60) % 60);
          var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
          var days = Math.floor(t / (1000 * 60 * 60 * 24));
          return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
          };
        
        }

        function initializeClock(id, endtime) {
          var clock = document.getElementById(id);
          var daysSpan = clock.querySelector('.days');
          var hoursSpan = clock.querySelector('.hours');
          var minutesSpan = clock.querySelector('.minutes');
          var secondsSpan = clock.querySelector('.seconds');
          function updateClock() {
            var t = getTimeRemaining(endtime);
            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
            if(t.total <= 0) {
              clearInterval(timeinterval);
              return;
            }
          }
            updateClock();
            var timeinterval = setInterval(updateClock, 1000);
        }
         var fromController = {!! json_encode($results) !!};
          var count_down  = new Date(fromController.end_time);
      
        var now = count_down - new Date().getTime();
   //     var deadline = new Date(Date.parse(new Date()) + 10 * 1000 );
        
        document.getElementById("id").innerHTML =  now ;
        
        var deadline = new Date(Date.parse(new Date()) + now);

        initializeClock('clockdiv', deadline);
</script>
-->
</body>
</html>