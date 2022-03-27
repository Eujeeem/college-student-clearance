@extends('layout.master')

@section('title')
    Incharge - Home
@endsection

@section('content')


@include('sections.header_incharge')
<nav class="side-nav navbar-dark bg-primary" style="min-height: 1000px;width: 15%;"> 
<img src="/images/logo.png " style="min-height: 130px;width: 80%; margin-left:10%"><br><br><br>


<div>
<a href="{{route('incharge_BSIT')}}"  class="btn btn-primary text-dark round-0 "style="width:100%; border-radius:0;box-shadow:0px 0px">BSIT</a>
<a href="{{route('incharge_BSHM')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0;box-shadow:0px 0px">BSHM</a>
<a href="{{route('incharge_BSBA')}}"  class="btn btn-primary text-dark"style="width:100%; border-radius:0;box-shadow:0px 0px">BSBA</a>
<a href="{{route('incharge_BEED')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px">BEED</a>
<a href="{{route('incharge_BSSW')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px">BSSW</a>
<a href="{{route('incharge_BSED')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px">BSED</a>
<a href="{{route('incharge')}}"  class="btn btn-light text-dark "style="width:100%; font-size:20px; border-radius:0; box-shadow:0px 0px"><strong>ALL</strong></a>  
</div>  
</nav>


<div class="container add_student mt-5">

<h1 style="font-family: Courier New; font-weight: Bold;">Notes</h1>
                
    <form action="{{route('edit_notes', $lists->id)}}" method="post">
    @csrf
        <div class="mb-3">
        
        <label for="DepartmentName" class="form-label " style="width: 200px; text-align: left;"><b>{{$student->student_lname}}, {{$student->student_fname}}'s Note:</b></label>
        <!-- <input type="text" value="{{$lists->notes}}" class="form-control" name="department" cols="50" rows="10"> -->
        <textarea name="notes" cols="60" rows="10">{{$lists->notes}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
    </form>
    

</div>

 @endsection