@extends('layout.master')

@section('title')
    Admin - Add In-charge
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

<div id="" class="col-md-5 offset-md-3 mt-5">

<h1 style="font-family: Courier New; font-weight: Bold;">Add New In-charge</h1>
       
            <div class=" add_incharge ">
                
                    <form action="{{route('add_incharge')}}" method="post">
                    @csrf
                        <div class="mb-3">
                        <label for="inchargeName" class="form-label" style="width: 200px; text-align: left;">In-charge Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="incharge" placeholder="Enter In-charge" required="required">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('admin_incharge')}}" class="btn btn-danger">Cancel</a>  
                    </form>

            </div>

</div>

@endsection