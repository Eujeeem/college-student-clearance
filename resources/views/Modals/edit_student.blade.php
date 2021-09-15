@extends('layout.master')

@section('title')
    Admin - Edit Student
@endsection


@section('content')


@include('sections.header')


<div class="container add_student mt-2">
                
                    <form action="{{route('update_student', $lists->id)}}" method="post" >
                    @csrf
                        <b><div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" value="{{$lists->student_fname}}" class="form-control" name="fname">
                        </div>
                        <div class="mb-3">
                        <label for="middlename" class="form-label">Middle Name</label>
                        <input type="text" value="{{$lists->student_mname}}" class="form-control" name="mname">
                        </div>
                        <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" value="{{$lists->student_lname}}" class="form-control" name="lname">
                        </div> 
                        <div class="mb-3">
                        <label for="contactnumber" class="form-label">Contact Number</label>
                        <input type="text" value="{{$lists->student_contactnumber}}" class="form-control" name="contactnumber">
                        </div>                                               
                        <div class="mb-3">
                        <label for="coursename" class="form-label">Course Name</label>
                            <select name="course_name" value="{{$lists->course_name}}" class="form-control">
                            <option value="{{$lists->course_name}}">{{$lists->course_name}}</option>
                            <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                            <option value="Bachelor of Science in Social Work">Bachelor of Science in Social Work</option>  
                            <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>                          
                            <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                            </select>
                        </div>
                        <div class="mb-3">
                        <label for="year" class="form-label">Year level</label>
                            <select name="year" class="form-control">
                            <option value="{{$lists->student_year}}">{{$lists->student_year}}</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>  
                            <option value="4th Year">4th Year</option>                          
                            </select>
                        </div>                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('admin_students')}}" class="btn btn-danger ms-3">Cancel</a></b>
                    </form>

            </div>

@endsection