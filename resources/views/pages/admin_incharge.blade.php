@extends('layout.master')

@section('title')
    Admin - Incharge
@endsection


@section('content')


@include('sections.header2')
<nav class="side-nav navbar-dark bg-primary" 
  style="min-height: 1000px;width: 15%;"> <img src="/images/logo.png " style="min-height: 130px;width: 80%; margin-left:10%"><br><br><br>


<div>
<a href="{{route('admin')}}"  class="btn btn-primary text-dark" style="width:100%; border-radius:0; box-shadow:0px 0px">Dashboard</a>
<a href="{{route('admin_students')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px ">Students</a>
<a href="{{route('admin_departments')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px  ">Departments</a>
<a href="{{route('admin_incharge')}}"  class="btn btn-light text-dark round-0"style="width:100%; border-radius:0; box-shadow:0px 0px font-size:20px;"><strong>In-charge</strong></a>
</div>  
</nav>
<div class="container col-md-8 offset-md-3 mt-5">
<a href="#" class="btn btn-primary ml-5" id="myBtn" >Add</a>
<a href="{{route('admin')}}" class="btn btn-secondary offset-md-9">Back</a>

<!-- Table -->
<div class="container box mt-3 ">
    <table id="example" class="table table-bordered table-striped">
    <!-- <table id="example" class="table table-hover table-bordered"> -->

     <thead>
      <tr>
       <th width="10%">ID</th>
       <th width="15%">Incharge Name</th>
       <th width="10%">Department Name</th>
       <th width="10%">Action</th>
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
   </div>
<!-- <div class="grid-container mt-3  ">
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
    </table> -->

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