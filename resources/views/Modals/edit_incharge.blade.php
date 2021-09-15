@extends('layout.master')

@section('title')
    Admin - Edit Incharge
@endsection


@section('content')


@include('sections.header')


<div class="container add_student mt-5">
                
    <form action="{{route('update_incharge', $lists->id)}}" method="post">
    @csrf
        <div class="mb-3">
        
        <label for="inchargename" class="form-label"><b>Incharge Name</b></label>
        <input type="text" value="{{$lists->incharge_name}}" class="form-control" name="incharge">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('admin_incharge')}}" class="btn btn-danger ms-3">Cancel</a>
    </form>

</div>