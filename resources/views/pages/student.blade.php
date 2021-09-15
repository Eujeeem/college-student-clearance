@extends('layout.master')

@section('title')
    Home
@endsection

@section('content')



@include('sections.header')

<div class="container col-md-6 offset-md-3 mt-2"  style="width: 150%;">>
<div class="">
    <h1 class="text-center">Online Student Clearance</h1>
    <!-- {{ session()->get('student_id') }} -->
@php
$count = 1
@endphp 
@foreach ($show as $lists) 
    
    @if ($count == 1)
    @if ($lists->student_id == session('student_id'))  
        <h5>Name: <b>{{$lists->student_lname}}, {{$lists->student_fname}} {{$lists->student_mname}}.</b></h5>
        <h5>Year: <b>{{$lists->student_year}}</b></h5>
        <h5>Course: <b>{{$lists->course_name}}</b></h5>
        <h5>Academic Year: <b>{{$lists->year}}</b></h5>
        <br>
@php
$count = $count+1
@endphp

    @endif
    @endif 
@endforeach              
</div>
<!-- Table -->
<table id="example" class="table table-hover table-bordered" style="width:100%">
    <thead class="table-primary table-sm border-dark ">
        <tr>
        <th >Department</th>
        <th >Status</th>
        <th style="width: 30%;">Notes  </th>
        <th class="text-center">>Date Cleared</th>
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