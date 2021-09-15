@extends('layout.master')

@section('title')
    Admin - Edit Department
@endsection


@section('content')


@include('sections.header')


<div class="container add_student mt-5">
                
    <form action="{{route('update_department', $lists->id)}}" method="post">
    @csrf
        <div class="mb-3">
        
        <label for="DepartmentName" class="form-label"><b>Department Name</b></label>
        <input type="text" value="{{$lists->department_name}}" class="form-control" name="department">
        </div>

        <div class="mb-3">
        <label for="inchargename" class="form-label"><b>Incharge</b></label>
            <select name="incharge" class="form-control">
            @foreach($incharge as $shows)
                <option value="{{$shows->id}}">{{$shows->incharge_name}}</option>
            @endforeach    
            </select>

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('admin_departments')}}" class="btn btn-danger ms-3">Cancel</a>
    </form>
    

</div>