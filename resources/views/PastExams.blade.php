@extends('layouts.topNav')

@section('topNav')
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V03</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/pastexamutil.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/pastexam.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				

				<div class="table100 ver2 m-b-110">
					<table data-vertable="ver2">
						<thead>
							<tr class="row100 head" >						
								<th data-column="columnselect">Select</th>
								<th class="column100 column2" data-column="column1">Date-Time</th>
								<th class="column100 column3" data-column="column3">Subject</th>
								<th class="column100 column4" data-column="column4">Topics</th>
								<th class="column100 column5" data-column="column5">Score</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($ExamInfo as $t)
  							<tr class="row100">
								<td class="column100 columnselect" data-column="column1">
								<form action="{{url('/ShowScript')}}" method="post">
									@csrf
								 <input name="butt" style="background-color:#1166EB;"type="submit" class="btn btn-primary" value={{$t[1]}}> 
							    </form>
								</td>
								<td class="column100 column2" data-column="column2">{{$t[5]}}</td>														
								<td class="column100 column3" data-column="column3">{{$t[2]}}</td>
								<td class="column100 column4" data-column="column4">{{$t[3]}}</td>
								<td class="column100 column5" data-column="column5">{{$t[4]}}</td>
							
							</tr>
  							 @endforeach 

						</tbody>
					</table>
				</div>


</body>
</html>
@endsection