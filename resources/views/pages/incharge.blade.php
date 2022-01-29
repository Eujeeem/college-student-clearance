@extends('layout.master')

@section('title')
    Home
@endsection

@section('content')


@include('sections.header_incharge')
<nav class="side-nav navbar-dark bg-primary" 
  style="min-height: 1000px;width: 15%;"> <img src="/images/logo.png " style="min-height: 130px;width: 80%; margin-left:10%"><br><br><br>


<div>
<a href="{{route('incharge_BSIT')}}"  class="btn btn-primary text-dark round-0 "style="width:100%; border-radius:0">BSIT</a>
<a href="{{route('incharge_BSHM')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0">BSHM</a>
<a href="{{route('incharge_BSBA')}}"  class="btn btn-primary text-dark"style="width:100%; border-radius:0">BSED</a>
<a href="{{route('incharge_BEED')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0">BEED</a>
<a href="{{route('incharge_BSSW')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0">BSSW</a>
<a href="{{route('incharge_BSED')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0">BSED</a>
<a href="{{route('incharge')}}"  class="btn btn-light text-dark "style="width:100%; border-radius:0; font-size:20px; box-shadow:0px 0px"><strong>ALL</strong></a>  
</div>  
</nav>

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
<div class="float-right"> 
<button type="button" onclick="window.print()" class="btn btn-dark btn-rounded mb-4 "><i class="fas fa-print"></i> Print</button>
</div>
<div class="button">
<a href="{{route('incharge_BSIT')}}"  class="btn btn-primary text-white "style="width:100px; border-radius: 5px 5px 0px 0px;box-shadow:0px 0px ">1st Year</a>
<a href="{{route('incharge_BSHM')}}"  class="btn btn-primary text-white "style="width:100px; border-radius: 5px 5px 0px 0px;box-shadow:0px 0px;">2nd Year</a>
<a href="{{route('incharge_BSBA')}}"  class="btn btn-primary text-white "style="width:100px; border-radius: 5px 5px 0px 0px;box-shadow:0px 0px">3rd Year</a>
<a href="{{route('incharge_BEED')}}"  class="btn btn-primary text-white "style="width:100px; border-radius: 5px 5px 0px 0px;box-shadow:0px 0px">4th Year</a>
<a href="{{route('incharge_BSSW')}}"  class="btn btn-secondary text-white "style="width:100px; border-radius: 5px 5px 0px 0px; box-shadow:0px 0px">All Year</a>



</div>

<div class="container box2 "> 
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