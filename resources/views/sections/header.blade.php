<!-- 
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-0 justify-content-end pl-5">
  
  @php 
      $values = \App\Models\Student::where(['id' => session('student_id')])->pluck('student_fname')->first();
      $valuess = \App\Models\Student::where(['id' => session('student_id')])->pluck('student_lname')->first();
      $id = \App\Models\Student::where(['id' => session('student_id')])->pluck('id')->first();
      $full = $values . " " . $valuess;
      @endphp

    <div class="dropdown ">
  <button class="btn btn-primary dropdown-toggle p-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  <img src="{{ Avatar::create($full)->toBase64() }}" class="avatar" /> {{$full}}
  </button>
  
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="{{route('change_password', session('student_id') )}}"><i class="fas fa-key"></i> Change Password</a></li>
    <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
  </ul>
</div>
  </nav> -->

 
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-0 justify-content-end pl-5 ">

  @php 
      $values = \App\Models\Student::where(['id' => session('student_id')])->pluck('student_fname')->first();
      $valuess = \App\Models\Student::where(['id' => session('student_id')])->pluck('student_lname')->first();
      $id = \App\Models\Student::where(['id' => session('student_id')])->pluck('id')->first();
      $full = $values . " " . $valuess;
      @endphp

      

    <div class="dropdown ">
  <button class="btn btn-primary dropdown-toggle p-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  <img src="{{ Avatar::create($full)->toBase64() }}" class="avatar" /> {{$full}}
  </button>
  
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="{{route('change_password_student', session('student_id') )}}"><i class="fas fa-key"></i> Change Password</a></li>
    <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
  </ul>
</div>
  </nav>

 
