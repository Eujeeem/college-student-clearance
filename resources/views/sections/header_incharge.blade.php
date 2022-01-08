
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-0 justify-content-end pl-5">

  @php
$count = 1
@endphp 
@foreach ($show as $lists) 
    
    @if ($count == 1)
    @if ($lists->incharge_id == session('incharge_id'))
    <?php
        $fullname = $lists->incharge_name;
    ?>    
@php
$count = $count+1
@endphp
    @endif
    @endif 
@endforeach 

    <div class="dropdown ">
  <button class="btn btn-primary dropdown-toggle p-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  <img src="{{ Avatar::create($fullname)->toBase64() }}" class="avatar" /> {{$fullname}}
  </button>
  
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#"><i class="fas fa-key"></i> Change Password</a></li>
    <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
  </ul>
</div>
  </nav>

 
