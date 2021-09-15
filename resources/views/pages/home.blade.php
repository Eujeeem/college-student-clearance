@extends('layout.master')

@section('title')
    Home
@endsection

@section('content')

@if($user->admin_id != NULL)
@include('pages.admin')
@endif

@if($user->student_id != NULL)
@include('pages.incharge')
@endif

@if($user->incharge_id != NULL)
@include('pages.student')
@endif



@endsection