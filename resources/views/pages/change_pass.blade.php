@extends('layouts.default')
@section('title', 'Change Password')
@section('content')
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Profile</h1>
	</div>
	<div class="row" >
		

            <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                </div>
                <div class="card-body">
                 <form  action="{{ url('updatePassword')}}" method="POST">
                 	{{ csrf_field() }}
				<div class="form-group">
					<label for="old_password">Old Password</label>
					<input type="password" class="form-control" id="old_password" name="old_password"  placeholder="Enter old password">
					<span class="text-danger">{{ $errors->first('old_password') }}</span>
				</div>
				<div class="form-group">
					<label for="new_password">New Password</label>
					<input type="password" class="form-control" id="new_password" name="new_password"  placeholder="Enter new password">
					<span class="text-danger">{{ $errors->first('new_password') }}</span>
				</div>
				<div class="form-group">
					<label for="confirm_password">Confirm Password</label>
					<input type="password" class="form-control" id="confirm_password" name="confirm_password"  placeholder="Enter confirm password">
					<span class="text-danger">{{ $errors->first('confirm_password') }}</span>
				</div>
				
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
                </div>
              </div>

            </div>
		
	</div>
@stop