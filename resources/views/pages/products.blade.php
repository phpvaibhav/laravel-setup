@extends('layouts.default')
@section('title', 'Products')
@section('content')
  	<!-- Page Heading -->
  	 <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
            <a href="{{url('products/create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Create Product</a>
          </div>
  	<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List  </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th>Id</th>
						<th>Title</th>
						<th>Product Code</th>
						<th>Description</th>
						<th>Created at</th>
						<td colspan="2">Action</td>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
					<th>Id</th>
					<th>Title</th>
					<th>Product Code</th>
					<th>Description</th>
					<th>Created at</th>
					<td colspan="7">Action</td>
                    </tr>
                  </tfoot>
                  <tbody>
					@foreach($products as $product)
					<tr>
					<td>{{ $product->id }}</td>
					<td>{{ $product->title }}</td>
					<td>{{ $product->product_code }}</td>
					<td>{{ $product->description }}</td>
					<td>{{ date('Y-m-d', strtotime($product->created_at)) }}</td>
					<td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
					<td>
					<form action="{{ route('products.destroy', $product->id)}}" method="post">
					{{ csrf_field() }}
					@method('DELETE')
					<button class="btn btn-danger" type="submit">Delete</button>
					</form>
					</td>
					</tr>
					@endforeach
					@if(!$products->total())
						<tr>
							<td colspan="7"> <center>No record Found.</center></td>
						</tr>
                    @endif
                  </tbody>
                </table>
                <span> {!! $products->links() !!}</span>
              </div>
            </div>
          </div>
@stop