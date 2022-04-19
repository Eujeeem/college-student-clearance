@extends('layout.master')

@section('title')
    Home
@endsection

@section('content')

@include('sections.header2')
<section>
<nav class="side-nav navbar-dark bg-primary" 
style="min-height: 1000px;width: 15%; position:fixed; overflow-y:hidden; overflow-x:hidden;"> <img src="/images/logo.png " style="min-height: 130px;width: 80%; margin-left:10%; margin-top:25%;"><br><br><br>


<div>
<a href="{{route('admin')}}"  class="btn btn-light text-dark round-0" style="width:100%; border-radius:0; box-shadow:0px 0px font-size:20px;"><strong>Dashboard</strong></a>
<a href="{{route('admin_students')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px ">Students</a>
<a href="{{route('admin_departments')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px  ">Departments</a>
<a href="{{route('admin_incharge')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px ">In-charge</a>
<a href="{{route('admin_assistant')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px  ">Assistant In-charge</a>
</div>  
</nav>

  

<div class="main-section">
<div class="dashbord">
<div class="icon-section">
<i class="fa fa-users" aria-hidden="true"></i><br>
<small>Student</small>
<p>{{$student}}</p>
</div>
<div class="detail-section">
<a href="{{route('admin_students')}}">More Info </a>
</div>
</div>
<div class="dashbord dashbord-green">
<div class="icon-section">
<i class="fa fa-building" aria-hidden="true"></i><br>
<small>Department</small>
<p>{{$department}}</p>
</div>
<div class="detail-section">
<a href="{{route('admin_departments')}}">More Info </a>
</div>
</div>
<div class="dashbord dashbord-orange">
<div class="icon-section">
<i class="fa fa-tasks" aria-hidden="true"></i><br>
<small>In-Charge</small>
<p>{{$incharge}}</p>
</div>
<div class="detail-section">
<a href="{{route('admin_incharge')}}">More Info </a>
</div>
</div>
<div class="dashbord dashbord-blue">
<div class="icon-section">
<i class="fa fa-users" aria-hidden="true"></i><br>
<small>Assistant Incharge</small>
<p>{{$users}}</p>
</div>
<div class="detail-section">
<a href="{{route('admin_assistant')}}">More Info </a>
</div>
</div>
</div>
</div>
</div>




</section>

@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>
@endsection