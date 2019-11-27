@extends('layouts.topNav')

@section('topNav')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>W3MTest</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <link rel="stylesheet" href="{{ asset('css/addMcq.css') }}">
    </head>

    <body>


        <div class="flex-center position-ref full-height">

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        
                    @else

                    <a href="{{ route('login') }}"><button class="button" >Login</button>
                        @if (Route::has('register'))

                        <a href="{{ route('register') }}"><button class="button" >Register</button>
                        @endif
                    @endauth
                </div>
            @endif

        <div class="container">
     <!--     <form action="{{ url('/mcqInsert') }}" method="post">
            @csrf -->
            <form action="{{url('/mcqInsert')}}" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }}
          <div class="row"  style="display: flex;">
            <div class="col-25">
              <label>Subject</label>
            </div>

            <div class="col-25">
              <input type="text" name="subject" placeholder="Subject">
            </div>
        	<div style="width:10%">
        	</div>

            <div class="col-25" style="display: flex;">
        	<label for="lname">Topic</label>
              <input type="text" name="topic" placeholder="Topic..">
            </div>

          </div>

            <div class="row">
            <div class="col-25">
              <label for="lname">Short Note</label>
            </div>

            <div class="col-75">
              <input type="text" name="question" placeholder="Question">
            </div>
            
          </div>

           <div class="row">
            <div class="col-25">
              <label for="lname">Short Note</label>
            </div>

            <div class="col-75">
              <input type="text" name="opA" placeholder="Option A">
        	  

            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="lname">Short Note</label>
            </div>

            <div class="col-75">
              <input type="text" name="opB" placeholder="Option B">
        	  
            </div>
          </div>

        <div class="row">
            <div class="col-25">
              <label for="lname">Short Note</label>
            </div>

            <div class="col-75">
              <input type="text" name="opC" placeholder="Option C">
        	 
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="lname">Short Note</label>
            </div>

            <div class="col-75">
              <input type="text" name="opD" placeholder="Option D">
        	  
            </div>
          </div>

          <div class="row">
            
            <div class="col-25">
              <label for="lname">Short Note</label>
            </div>
            <div class="col-75">
              <input type="text" name="opE" placeholder="Option E">
        	  
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="lname">Short Note</label>
            </div>
          
            <div class="col-75">
              <input type="text" name="sNote" placeholder="Short Note">
        	<!--  <input type="file" name="picSN" class="form-control-file" id="exampleFormControlFile7"> -->
            </div>
          </div>


            <div class="col-75"  style="display: flex;">

        		<div class="col-25D"></div>

        		<div class="col-25D">
        			<div class="custom-select" style="width:50%;">

        			  <select name="correct_option">
        				<option value="0">Correct Option</option>
        				<option value="1">A</option>
        				<option value="2">B</option>
        				<option value="3">C</option>
        				<option value="4">D</option>
        				<option value="5">E</option>
        			  </select>

        			</div>
        		</div>
        		<div class="col-25D">
        			<div class="custom-select" style="display: flex;">

        			  <select name="difficulty">
        				<option value="0">Difficulty</option>
        				<option value="1">Easy</option>
        				<option value="2">Medium </option>
        				<option value="3">Hard</option>
        				<option value="4">Advanced</option>
        			  </select>
        			</div>
        		</div>
        	</div>

        	<div><input type="submit" value="Add"></div>

        	</form>

        </div>


        <script>

        var x, i, j, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        for (i = 0; i < x.length; i++) {
          selElmnt = x[i].getElementsByTagName("select")[0];
          /*for each element, create a new DIV that will act as the selected item:*/
          a = document.createElement("DIV");
          a.setAttribute("class", "select-selected");
          a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
          x[i].appendChild(a);
          /*for each element, create a new DIV that will contain the option list:*/
          b = document.createElement("DIV");
          b.setAttribute("class", "select-items select-hide");
          for (j = 1; j < selElmnt.length; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                  if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    for (k = 0; k < y.length; k++) {
                      y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                  }
                }
                h.click();
            });
            b.appendChild(c);
          }
          x[i].appendChild(b);
          a.addEventListener("click", function(e) {
              /*when the select box is clicked, close any other select boxes,
              and open/close the current select box:*/
              e.stopPropagation();
              closeAllSelect(this);
              this.nextSibling.classList.toggle("select-hide");
              this.classList.toggle("select-arrow-active");
            });
        }
        function closeAllSelect(elmnt) {
          /*a function that will close all select boxes in the document,
          except the current select box:*/
          var x, y, i, arrNo = [];
          x = document.getElementsByClassName("select-items");
          y = document.getElementsByClassName("select-selected");
          for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
              arrNo.push(i)
            } else {
              y[i].classList.remove("select-arrow-active");
            }
          }
          for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
              x[i].classList.add("select-hide");
            }
          }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);
        </script>
      </div>
    </body>
</html>

@endsection