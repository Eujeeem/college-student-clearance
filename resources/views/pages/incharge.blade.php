@extends('layout.master')

@section('title')
    Incharge - Home
@endsection

@section('content')


@include('sections.header_incharge')
<nav class="side-nav navbar-dark bg-primary" 
style="min-height: 1000px;width: 15%; position:fixed; overflow-y:hidden; overflow-x:hidden;"> <img src="/images/logo.png " style="min-height: 130px;width: 80%; margin-left:10%; margin-top:10%;"><br><br><br>


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

<div class="container col-md-6 offset-md-3 mt-5 pt-5">
    <h3 class="text-center">

    <!-- @php
$count = 1
@endphp 
@foreach ($show as $list)  
  @if ($list->incharge_id == session()->get('incharge_id'))
    @if ($count == 1)
        <h1><b>{{$list->department_name}}1</b></h1>

    @php
    $count = $count+1;
    $departmentname = $list->department_name
    @endphp
    @endif  

  @else
    @php
    $count = $count+1;
    $departmentname = "";
    @endphp
  @endif 
@endforeach   -->
      
      @php 
      $value = \App\Models\Department::where(['incharge_id' => session('incharge_id')])->pluck('department_name')->first();
      @endphp
      {{$value}}  


      
    </h3> 
    <br>

</div>


<div class="container box mb-5 " style="width:80%; margin-left: 18%"> 
<div class="float-right"> 
</div>
<div class="button">
<a href="{{route('incharge_home_first')}}"  class="btn btn-primary text-white "style="width:130px; border-radius: 5px 5px 0px 0px;box-shadow:0px 0px ">1ST YEAR</a>
<a href="{{route('incharge_home_second')}}"  class="btn btn-primary text-white "style="width:130px; border-radius: 5px 5px 0px 0px;box-shadow:0px 0px ">2nd YEAR</a>
<a href="{{route('incharge_home_third')}}"  class="btn btn-primary text-white"style="width:130px; border-radius: 5px 5px 0px 0px;box-shadow:0px 0px ">3RD YEAR</a>
<a href="{{route('incharge_home_forth')}}"  class="btn btn-primary text-white "style="width:130px; border-radius: 5px 5px 0px 0px;box-shadow:0px 0px ">4TH YEAR</a>
<a href="{{route('incharge')}}"  class="btn text-primary "style="width:100px; border-radius: 5px 5px 0px 0px; box-shadow:0px 0px; background-color: #ccc "><strong>All Year</strong></a>

</div>

<div class="container box2 ">
    <form  name="statusForm" method="POST" onsubmit="return validateForm()" class="incharge-form" required>
      @csrf
      <button formaction="{{route('studentStatus', $value)}}" type="submit" class="btn btn-success mb-2 approve" id="approveBtn" >Approve Selected</button>
    <table id="example" class="table table-bordered table-striped">
    <thead class="table-primary table-sm">
    <tr>
      <th width="3%"><input type="checkbox" id="chkCheckAll" /></th>
      <th width="10%">Student Name</th>
      <th width="12%">Courses</th>
      <th width="8%">Year</th>
      <th width="10%">Status</th>
      <th width="12%">Remarks</th>
      <th width="8%">Data Cleared</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($show as $lists)  

      @if ($lists->incharge_id == session()->get('incharge_id'))   
        <tr>
        <td><input type="checkbox" name="ids[]" class="checkBoxClass" value="{{$lists->id}}"/></td>
        <td>{{$lists->student_lname}}, {{$lists->student_fname}} {{$lists->student_mname}}. </td>
        <td>{{$lists->course_name}}</td>
        <td>{{$lists->student_year}}</td>
        
        @if($lists->status == "Pre-Approved")
            <td><a href="{{route('edit_status', $lists->id)}}" class="btn btn-warning" onclick="return confirm('Are you sure you want to approve this student?');">{{$lists->status}} </a></td>
            @if($lists->notes != "")
                <td><a href="{{route('update_notes',[$value, $lists->id])}}" ><i class="fas fa-edit"></i></a>  
            <a class="fas fa-bell ml-3" data-bs-toggle="collapse" href="#{{$lists->student_lname}}" role="button" aria-expanded="false" aria-controls="collapseExample">See Notes</a>
              <div class="collapse" id="{{$lists->student_lname}}">
            <div class="card card-body">
           {{$lists->notes}}
            </div>
            </div>
              </td>
                @elseif ($lists->notes == "")
                <td>{{$lists->notes}}<a href="{{route('update_notes',[$value, $lists->id])}}"><i class="fas fa-edit"></i></a></td>
                @endif
        
        @elseif ($lists->status == "Cleared")
            <td><a href="{{route('edit_status', $lists->id)}}" class="btn btn-success" onclick="return confirm('Are you sure you want to return this student to pending?');">{{$lists->status}}</a></td>
            @if($lists->notes != "")
                <td><a href="{{route('update_notes',[$value, $lists->id])}}" ><i class="fas fa-edit"></i></a>  
            <a class="fas fa-bell ml-3" data-bs-toggle="collapse" href="#{{$lists->student_lname}}" role="button" aria-expanded="false" aria-controls="collapseExample">See Notes</a>
              <div class="collapse" id="{{$lists->student_lname}}">
            <div class="card card-body">
           {{$lists->notes}}
            </div>
            </div>
              </td>
                @elseif ($lists->notes == "")
                <td>{{$lists->notes}}<a href="{{route('update_notes',[$value, $lists->id])}}"><i class="fas fa-edit"></i></a></td>
                @endif
            
        @endif

        <td>{{$lists->date_cleared}}</td>

        </tr>
      @endif 
        
    @endforeach

    </tbody>
    </table> 
</form>


    



    </div>
</div>

@endsection

@section('scripts')

<script>
    $(function(e){
        $("#chkCheckAll").click(function(){
          $(".checkBoxClass").prop('checked',$(this).prop('checked'));
        })
    });

    $("#changeStatus").click(function(e){
      e.preventDefault();
      var allids = [];

      $("input:checkbox[name=ids]:checked").each(function(){
        allids.push($(this).val());
      });


    
    });
</script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script type="text/javascript">
    $('.approve').click(function(){
        var vals = "";
        $.each($("input[name='ids[]']:checked"), function(){  
            vals += "~"+$(this).val();  
        });
        if (vals){
            vals = vals.substring(1);
        }else{
            alert('Please choose atleast one value.')
        }


    });
</script>

@endsection