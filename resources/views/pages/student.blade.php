@extends('layout.master')

@section('title')
    Home
@endsection

@section('content')



@include('sections.header')

<nav class="side-nav navbar-dark bg-primary" 
  style="min-height: 1000px;width: 15%;">  <br><br><br>
  
  @php
$count = 1
@endphp 
@foreach ($show as $lists) 
    
    @if ($count == 1)
    @if ($lists->student_id == session('student_id'))
        <?php
        $fullname = $lists->student_fname . " " . $lists->student_lname;
        $firstStringCharacter = substr($lists->student_mname, 0, 1);
    ?>   
@php
$count = $count+1
@endphp

    @endif
    @endif 
@endforeach     

<!-- <img src="{{ Avatar::create($fullname)->toBase64() }}" class="avatar" style="min-height: 100px;width: 40%;" /><br><br> -->
 <img src="/images/logo.png " style="min-height: 130px;width: 80%; margin-left:10%"><br><br><br>
 <button type="button" onclick="window.print()" class="btn btn-danger btn-rounded mb-4 ms-3"><i class="fas fa-print"></i> Print Record</button>
<div class="information ml-3">
@php
$count = 1
@endphp 
@foreach ($show as $lists) 
    
    @if ($count == 1)
    @if ($lists->student_id == session('student_id'))
        <h6><b>{{$lists->student_lname}}, {{$lists->student_fname}} {{$firstStringCharacter}}.</b></h6> 
        <h6><b>{{$lists->course_name}}</b></h6>
        <h6><b>{{$lists->student_year}}</b></h6>
        <h6><b>{{$lists->year}}</b></h6>
        <br>  
@php
$count = $count+1
@endphp

    @endif
    @endif 
@endforeach   
</div>
</div>
  </nav>
<div class="student">
<div class="container col-md-6 offset-md-3 mt-2"  style="width: 150%;">
<div class="">
    <h1 style="font-family:Stencil;" class="text-center mt-5 ml-5">Online Student Clearance</h1>
    <!-- {{ session()->get('student_id') }} -->
</div>

<!-- Table -->
<div class="limiter" style="width:140%">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver3 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1" >Department</th>
									<th class="cell100 column2">Status</th>
									<th  class="cell100 column3">Remarks</th>
									<th  class="cell100 column4">Date Cleared</th>
								</tr>
							</thead>
						</table>
					</div>
          <div class="table100-body js-pscroll">
						<table>
							<tbody>
								<tr class="row100 body">
									<td class="cell100 column1 font-weight-bold">{{$lists->department_name}}</td>
									<td  class="cell100 column2">{{$lists->status}}</td>
									<td class="cell100 column3 font-weight-bold">{{$lists->notes}}</td>
									<td class="cell100 column4">{{$lists->date_cleared}}</td>
								</tr>
                </thead>
    <tbody>
    @foreach ($show as $lists)
    @if ($lists->student_id == session('student_id'))  
        <tr>
        <td class="cell100 column1 font-weight-bold">{{$lists->department_name}} </td>
        <td class="cell100 column2">{{$lists->status}}</td>
        <td class="cell100 column3 font-weight-bold">{{$lists->notes}}</td>
        <td class="cell100 column4">{{$lists->date_cleared}}</td>
        </tr>
    @endif 
    @endforeach
    </tbody>
    </table>
</div>

<!-- <table id="example" class="table ver3" style="width:100%">
    <thead>
        <tr>
        <th >Department</th>
        <th >Status</th>
        <th style="width: 30%;">Notes  </th>
        <th class="text-center">Date Cleared</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($show as $lists)
    @if ($lists->student_id == session('student_id'))  
        <tr>
        <td>{{$lists->department_name}} </td>
        <td>{{$lists->status}}</td>
        <td>{{$lists->notes}}</td>
        <td>{{$lists->date_cleared}}</td>
        </tr>
    @endif 
    @endforeach
    </tbody>
    </table>
</div> -->
@endsection

@section('scripts')

<script>
var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

  <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>
@endsection