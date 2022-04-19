@extends('layout.master')

@section('title')
    Incharge - Home
@endsection

@section('content')


@include('sections.header_incharge')
<nav class="side-nav navbar-dark bg-primary" style="min-height: 1000px;width: 15%; position:fixed; overflow-y:hidden; overflow-x:hidden;"> 
<img src="/images/logo.png " style="min-height: 130px;width: 80%; margin-left:10%; margin-top:10%"><br><br><br>



</nav>


<center><div class="container add_student mt-5 pt-5">

<h1 style="font-family: Courier New; font-weight: Bold;">Remarks</h1>
                
<form action="{{route('edit_notes', $lists->id)}}" method="post">
    @csrf
     <div class="mb-5 ">
        
        <label for="DepartmentName" class="form-label " style="width: 200px; text-align: left;"><b>{{$student->student_lname}}, {{$student->student_fname}}'s Note:</b></label>
        <!-- <input type="text" value="{{$lists->notes}}" class="form-control" name="department" cols="50" rows="10"> -->
        <textarea name="notes" cols="60" rows="10" >{{$lists->notes}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="javascript:history.go(-1)" class="btn btn-danger">Cancel</a>
    </form>
    

</div></center>

 @endsection