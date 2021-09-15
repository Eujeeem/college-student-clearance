@extends('layout.master')

@section('title')
    Admin - Incharge
@endsection


@section('content')


@include('sections.header')
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
<div class="container col-md-8 offset-md-3 mt-5">
<a href="#" class="btn btn-primary" id="myBtn" >Add</a>
<a href="{{route('admin')}}" class="btn btn-secondary offset-md-9">Back</a>

<!-- Table -->
<div class="grid-container mt-3  ">
    <table id="example" class="table table-hover table-bordered" style="width:115%">
    <thead class="table-primary table-sm border-dark">
        <tr>
        <th >ID</th>
        <th >Incharge Name</th>
        <th >Department Name</th>
        <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($show as $lists)
        <tr>
        <td>{{$lists->id}}</td> 
        <td>{{$lists->incharge_name}}</td>        
        <td>{{$lists->department_name}} </td>
        <td class="text-center"><a href="{{route('edit_incharge', $lists->id)}}" class="me-1"><i class="fas fa-edit"></i></a><a href="{{route('delete_incharge', $lists->id)}}" onclick="return confirm('Are you sure you want to delete it?');"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    @endforeach

    </tbody>
    </table>

    @include('Modals.add_incharge')

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

  <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>


@endsection