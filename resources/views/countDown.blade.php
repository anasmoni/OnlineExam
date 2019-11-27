
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
          body{
            margin-top: 200px;
            margin-bottom: 100px;
            margin-right: 250px;
            margin-left: 550px;
            border-top: 
            width: 500px;
            height: 300px;
            background-color:white;
          }

          h1{
            padding: 2px;
            background-repeat: no-repeat;
            background-size: 20px 100px;
            font-family: "Times New Roman", Times, serif;
            font-style: italic;
            color: orange;
          }

          #clockdiv{
            font-family: sans-serif;
            color: #fff;
            display: inline-block;
            font-weight: 100;
            text-align: center;
            font-size: 30px;
          }

          #clockdiv > div{
            padding: 10px;
            border-radius: 3px;
            background: #00BF96;
            display: inline-block;
          }

          #clockdiv div > span{
            padding: 15px;
            border-radius: 3px;
            background: #00816A;
            display: inline-block;
          }

          .smalltext{
            padding-top: 5px;
            font-size: 16px;
          }

</style>
</head>
  <body>

      
        <p id="demo"></p>
          <h1>Your next exam starts in:</h1>
        <div id="clockdiv">
          <div>
            <span class="days"></span>
            <div class="smalltext">Days</div>
          </div>
          <div>
            <span class="hours"></span>
            <div class="smalltext">Hours</div>
          </div>
          <div>
            <span class="minutes"></span>
            <div class="smalltext">Minutes</div>
          </div>
          <div> 
            <span class="seconds"></span>
            <div class="smalltext">Seconds</div>
          </div>


          
        </div>
        <p id="id"></p>

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
        var fromController = {!! json_encode($total_time) !!};
        //   var count_down  = new Date(fromController.start_time);
      
        // var now = count_down - new Date().getTime();
   //     var deadline = new Date(Date.parse(new Date()) + 10 * 1000 );
        
   //     document.getElementById("id").innerHTML =  now ;
        
        var deadline = new Date(Date.parse(new Date()) + 15 * 1000);

        initializeClock('clockdiv', deadline);
</script>

</body>
</html>
