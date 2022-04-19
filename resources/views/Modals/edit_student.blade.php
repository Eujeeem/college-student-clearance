@extends('layout.master')

@section('title')
    Admin - Edit Student
@endsection


@section('content')


@include('sections.header2')

<nav class="side-nav navbar-dark bg-primary" 
  style="min-height: 1000px;width: 15%;"> <img src="/images/logo.png " style="min-height: 130px;width: 80%; margin-left:10%"><br><br><br>


<div>
<a href="{{route('admin')}}"  class="btn btn-primary text-dark" style="width:100%; border-radius:0; box-shadow:0px 0px">Dashboard</a>
<a href="{{route('admin_students')}}"  class="btn btn-light text-dark round-0"style="width:100%; border-radius:0; box-shadow:0px 0px font-size:20px;"><strong>Students</strong></a>
<a href="{{route('admin_departments')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px  ">Departments</a>
<a href="{{route('admin_incharge')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px">In-charge</a>
<a href="{{route('admin_assistant')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px  ">Assistant In-charge</a>
</div>  
</nav>


<div class="container add_student col-md-5 offset-md-3 mt-5">

<h1 style="font-family: Courier New; font-weight: Bold;">Edit Student Record</h1>
                
                    <form action="{{route('update_student', $lists->id)}}" method="post" >
                    @csrf
                        <b><div class="mb-3">
                        <label for="firstname" class="form-label" style="width: 200px; text-align: left;">First Name</label>
                        <input type="text" value="{{$lists->student_fname}}" class="form-control" name="fname">
                        </div>
                        <div class="mb-3">
                        <label for="middlename" class="form-label" style="width: 200px; text-align: left;">Middle Name</label>
                        <input type="text" value="{{$lists->student_mname}}" class="form-control" name="mname">
                        </div>
                        <div class="mb-3">
                        <label for="lastname" class="form-label" style="width: 200px; text-align: left;">Last Name</label>
                        <input type="text" value="{{$lists->student_lname}}" class="form-control" name="lname">
                        </div> 
                        <div class="mb-3">
                        <label for="contactnumber" class="form-label" style="width: 200px; text-align: left;">Contact Number</label>
                        <input type="text" value="{{$lists->student_contactnumber}}" class="form-control" name="contactnumber">
                        </div>                                               
                        <div class="mb-3">
                        <label for="coursename" class="form-label" style="width: 200px; text-align: left;">Course Name</label>
                            <select name="course_name" value="{{$lists->course_name}}" class="form-control">
                            <option value="{{$lists->course_name}}" >{{$lists->course_name}}</option>
                            <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                            <option value="Bachelor of Science in Social Work">Bachelor of Science in Social Work</option>  
                            <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>                          
                            <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                            <option value="Bachelor of Science in Hospitality Management">Bachelor in Secondary Education</option>
                            <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Business Administrator</option>
                            </select>
                        </div>
                        <div class="mb-3">
                        <label for="year" class="form-label" style="width: 200px; text-align: left;">Year level</label>
                            <select name="year" class="form-control">
                            <option value="{{$lists->student_year}}" >{{$lists->student_year}}</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>  
                            <option value="4th Year">4th Year</option>                          
                            </select>
                        </div>                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="javascript:history.go(-1)" class="btn btn-danger">Cancel</a></b>
                    </form>

            </div>

@endsection