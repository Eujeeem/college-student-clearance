@extends('layout.master')

@section('title')
    Admin - Students
@endsection


@section('content')


@include('sections.header2')

<nav class="side-nav navbar-dark bg-primary" 
  style="min-height: 1000px;width: 15%; position:fixed; overflow-y:hidden; overflow-x:hidden;"> <img src="/images/logo.png " style="min-height: 130px;width: 80%; margin-left:10%; margin-top:5%;"><br><br><br>


<div>
<a href="{{route('admin')}}"  class="btn btn-primary text-dark" style="width:100%; border-radius:0; box-shadow:0px 0px">Dashboard</a>
<a href="{{route('admin_students')}}"  class="btn btn-light text-dark round-0"style="width:100%; border-radius:0; box-shadow:0px 0px font-size:20px;"><strong>Students</strong></a>
<a href="{{route('admin_departments')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px  ">Departments</a>
<a href="{{route('admin_incharge')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px">In-charge</a>
<a href="{{route('admin_assistant')}}"  class="btn btn-primary text-dark "style="width:100%; border-radius:0; box-shadow:0px 0px  ">Assistant In-charge</a>
</div>  
</nav>
  
<div class="container col-md-8 offset-md-3 mt-5 pt-5">
<a href="{{route('add_new_student')}}" class="btn btn-primary ml-5"  >Add</a>
<a href="{{route('admin')}}" class="btn btn-secondary offset-md-7">Back</a>
<!-- <a href="{{route('view')}}" class="btn btn-warning md-3"  id="myBtn " >Import</a> -->


<button class="btn btn-success" onclick="exportTableToCSV('completed_students.csv')"><i class="fas fa-download"></i></button>
<!-- Table -->
 <div class="container box mt-3 ">
    <table id="example" class="table table-bordered table-striped">
    <!-- <table id="example" class="table table-hover table-bordered"> -->

        

     <thead>
      <tr>
       <th width="10%">Student ID</th>
       <th width="20%">Student Name</th>
       <th width="20%">Course</th>
       <th width="10%">Year</th>
       <th width="10%">Contact Number</th>
       <th width="10%">Status</th>
       <th width="10%">Action</th>
      </tr>
     </thead>
     <tbody>
    @foreach ($show as $lists)
        <tr>
        <td>{{$lists->id}}</td>
        <td>{{$lists->student_lname}}, {{$lists->student_fname}} {{$lists->student_mname}} </td>
        <td>{{$lists->course_name}}</td>
        <td>{{$lists->student_year}}</td>
        <td>{{$lists->student_contactnumber}}</td>



        @php 
        $complete = \App\Models\Lists::where(['student_id' => $lists->id,'status' => 'Cleared'])->count();
        @endphp
    
        @if ($complete == $count)  
      
        <td>Cleared</td>

        @else

        <td>Pending</td>

        @endif
        <td class="text-center"><a href="{{route('edit_student', $lists->id)}}" class="me-1"><i class="fas fa-edit"></i></a><a href="{{route('reset_user', $lists->id)}}" onclick="return confirm('Are you sure you want to delete it?');"><i class="fas fa-trash-alt"></i></a>  <a href="{{route('reset_user', $lists->id)}}" onclick="return confirm('Are you sure you want to reset the password?');" class="me-1"><i class="fas fa-redo-alt"></i></a></td>
        </tr>
    @endforeach

    </tbody>
    </table>
   </div>


    
</div>


@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>

<script>

function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}
    
  </script>
<script>
function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
        csv.push(row.join(","));        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}
</script>

@endsection