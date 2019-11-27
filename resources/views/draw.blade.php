@extends('layouts.topNav')

@section('topNav')
 <html>
 
 <head>
 
 <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
.mySlides1, .mySlides2 {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 80%;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: #121111;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  background-color:#dfdfdf;
  user-select: none;
}

/* Position the "next button" to the right */

.prev {
  right:105%;
  border-radius: 3px 0 0 3px;
}

.next {
  right:-10%;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a grey background color */
.prev:hover, .next:hover {
  background-color: #123a12;
  color: black;
}
</style>
 
 </head>
 
    <script type="text/javascript">
    var canvas, ctx, flag = false,
        prevX = 0,
        currX = 0,
        prevY = 0,
        currY = 0,
        dot_flag = false;

    var x = "black",
        y = 2;
    
    function init() {
        canvas = document.getElementById('can');
        ctx = canvas.getContext("2d");
        w = canvas.width;
        h = canvas.height;
    
        canvas.addEventListener("mousemove", function (e) {
            findxy('move', e)
        }, false);
        canvas.addEventListener("mousedown", function (e) {
            findxy('down', e)
        }, false);
        canvas.addEventListener("mouseup", function (e) {
            findxy('up', e)
        }, false);
        canvas.addEventListener("mouseout", function (e) {
            findxy('out', e)
        }, false);
    }
    
    function color(obj) {
        switch (obj.id) {
            case "green":
                x = "green";
                break;
            case "blue":
                x = "blue";
                break;
            case "red":
                x = "red";
                break;
            case "yellow":
                x = "yellow";
                break;
            case "orange":
                x = "orange";
                break;
            case "black":
                x = "black";
                break;
            case "white":
                x = "white";
                break;
        }
        if (x == "white") y = 14;
        else y = 2;
    
    }
    
    function draw() {
        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(currX, currY);
        ctx.strokeStyle = x;
        ctx.lineWidth = y;
        ctx.stroke();
        ctx.closePath();
    }
    
    function erase() {
        var m = confirm("Want to clear");
        if (m) {
            ctx.clearRect(0, 0, w, h);
            document.getElementById("canvasimg").style.display = "none";
        }
    }
    
    function save() {
        document.getElementById("canvasimg").style.border = "2px solid";
        var dataURL = canvas.toDataURL();
        document.getElementById("canvasimg").src = dataURL;
        document.getElementById("canvasimg").style.display = "inline";
    }
    
    function findxy(res, e) {
        if (res == 'down') {
            prevX = currX;
            prevY = currY;
            currX = e.clientX - canvas.offsetLeft;
            currY = e.clientY - canvas.offsetTop;
    
            flag = true;
            dot_flag = true;
            if (dot_flag) {
                ctx.beginPath();
                ctx.fillStyle = x;
                ctx.fillRect(currX, currY, 2, 2);
                ctx.closePath();
                dot_flag = false;
            }
        }
        if (res == 'up' || res == "out") {
            flag = false;
        }
        if (res == 'move') {
            if (flag) {
                prevX = currX;
                prevY = currY;
                currX = e.clientX - canvas.offsetLeft;
                currY = e.clientY - canvas.offsetTop;
                draw();
            }
        }
    }
    </script>
    <body onload="init()">
        
    
  
    <div style="margin-top:10%;margin-left:60%; margin-right:5%">
    <h2 style="text-align:center">Can you Draw It??</h2>
    
    <div class="slideshow-container">
  

      <div class="mySlides1">
      <img src="{{asset('kidsImage/1.jpg')}}" style="max-width:100%;height:auto;">
      </div>
      

      <div class="mySlides1">
      <img src="{{asset('kidsImage/2.jpg')}}" style="max-width:100%;height:auto;">
      </div>


      <div class="mySlides1">
      <img src="{{asset('kidsImage/3.jpg')}}" style="max-width:100%;height:auto;">
      </div>


      <div class="mySlides1">
      <img src="{{asset('kidsImage/4.jpg')}}" style="max-width:100%;height:auto;">
      </div>


      <div class="mySlides1">
      <img src="{{asset('kidsImage/5.jpg')}}" style="max-width:100%;height:auto;">
      </div>


      <div class="mySlides1">
      <img src="{{asset('kidsImage/6.jpg')}}" style="max-width:100%;height:auto;">
      </div>


      <div class="mySlides1">
      <img src="{{asset('kidsImage/7.jpg')}}" style="max-width:100%;height:auto;">
      </div>


      <div class="mySlides1">
      <img src="{{asset('kidsImage/8.jpg')}}" style="max-width:100%;height:auto;">
      </div>


      <div class="mySlides1">
      <img src="{{asset('kidsImage/9.jpg')}}" style="max-width:100%;height:auto;">
      </div>


      <div class="mySlides1">
      <img src="{{asset('kidsImage/10.jpg')}}" style="max-width:100%;height:auto;">
      </div>

      <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
      <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
    </div>
    
    
    </div>
    
    <div>
    <canvas id="can" width="400" height="400" style="position:absolute;top:10%;left:10%;border:2px solid;"></canvas>
    <input type="button" value="save" id="btn" size="30" onclick="save()" style="margin-top:10%;margin-left:10%;">
        <input type="button" value="clear" id="clr" size="23" onclick="erase()" style="margin-left:1%;">
        <div style="position:absolute;top:12%;left:43%;">Choose Color</div>
        <div style="position:absolute;top:15%;left:45%;width:10px;height:10px;background:green;" id="green" onclick="color(this)"></div>
        <div style="position:absolute;top:15%;left:46%;width:10px;height:10px;background:blue;" id="blue" onclick="color(this)"></div>
        <div style="position:absolute;top:15%;left:47%;width:10px;height:10px;background:red;" id="red" onclick="color(this)"></div>
        <div style="position:absolute;top:17%;left:45%;width:10px;height:10px;background:yellow;" id="yellow" onclick="color(this)"></div>
        <div style="position:absolute;top:17%;left:46%;width:10px;height:10px;background:orange;" id="orange" onclick="color(this)"></div>
        <div style="position:absolute;top:17%;left:47%;width:10px;height:10px;background:black;" id="black" onclick="color(this)"></div>
        <div style="position:absolute;top:24%;left:43%;">Eraser</div>
        <div style="position:absolute;top:24%;left:47%;width:15px;height:15px;background:white;border:2px solid;" id="white" onclick="color(this)"></div>
        <img id="canvasimg" style="position:absolute;top:10%;left:52%;" style="display:none;">
  
    </div>
    
    <script>
var slideIndex = [1,1];
var slideId = ["mySlides1", "mySlides2"]
showSlides(1, 0);
showSlides(1, 1);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}    
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex[no]-1].style.display = "block";  
}
</script>

    
    </body>
    </html>
    @endsection