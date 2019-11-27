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

        <link rel="stylesheet" href="{{ asset('css/multiselect.css') }}">
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
            <form style="width:50%;" action="{{ url('/myexams') }}" method="post">  
                @csrf
              
            <div  style="width:80%; padding:10%;margin:10%;" class="panel panel-primary">
<!--  <form action="{{url('/myexams')}}" method="post"> 
    @csrf -->
    <div class="panel-heading">Set Model Test</div>
      <div >
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label class="control-label">Number of Questions</label>
                  <input type="text" class="form-control" name="number_of_questions" id="fname">
               </div>
            </div>
            
            <div class="col-md-6">
              <label class="control-label">Subject</label>

                  <div class="custom-select" >

                  <select name="subject">
                    <option value="0">Select</option>
                    @foreach ($subjects as $s)
                      <option value="{{$s->Name}}">{{$s->Name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
         </div>

         <div class="row">

    <!--  <div class='col-md-6'>
               <div class="form-group">
                  <label class="control-label">Start Time</label>
                  <div class='input-group date' id='datetimepicker1'>
                     <input type='text' name="start_time"  class="form-control" />
                     <span class="input-group-addon" >
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                  </div>
               </div>
            </div> -->

            <div class="col-md-6">
              <label class="control-label">Topic</label>

              <div id="select7" class="select7_container">
                <div class="select7_arrow">&#9662;</div>
                <div class="select7_placeholder">Select</div>
                <select  class="select7_select" onchange="Select7.add(this, event);">
                  <option></option>
                  <option value="All">All</option>
                  @foreach ($topics as $t)

                    <option value="{{$t->Topic}}">{{$t->Topic}}</option>
                  @endforeach

                </select>

                <div class="select7_items"></div>
          </div>
        </div>
        </div>

        <input type="hidden" id ="selectedTopics" name="selected_topics">

    <div class="row">

    <!--  <div class='col-md-6'>
               <div class="form-group">
                  <label class="control-label">End Time</label>
                  <div class='input-group date' id='datetimepicker2'>
                     <input type='text' name="end_time"  class="form-control" />
                     <span class="input-group-addon" >
                     <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                  </div>
               </div>
            </div> -->

      

        </div>

        <input style="background-color:#1166EB;"type="submit" class="btn btn-primary" value="Set">
      </div>

   </div>
 </form>  
   <script>
     $(function () {
       $('#datetimepicker1').datetimepicker();
    });
    $(function () {
      $('#datetimepicker2').datetimepicker();
   });
   </script>


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

        <script  src="{{ asset('js/multiselect.js') }}"></script>


    </body>
</html>
@endsection