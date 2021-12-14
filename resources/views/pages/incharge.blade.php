@extends('layout.master')

@section('title')
    Home
@endsection

@section('content')


@include('sections.searchbar')

<div class="container col-md-6 offset-md-3 mt-5">
    <h3 class="text-center">

    @php
$count = 1
@endphp 
@foreach ($show as $lists)  
  @if ($lists->incharge_id == session()->get('incharge_id'))
    @if ($count == 1)
        <b>{{$lists->department_name}}</b>
@php
$count = $count+1
@endphp
    @endif  
  @endif 
@endforeach  

    </h3> 
    <br>

</div>

<div class="container box "> 
<div class="button">
<a href="#"  class="btn btn-danger text-dark badge-pill"style="width:80px">BSIT</a>
<a href="#"  class="btn btn-secondary text-dark badge-pill"style="width:80px">BSHM</a>
<a href="#"  class="btn btn-warning text-dark badge-pill"style="width:80px">BSED</a>
<a href="#"  class="btn btn-primary text-dark badge-pill"style="width:80px">BEED</a>
<a href="#"  class="btn btn-success text-dark badge-pill"style="width:80px">BSSW</a>

<div class="float-right"> 
<button type="button" onclick="window.print()" class="btn btn-info btn-rounded"><i class="fas fa-print"></i> Print</button>
</div>

</div>
<div class="select">
<select class="form-select"  style="width:15%; margin:5px;">
  <option selected>Select Year</option>
  <option value="1">1st</option>
  <option value="2">2nd</option>
  <option value="3">3rd</option>
  <option value="3">4th</option>
</select>
</div>

<div class="container box "> 
    <table id="example" class="table table-bordered table-striped">
    <thead class="table-primary table-sm">
    <tr>
       <th width="20%">Student Name</th>
       <th width="30%">Courses</th>
       <th width="15%">Year</th>
       <th width="10%">Status</th>
       <th width="5%">Notes</th>
       <th width="15%">Data Cleared</th>
      </tr>
    </thead>
    <tbody>

    @foreach ($show as $lists)  

      @if ($lists->incharge_id == session()->get('incharge_id'))   
        <tr>
        <td>{{$lists->student_lname}}, {{$lists->student_fname}} {{$lists->student_mname}}. </td>
        <td>{{$lists->course_name}}</td>
        <td>{{$lists->student_year}}</td>

        @if($lists->status == "Pending")
            <td><a href="{{route('edit_status', $lists->id)}}" class="btn btn-warning">{{$lists->status}} </a></td>
            @if($lists->notes != "")
                <td>{{$lists->notes}}</td>
            @elseif ($lists->notes == "")
                <td><a href="#" class="btn btn-primary" id="myBtn" ><i class="far fa-sticky-note"></i></a></td>
            @endif
        
        @elseif ($lists->status == "Cleared")
            <td><a href="{{route('edit_status', $lists->id)}}" class="btn btn-success">{{$lists->status}}</a></td>
            <td>{{$lists->notes}}</td>
        @endif



        <td>{{$lists->date_cleared}}</td>
        </tr>
      @endif 
        
    @endforeach

    </tbody>
    </table> 

 


<!-- <div class="container col-md-6 offset-md-3 mt-5">

<div class="mt-5">
    <h3 class="text-center">

    @php
$count = 1
@endphp 
@foreach ($show as $lists)  
  @if ($lists->incharge_id == session()->get('incharge_id'))
    @if ($count == 1)
        <b>{{$lists->department_name}}</b>
@php
$count = $count+1
@endphp
    @endif  
  @endif 
@endforeach  

    </h3> 
    <br>

</div>


    <table class="table table-hover table-bordered">
    <thead class="table-primary table-sm">
        <tr>
        <th scope="col">Student Name</th>
        <th scope="col">Status</th>
        <th scope="col">Notes</th>
        <th scope="col">Date Cleared</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($show as $lists)  

      @if ($lists->incharge_id == session()->get('incharge_id'))   
        <tr>
        <td>{{$lists->student_lname}}, {{$lists->student_fname}} {{$lists->student_mname}}. </td>

        @if($lists->status == "Pending")
            <td><a href="{{route('edit_status', $lists->id)}}" class="btn btn-warning">{{$lists->status}}</a></td>
            @if($lists->notes != "")
                <td>{{$lists->notes}}</td>
            @elseif ($lists->notes == "")
                <td><a href="#" class="btn btn-primary" id="myBtn" >Add Note</a></td>
            @endif
        
        @elseif ($lists->status == "Cleared")
            <td><a href="{{route('edit_status', $lists->id)}}" class="btn btn-success">{{$lists->status}}</a></td>
            <td>{{$lists->notes}}</td>
        @endif



        <td>{{$lists->date_cleared}}</td>
        </tr>
      @endif 
        
    @endforeach

    </tbody>
    </table> -->
    
    @include('Modals.edit_notes')


</div>
</div>
</div>
</div>

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


@endsection