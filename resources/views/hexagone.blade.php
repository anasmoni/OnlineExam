 <html>
 
 <head>
 
 <meta name="viewport" content="width=device-width, initial-scale=1">

 
     <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
</head>
    <body>
			
		
		
		<canvas id="canvas"></canvas><br>
<h2 style="margin-left:45%">Six equal part</h2>
		<button id="submit">Submit</button>	

<script type="text/javascript">
    
	/*jslint browser: true */
/*global G_vmlCanvasManager */

    
    var canvas,
        context,
        x1,
        y1,
        x2,
        y2,
        isDown = false, //flag we use to keep track
        windowHeight,
        windowWidth,
        canvasBackgroundColor = 'white';
    
    windowHeight = window.innerHeight;
    windowWidth = window.innerWidth;
    
    canvas = document.getElementById('canvas');
	
	var submit = document.getElementById('submit');
	
    canvas.height = windowHeight;
    canvas.width = windowWidth;
    
    canvas.style.backgroundColor = canvasBackgroundColor;
    
    context = canvas.getContext('2d');
	
	var X = new Array( 600,700,600,700,500,600,500,600,800,700,800,700);
	var Y = new Array(400,400,200,200,300,200,300,400,300,200,300,400);
	
	var dX = new Array(600,700 , 600, 700,500,800);
	var dY = new Array(400,200 , 200, 400,300,300);
	
	var choosenX = new Array();
	var choosenY = new Array();
	
	var len = Object.keys(X).length;

	context.beginPath();
	
	for(var i=0; i+1<len; i += 2){
		
		context.moveTo(X[i],Y[i]);
		context.lineTo(X[i+1],Y[i+1]);
	}
	
	context.stroke();
	context.closePath();
			
    canvas.onmousedown = function (event) {
        event = event || window.event;
		
		var lr = event.button;
		
		if(lr == 0){ // left button
			GetStartPoints();
			
		}
		else if(lr == 2){

			
			GetEndPoints();
			
			choosenX.push(x1);
			choosenX.push(x2);
			choosenY.push(y1);
			choosenY.push(y2);
			
			context.beginPath();
			context.moveTo(x1, y1);
			context.lineTo(x2, y2);
			context.stroke();
			
			context.closePath();
			
			
			
			//document.getElementById('xy').innerHTML = x1 + " " + y1;

		}
    };
	
	submit.onmousedown = function (event) {
		

		//document.getElementById('xy').innerHTML = "sd";
		
		var len = Object.keys(X).length;
		var clen = Object.keys(choosenX).length;
		var ok = true;
		
		if(clen != 6) ok = false;
		//alert(clen);
		
		for(var i=0; i+1<clen && ok == true; i += 2){

			var paisi = false;
		
			for(var j=0; j+1<6 && paisi == false; j += 2){
			
				if(choosenX[i] == dX[j] && choosenY[i] == dY[j]){
					if(choosenX[i+1] == dX[j+1] && choosenY[i+1] == dY[j+1]){
						paisi = true;
					}
				}
				
				if(choosenX[i+1] == dX[j] && choosenY[i+1] == dY[j]){
					if(choosenX[i] == dX[j+1] && choosenY[i] == dY[j+1]){
						paisi = true;
					}
				}
			}
			//alert(paisi);
			ok = paisi;
		}
		
		if(ok){ 
			alert("Accepted");
			 window.location = "{{url('/triangle')}}"; 
		}
		else alert("Incorrect") ;
		
		choosenX = [];
		choosenY = [];
		
    };
   
    function GetStartPoints() {
      // This function sets start points
        x1 = event.clientX;
        y1 = event.clientY;
		
		var cd1 = 100000;
		
		for(var i=0; i<len; i++){
			
			var d1 = (X[i]-x1)*(X[i]-x1) + (Y[i]-y1)*(Y[i]-y1);
	
			//document.getElementById('xy').innerHTML = x1 + " " + y1 + " " + X[i] + " " + Y[i]+ " " + d1;
			
			if(d1<=500 && d1<cd1){
				x1 = X[i];
				y1 = Y[i];
				cd1 = d1;
				
				//document.getElementById('xy').innerHTML = "anas";
			}
		}
		//document.getElementById('xy').innerHTML = x1 + " " + y1 ;
		
    }
    
    function GetEndPoints() {
      // This function sets end points
        x2 = event.clientX;
        y2 = event.clientY;
		
		var cd1 = 1000000;
		for(var i=0; i<len; i++){
			
			var d1 = (X[i]-x2)*(X[i]-x2) + (Y[i]-y2)*(Y[i]-y2);
			//document.getElementById('xy').innerHTML = x1 + " " + y1 + " " + X[i] + " " + Y[i]+ " " + d1;
			//break;
			if(d1<=500 && d1<cd1){
				x2 = X[i];
				y2 = Y[i];
				cd1 = d1;
			}
		}
		
    }
	
	
	
    </script>

	

	
    </body>
    </html>