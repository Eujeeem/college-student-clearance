@extends('layout.master')

@section('title')
    Home
@endsection

@section('content')

@include('sections.header')
<section>
<nav class="side-nav navbar-dark bg-primary" 
  style="min-height: 1000px;width: 15%;"> <img src="/images/logo.png " style="min-height: 130px;width: 100%;"><br><br><br>

    <ul>
    <li><a href="{{route('admin')}}"class=" btn-primary "><i class="fas fa-home"></i> Dashboard </a></li><br>
      <li><a href="{{route('admin_students')}}"class=" btn-primary "><i class="fas fa-user-graduate"></i> Students</a></li><br>
      <li><a href="{{route('admin_departments')}}"class=" btn-primary "><i class="fas fa-chalkboard-teacher"></i> Departments</a></li><br>
      <li><a href="{{route('admin_incharge')}}"class="btn-primary "><i class="fas fa-address-book"></i> In-charge</a></li><br>
      <div class="nav-item dropdown">
      <li><a class="dropdown-toggle btn-primary"  role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-sms"></i>
    Contact us</a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <li><a class="dropdown-item" href="https://www.facebook.com/Roland021499/">Mr.Roland</a></li>
    <li><a class="dropdown-item" href="https://www.facebook.com/jhempotxD">Mr.Mondala</a></li>
    <li><a class="dropdown-item" href="https://www.facebook.com/annilyn.roma.1">Ms.Roma</a></li>
  </ul>
  <li><a href="https://www.facebook.com/assumptiondavao.edu.ph"  class="fab fa-facebook"></a>
  <a href="#"  class="fab fa-instagram"></a>
  <a href="#"  class="fab fa-twitter"></a></li>
</div>
  </nav> 

  

<div class="main-section">
<div class="dashbord">
<div class="icon-section">
<i class="fa fa-users" aria-hidden="true"></i><br>
<small>Student</small>
<p>256</p>
</div>
<div class="detail-section">
<a href="#">More Info </a>
</div>
</div>
<div class="dashbord dashbord-green">
<div class="icon-section">
<i class="fa fa-building" aria-hidden="true"></i><br>
<small>Department</small>
<p>100</p>
</div>
<div class="detail-section">
<a href="#">More Info </a>
</div>
</div>
<div class="dashbord dashbord-orange">
<div class="icon-section">
<i class="fa fa-tasks" aria-hidden="true"></i><br>
<small>In-Charge</small>
<p>90</p>
</div>
<div class="detail-section">
<a href="#">More Info </a>
</div>
</div>
<div class="dashbord dashbord-blue">
<div class="icon-section">
<i class="fa fa-question-circle" aria-hidden="true"></i><br>
<small>unknown</small>
<p>unknown</p>
</div>
<div class="detail-section">
<a href="#">More Info </a>
</div>
</div>
<div class="dashbord dashbord-red">
<div class="icon-section">
<i class="fa fa-question-circle" aria-hidden="true"></i><br>
<small>unknown</small>
<p>unknown</p>
</div>
<div class="detail-section">
<a href="#">More Info </a>
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