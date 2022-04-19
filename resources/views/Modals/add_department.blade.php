@extends('layout.master')

@section('title')
    Admin - Add Departments
@endsection


@section('content')


@include('sections.header2')

<nav class="side-nav navbar-dark bg-primary" 
  style="min-height: 1000px;width: 15%; position:fixed; overflow-y:hidden; overflow-x:hidden;"> <img src="/images/logo.png " style="min-height: 130px;width: 80%; margin-left:10%; margin-top:10%"><br><br><br>


<div>
<a href="{{route('admin')}}"  class="btn btn-primary text-dark" style="width:100%; border-radius:0; box-shadow:0px 0px">Dashboard</a>
<a href="{{route('admin_students')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px">Students</a>
<a href="{{route('admin_departments')}}"  class="btn btn-light text-dark round-0"style="width:100%; border-radius:0; box-shadow:0px 0px  font-size:20px;"><strong>Departments</strong></a>
<a href="{{route('admin_incharge')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px">In-charge</a>
<a href="{{route('admin_assistant')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px  ">Assistant In-charge</a>
</div>  
</nav>


<div  class="container col-md-5 offset-md-3 mt-5 pt-5">
        
<h1 style="font-family: Courier New; font-weight: Bold;">Add New Department</h1>


            <div class="add_department">
                
                    <form action="{{route('add_department')}}" method="post">
                    @csrf
                        <div class="mb-3">
                        <label for="DepartmentName" class="form-label" style="width: 200px; text-align: left;">Department Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="department" placeholder="Enter Department Name" required="required">
                        </div>

                        <div class="mb-3">
                        <label for="inchargename" class="form-label" style="width: 200px; text-align: left;">In-charge</label>
                            <select name="incharge" class="form-control">
                            <option value="" disabled selected hidden>Select In-charge</option>
                                @foreach($incharge as $shows)
                                <option value="{{$shows->id}}">{{$shows->incharge_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                        <label for="inchargename" class="form-label" style="width: 200px; text-align: left;"><b>Assistant In-charge</b></label>
                            <select name="assistant" class="form-control">
                            <option value="" disabled selected hidden>Select Assistant In-charge</option>
                            @foreach($assistant as $shows)
                            @if ($shows->type == 'assistant')
                            @if ($shows->incharge_name != '')                          
                            <option value="{{$shows->incharge_id}}">{{$shows->incharge_name}}</option>
                            @endif 
                            @endif 
                            @endforeach    
                            </select>
                            </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="javascript:history.go(-1)" class="btn btn-danger">Cancel</a>   
                    </form>

            </div>

        </div>

@endsection