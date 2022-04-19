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
<a href="{{route('admin_incharge')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px  ">In-charge</a>
<a href="{{route('admin_assistant')}}"  class="btn btn-light text-dark round-0"style="width:100%; border-radius:0; box-shadow:0px 0px font-size:20px;"><strong>Assistant In-charge</strong></a>
</div>  
</nav>
<div class="container col-md-8 offset-md-3 mt-5">
<a href="{{route('add_new_incharge')}}" class="btn btn-primary ml-5" id="myBtn" >Add</a>
<a href="{{route('admin')}}" class="btn btn-secondary offset-md-9">Back</a>

<!-- Table -->
<div class="container box mt-3 ">
    <table id="example" class="table table-bordered table-striped">
    <!-- <table id="example" class="table table-hover table-bordered"> -->

     <thead>
      <tr>
       <th width="10%">ID</th>
       <th width="15%">Assistant Name</th>
       <th width="10%">Department Name</th>
       <th width="10%">Action</th>
      </tr>
     </thead>
     <tbody>
     @foreach ($user as $lists)
     @if ($lists->type == 'assistant')
     @if ($lists->incharge_name != '')
        <tr>
        <td>{{$lists->incharge_id}}</td> 
        <td>{{$lists->incharge_name}}</td>  
        @php 
        $value = \App\Models\Department::where(['assistant_incharge' => $lists->incharge_id])->pluck('department_name')->first();
        @endphp
        <td>{{$value}}  </td>      
        <!-- <td>{{$lists->department_name}} </td> -->
        <td class="text-center"><a href="{{route('edit_incharge', $lists->incharge_id)}}" class="me-1"><i class="fas fa-edit"></i></a><a href="{{route('delete_incharge', $lists->id)}}" onclick="return confirm('Are you sure you want to delete it?');"><i class="fas fa-trash-alt"></i></a>  <a href="{{route('reset_user', $lists->incharge_id)}}" onclick="return confirm('Are you sure you want to reset the password?');" class="me-1"><i class="fas fa-redo-alt"></i></a></td>
        </tr>
        @endif  
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
  </script>


@endsection