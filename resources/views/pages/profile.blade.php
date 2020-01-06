@extends('layouts.default')
@section('title', 'Profile')
@section('content')
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Profile</h1>
	</div>
	<div class="row" >
		

            <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                </div>
                <div class="card-body">
                 <form  action="{{ url('updateProfile')}}" method="POST" name="updateProfile" >
                 	{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name" value="{{ Auth()->user()->name }}"  placeholder="Enter name">
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
                </div>
              </div>

            </div>
		
	</div>
@stop