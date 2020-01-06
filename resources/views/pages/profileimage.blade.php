@extends('layouts.default')
@section('title', 'Profile Image')
@section('content')
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Profile image</h1>
	</div>
	<div class="row" >
		

            <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                </div>
                <div class="card-body">
                 <form  action="{{ url('updateImage')}}" method="POST" name="add_product" enctype="multipart/form-data" >
                 	{{ csrf_field() }}
				<div class="form-group">
					<label for="profileImage"></label>
					<input type="file" class="" id="profileImage" name="profileImage"  placeholder="Enter profileImage" onchange="filePreview(this)" accept="image/*">
					<p class="text-danger">{{ $errors->first('profileImage') }}</p>
				</div>
				<div class="form-group">
					<div id="privew">

						@if(Auth()->user()->profile_image && file_exists( public_path().'/storage/profile/'.Auth()->user()->profile_image ))
						<img src="{{asset('storage/profile/'.Auth()->user()->profile_image)}}" class="img img-thumbnail"  width="250" height="250">
						@else
						<img src="backend_assets/img/avatar.png"class="img img-thumbnail" width="250" height="250" >
						@endif

					</div>
				</div>
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
                </div>
              </div>

            </div>
		
	</div>
@stop
