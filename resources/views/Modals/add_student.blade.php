@extends('layout.master')

@section('title')
    Admin - Add New Student
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
</div>  
</nav>

<div id="" class="container col-md-5 offset-md-3 mt-5">
            
<h1 style="font-family: Courier New; font-weight: Bold;">Add New Student</h1>

            <div class=" add_student " >
                
                    <form action="{{route('add_student')}}" method="post" >
                    @csrf
                    <b><div class="mb-3">
                        <label for="firstname" class="form-label " style="width: 200px; text-align: left;">First Name</label>
                        <input type="text" class="form-control" name="fname" required="required">
                        </div>
                        <div class="mb-3">
                        <label for="middlename" class="form-label" style="width: 200px; text-align: left;">Middle Name</label>
                        <input type="text" class="form-control" name="mname" required="required">
                        </div>
                        <div class="mb-3">
                        <label for="lastname" class="form-label" style="width: 200px; text-align: left;">Last Name</label>
                        <input type="text" class="form-control" name="lname" required="required">
                        </div> 
                        <div class="mb-3">
                        <label for="contactnumber" class="form-label" style="width: 200px; text-align: left;">Contact Number</label>
                        <input type="number" class="form-control" name="contactnumber" required="required">
                        </div>                                               
                        <div class="mb-3">
                        <label for="coursename" class="form-label" style="width: 200px; text-align: left;">Course Name</label>
                            <select name="course_name" class="form-control" required>
                            <option value="" disabled selected hidden>Choose a Course</option>
                            <option value="Bachelor of Science in Business Administration">Bachelor of Science in Business Administration</option>  
                            <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>                          
                            <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
                            <option value="Bachelor of Science in Social Work">Bachelor of Science in Social Work</option>
                            <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                            <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                            </select>
                        </div>
                        <div class="mb-3">
                        <label for="year" class="form-label" style="width: 200px; text-align: left;">Year level</label>
                            <select name="year" class="form-control" required>
                            <option value="" disabled selected hidden>Year Level</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>  
                            <option value="4th Year">4th Year</option>                          
                            </select>
                        </div>                        
                        <button type="submit" class="btn btn-primary">Submit</button></b>
                        <a href="{{route('admin_students')}}" class="btn btn-danger">Cancel</a>   
                    </form>
                            
            </div>
            
        </div>