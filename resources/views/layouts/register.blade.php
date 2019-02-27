@extends('welcome')

@section('content')
<div class="container-fluid back">
	<h2 align="center">Delta Expense Management Software</h2>
	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-5">
	<div class="tab" style="padding:10px;width:100%;margin-top:10%;">
					<h3 align="center">Registration Form</h3>
								<form class="form-horizontal" id="register" method="post">
								{{csrf_field()}}
									<div class="form-group">
											<input class="form-control" name="name" type="text" placeholder="User Name" required>
									</div>
									<div class="form-group">
											<input class="form-control" type="text"  name="designation" placeholder="designation" required>
									</div>
									<div class="form-group">
											<input class="form-control" type="text"  name="location" placeholder="Location" required>
									</div>
									<div class="form-group">
											<input class="form-control" type="email" name="email" placeholder=" Email" required>
									</div>
									<div class="form-group">
											<input class="form-control" type="number" name="mobile" placeholder="Mobile No." required>
									</div>
									<div class="form-group">
											<input class="form-control" type="password" id="password1" name="password" placeholder="Password" required>
									</div>
									<div class="form-group">
											<input class="form-control" type="password" id="password_confirm" name="password-confirm" placeholder="Confirm Password" required>
											<span class="invalid-feedback" role="alert">
																										<strong id="passvalid"></strong>
																								</span>
									</div>
										<input id="useroradmin" type="hidden" class="form-control" name="useroradmin" value="1">
											<input id="authorized" type="hidden" class="form-control" name="authorized" value="0">


									<div class="form-group text-center">
											<button type="submit" class="btn btn-primary"  value="Save" id="btnareg">Sign up</button>
									</div>
							</form>
						</div>
						</div>
							<div class="col-md-1"></div>
						</div>
	<!-- <div class="col-md-5 ">
	</div> -->
	<!-- <div class="col-md-7 rgt" >

		<div class="row">
			<div class="col-md-3"></div>
				<div class="col-md-6">

</div>
</div>
</div> -->
</div>

@endsection
