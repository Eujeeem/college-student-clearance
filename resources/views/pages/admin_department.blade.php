@extends('layout.master')

@section('title')
    Admin - Departments
@endsection


@section('content')


@include('sections.header2')

  <nav class="side-nav navbar-dark bg-primary" 
  style="min-height: 1000px;width: 15%;"> <img src="/images/logo.png " style="min-height: 130px;width: 80%; margin-left:10%"><br><br><br>


<div>
<a href="{{route('admin')}}"  class="btn btn-primary text-dark" style="width:100%; border-radius:0; box-shadow:0px 0px">Dashboard</a>
<a href="{{route('admin_students')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px">Students</a>
<a href="{{route('admin_departments')}}"  class="btn btn-light text-dark round-0"style="width:100%; border-radius:0; box-shadow:0px 0px  font-size:20px;"><strong>Departments</strong></a>
<a href="{{route('admin_incharge')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px">In-charge</a>
<a href="{{route('admin_assistant')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px  ">Assistant In-charge</a>
</div>  
</nav>
<div class="container col-md-8 offset-md-3 mt-5">
<a href="{{route('add_new_department')}}" class="btn btn-primary ml-5">Add</a>
<a href="{{route('admin')}}" class="btn btn-secondary offset-md-9">Back</a>

<!-- Table -->
<div class="container box mt-3 ">
    <table id="example" class="table table-bordered table-striped">
    <!-- <table id="example" class="table table-hover table-bordered"> -->

     <thead>
      <tr>
       <th width="10%">Department Name</th>
       <th width="15%">In-charge</th>
       <th width="15%">Assistant In-charge</th>
       <th width="10%">Action</th>
      </tr>
     </thead>
     <tbody>
     @foreach ($show as $lists)
      
      <tr>
      <td>{{$lists->department_name}} </td>
      <td>{{$lists->incharge_name}} </td>
      <!-- <td>{{$lists->assistant_incharge}} </td> -->
      
      @php 
      $value = \App\Models\Incharge::where(['id' => $lists->assistant_incharge])->pluck('incharge_name')->first();
      @endphp
      <td>{{$value}}  </td>
      <!-- @if($lists->type == "incharge")
      <td>{{$lists->incharge_name}}</td>
      @elseif ($lists->type == "assistant")
      <td>-</td>
      @elseif ($lists->type == "")
      <td>-</td>
      @endif 

      @if($lists->type == "incharge")
      <td>-</td>
      @elseif ($lists->type == "assistant")
      <td>{{$lists->incharge_name}}</td>
      @elseif ($lists->type == "")
      <td>-</td>
      @endif  -->
      <td class="text-center"><a href="{{route('edit_department', $lists->id)}}" class="me-1"><i class="fas fa-edit"></i></a><a href="{{route('delete_department', $lists->id)}}" onclick="return confirm('Are you sure you want to delete it?');"><i class="fas fa-trash-alt"></i></a></td>
      </tr>
    
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