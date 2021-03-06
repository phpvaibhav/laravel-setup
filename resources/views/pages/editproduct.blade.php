@extends('layouts.default')
@section('title', 'Edit Product')
@section('content')
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
	</div>
	<div class="row" >
		

            <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
                </div>
                <div class="card-body">
                 <form  action="{{ route('products.update', $product_info->id) }}" method="post" name="edit_product" >
                 	{{ csrf_field() }}
                 	@method('PUT')
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" name="title" value="{{$product_info->title}}"  placeholder="Enter title">
					<span class="text-danger">{{ $errors->first('title') }}</span>
				</div>
				<div class="form-group">
					<label for="product_code">Product code</label>
					<input type="text" class="form-control" id="product_code" name="product_code"  placeholder="Enter product code" value="{{$product_info->product_code}}">
					<span class="text-danger">{{ $errors->first('product_code') }}</span>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" col="4" name="description" id="description" placeholder="Enter Description">{{$product_info->description}}</textarea>
					<span class="text-danger">{{ $errors->first('description') }}</span>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
                </div>
              </div>

            </div>
		
	</div>
@stop