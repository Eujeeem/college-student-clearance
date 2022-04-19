@extends('layout.master')

@section('title')
    Change Password
@endsection


@section('content')


@include('sections.header2')

<nav class="side-nav navbar-dark bg-primary" 
  style="min-height: 1000px;width: 15%; position:fixed; overflow-y:hidden; overflow-x:hidden;"> <img src="/images/logo.png " style="min-height: 130px;width: 80%; margin-left:10%; margin-top:10%"><br><br><br>

</nav>


<div  class="container col-md-5 offset-md-3 mt-5 pt-5">
        
<h1 style="font-family: Courier New; font-weight: Bold;">Change Password</h1>


            <div class="add_department">
                
                    <form action="{{route('update_password', session('student_id'))}}" method="post">
                    @csrf
                        <div class="mb-3">
                        <label for="oldpass" class="form-label" style="width: 200px; text-align: left;">Old Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="oldpassword" placeholder="Enter Old Password" required="required">
                        </div>
                        <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="session('incharge_id')" placeholder="Enter Old Password" required="required">
                        <div class="mb-3">
                        <label for="newpass" class="form-label" style="width: 200px; text-align: left;">New Password</label>
                        <input type="password" id="txtPassword" class="form-control" aria-describedby="emailHelp" name="newpassword" placeholder="Enter New Password" required="required">
                        </div>

                        <div class="mb-3">
                        <label for="reenterpass" class="form-label" style="width: 200px; text-align: left;">Confirm New Password</label>
                        <input type="password" id="txtConfirmPassword" class="form-control" aria-describedby="emailHelp" name="reenterpassword" placeholder="Re-Enter New Password" required="required">
                        </div>
                        <div class="alert alert-danger mt-3" style="display:none" role="alert">
                        {{$errors->first()}}
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="return Validate()">Submit</button>
                        <a href="javascript:history.go(-1)" class="btn btn-danger">Cancel</a>  
                        
                        
                    </form>

            </div>

        </div>

@endsection

@section('scripts')
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>

<script>
    $('document').ready(function()
      {
        @if ($errors->any())
          $(".alert").fadeIn(500).delay(3000).fadeOut(500);
        @endif
      })
  </script>

@endsection