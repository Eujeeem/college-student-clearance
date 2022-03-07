@extends('layout.master')

@section('title')
    Admin - Edit Incharge
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

<div class="container add_student mt-5">

<h1 style="font-family: Courier New; font-weight: Bold;">Edit In-charge</h1>
                
    <form action="{{route('update_incharge', $lists->id)}}" method="post">
    @csrf
        <div class="mb-3">
        
        <label for="inchargename" class="form-label" style="width: 200px; text-align: left;"><b>Incharge Name</b></label>
        <input type="text" value="{{$lists->incharge_name}}" class="form-control" name="incharge">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('admin_incharge')}}" class="btn btn-danger">Cancel</a>
    </form>

</div>