@extends('layouts.default')
@section('title', 'Mail Send')
@section('content')
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Mail Sent (Google mail)</h1>
	</div>
	<div class="row" >
		

            <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Mail</h6>
                </div>
                <div class="card-body">
                 <form  action="{{ url('google-mail')}}" method="POST" name="add_product" enctype="multipart/form-data" >
                 	{{ csrf_field() }}
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email"  placeholder="Enter email" value="{{old('email')}}">
					<p class="text-danger">{{ $errors->first('email') }}</p>
				</div>
				<div class="form-group">
					<label for="subject">Subject</label>
					<input type="text" class="form-control" id="subject" name="subject"  placeholder="Enter subject"  value="{{old('subject')}}">
					<p class="text-danger">{{ $errors->first('subject') }}</p>
				</div>
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" name="title"  placeholder="Enter title"  value="{{old('title')}}">
					<p class="text-danger">{{ $errors->first('title') }}</p>
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					
					<textarea class="form-control" id="message" name="message"  placeholder="Enter message">{{old('message')}}</textarea>
					<p class="text-danger">{{ $errors->first('message') }}</p>
				</div>
			
				<button type="submit" class="btn btn-primary">Send</button>
			</form>
                </div>
              </div>

            </div>
		
	</div>
@stop
