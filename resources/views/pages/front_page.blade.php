@extends('layout.master')

@section('title')
    Log in
@endsection


@section('content')

<body class="body1">
	<div class="container1">
		<div class="img">
			<img src="images/logo.png">
		</div>
		<div class="login-content">
			<form action="{{route('login')}}" method="post">
				@csrf
				<h4>College Clearance</h4>
				<img src="images/avatar.svg">
				<div class="one mt-4">
					<div class="div">
						<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
					</div>
				</div>
				<div class="pass mt-1">
					<div class="div">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
					</div>
				</div>
				<a href="#" >Change Password</a></td>
					<input type="submit" class="btn1 rounded" value="Login">
				<div class="alert alert-danger mt-3" style="display:none" role="alert">
				{{$errors->first()}}
					</div>
            </form>
        </div>
    </div>
    
</body>




@endsection

@section('scripts')
  <script>
    $('document').ready(function()
      {
        @if ($errors->any())
          $(".alert").fadeIn(500).delay(3000).fadeOut(500);
        @endif
      })
  </script>
@endsection