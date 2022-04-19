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
				<div class="container mt-2">
					<a href="#" data-bs-toggle="modal" data-bs-target="#myModal"> View Privacy</a>
						<div class="modal"  id="myModal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header" style="background: skyblue; color:white;">
									<h5 class="modal-title">PRIVACY</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								</div>
								<div class="modal-body">
								<p class="fs-4">Institutional Data Privacy Statement</p>
								<p class="fs-6">This Institutional Data Privacy Statement (IDPS) of the Assumption College of Davao is designed to state the general data privacy framework in which the school adheres. Due to the numerous subordinating offices of the school, this statement may not contain specific information with regards to the data collection and processing of a particular office or purpose. Thus, every other privacy statement or notice produced and to be produced by the Assumption College of Davao for a particular office or purpose shall be consistent with this IDPS and with the school’s Privacy Manual.</p>
								<p class="fs-5">What personal data does the ACD collect?</p>
								<p class="fs-6">As an academic institution, the Assumption College of Davao is responsible for collecting specific personal and privileged data in order to operate appropriately. Such data are categorized into (but not limited to) the following:</p>
								<p class="fs-6">Student personal information
								Student academic information,
								Alumni personal information,
								Employee personal information,
								Guidance counselor-counselee privileged information,
								Doctor-patient privileged information,
								Community partners’ personal information,
								Web cookies (school website)</p>
								<p class="fs-5">On what purpose are such data being collected?</p>
								<p class="fs-6">As an academic institution, the Assumption College of Davao needs to collect the aforementioned data in order to carry on its operations effectively. Student personal and academic data are gathered to supervise the learners’ educational progress and their overall learning experience within the period they are enrolled in the school.

								Privileged information collected by the school’s physicians and counselors intend to protect the welfare of both students and employees. These pieces of information are kept under strict confidentiality and are processed within their intended purpose.

								Records that belong to alumni are also being kept by the school’s alumni organization for particular functions such as alumni tracking and homecoming activities.

								The school’s community campaigns lead to the collection of sensitive and privileged information from community partners. These data, like other data, are guaranteed to be protected and overseen under the principles of lawfulness, fairness, and transparency.</p>
								<p class="fs-5">How long does the ACD store such data?</p>
								<p class="fs-6">The Assumption College of Davao retains data as long as the school deems it to be useful for its operations. It is taken into consideration that different subordinating offices of the school follow different data retention protocols.

								The school stores the personal and academic data of its students and alumni in perpetuity. Such data are stored in well-managed digital and physical repositories within the period that the Commission on Higher Education and the Department of Education require the school to keep them.

								Employee data are being processed by the school’s HRD office as long as the data subject is employed by the Assumption College of Davao. In the event that an employee’s service to the school is terminated, sensitive records that belong to that individual such as biometric data, government ID information, and other personal information are appropriately archived from the school’s database. Employee data are also stored in perpetuity. Thus, archival, and not complete deletion, of both digital and physical data is obligatory.

								The institution also keeps doctor-patient and counselor-counselee privileged information from its clinic and its Search and Growth Center. These offices have retention policies that last for five (5) years. After such time, the data are then deleted or disposed of in a manner that regards confidentiality.

								The school’s Community Extension Services Office keeps personal and privileged data of community partners. These data are kept within the arrangements stated in the contracts and MOA that bind the Assumption College of Davao to such community partners. Confidentiality is taken into consideration in the disposal of any community information by the time any of the said contracts or MOA expires.</p>
								<p class="fs-5">How does the ACD protect such data?</p>
								<p class="fs-6">The Assumption College of Davao and its trusted auxiliary third-parties ensure the availability, confidentiality, and integrity of its collected data by employing efficient and properly backed-up electronic and physical security systems. These systems intend to protect such data from misuse, destruction, unauthorized access, and illicit alteration.

								The school’s electronic and physical repositories for sensitive data are guaranteed to be well-maintained and regularly kept up to date under the modern principles of information security and data privacy.</p>

<p class="fst-italic">Ryan Arcel Galendez, MIT</p>
<p class="fw-bold">Data Protection Officer</p>

 


								</div>
							</div>
						</div>

					</div>
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