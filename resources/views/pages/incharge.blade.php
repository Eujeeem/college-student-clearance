@extends('layout.master')

@section('title')
    Home
@endsection

@section('content')


@include('sections.header_incharge')
<nav class="side-nav navbar-dark bg-primary" 
style="min-height: 1070px;width: 15%;"> <img src="/images/logo.png " style="min-height: 130px;width: 80%; margin-left:10%"><br><br><br>


<div>
<a href="{{route('incharge_BSIT')}}"  class="btn btn-primary text-dark round-0 "style="width:100%; border-radius:0;box-shadow:0px 0px">BSIT</a>
<a href="{{route('incharge_BSHM')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0;box-shadow:0px 0px">BSHM</a>
<a href="{{route('incharge_BSBA')}}"  class="btn btn-primary text-dark"style="width:100%; border-radius:0;box-shadow:0px 0px">BSBA</a>
<a href="{{route('incharge_BEED')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px">BEED</a>
<a href="{{route('incharge_BSSW')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px">BSSW</a>
<a href="{{route('incharge_BSED')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px">BSED</a>
<a href="{{route('incharge')}}"  class="btn btn-light text-dark "style="width:100%; font-size:20px; border-radius:0; box-shadow:0px 0px"><strong>ALL</strong></a>  
</div>  
</nav>

<div class="container col-md-6 offset-md-3 mt-5">
    <h3 class="text-center">

    @php
$count = 1
@endphp 
@foreach ($show as $list)  
  @if ($list->incharge_id == session()->get('incharge_id'))
    @if ($count == 1)
        <b>{{$list->department_name}}</b>
        <b>{{$list->id}}</b>
@php
$count = $count+1;
$departmentname = $list->department_name
@endphp
    @endif  
  @endif 
@endforeach  

    </h3> 
    <br>

</div>


<div class="container box mb-5 " style="width:80%; margin-left: 18%"> 
<div class="float-right"> 
<button type="button" onclick="window.print()" class="btn btn-dark btn-rounded mb-4 "><i class="fas fa-print"></i> Print</button>
</div>
<div class="button">
<a href="{{route('incharge_home_first')}}"  class="btn btn-primary text-white "style="width:130px; border-radius: 5px 5px 0px 0px;box-shadow:0px 0px ">1ST YEAR</a>
<a href="{{route('incharge_home_second')}}"  class="btn btn-primary text-white "style="width:130px; border-radius: 5px 5px 0px 0px;box-shadow:0px 0px ">2nd YEAR</a>
<a href="{{route('incharge_home_third')}}"  class="btn btn-primary text-white"style="width:130px; border-radius: 5px 5px 0px 0px;box-shadow:0px 0px ">3RD YEAR</a>
<a href="{{route('incharge_home_forth')}}"  class="btn btn-primary text-white "style="width:130px; border-radius: 5px 5px 0px 0px;box-shadow:0px 0px ">4TH YEAR</a>
<a href="{{route('incharge')}}"  class="btn text-primary "style="width:100px; border-radius: 5px 5px 0px 0px; box-shadow:0px 0px; background-color: #ccc "><strong>All Year</strong></a>

</div>

<div class="container box2 ">
    <table id="example" class="table table-bordered table-striped">
    <thead class="table-primary table-sm">
    <tr>
       <th width="20%">Student Name</th>
       <th width="30%">Courses</th>
       <th width="10%">Year</th>
       <th width="10%">Status</th>
       <th width="20%">Notes</th>
       <th width="10%">Data Cleared</th>
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
            <td><a href="{{route('edit_status', $lists->id)}}" class="btn btn-warning" onclick="return confirm('Are you sure you want to approve this student?');">{{$lists->status}} </a></td>
            @if($lists->notes != "")
                <td><a href="{{route('update_notes',[$departmentname, $lists->id])}}" ><i class="far fa-sticky-note"></i></a>  {{$lists->notes}}</td>
            @elseif ($lists->notes == "")
                <td>{{$lists->notes}}<a href="{{route('update_notes',[$departmentname, $lists->id])}}"><i class="far fa-sticky-note fa-2xs"></i></a></td>
            @endif
        
        @elseif ($lists->status == "Cleared")
            <td><a href="{{route('edit_status', $lists->id)}}" class="btn btn-success" onclick="return confirm('Are you sure you want to return this student to pending?');">{{$lists->status}}</a></td>
            <td><a href="{{route('update_notes',[$departmentname, $lists->id])}}" ><i class="far fa-sticky-note"></i></a> {{$lists->notes}}</b></td>
        @endif



        <td>{{$lists->date_cleared}}</td>
        </tr>
      @endif 
        
    @endforeach

    </tbody>
    </table> 


    



    </div>
</div>

@endsection

@section('scripts')

<script>
  $(document).ready(function() {
        $('#example').DataTable();
    } );
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
$(document).ready(function() {
        $('#example').DataTable();
    } );
</script>


@endsection