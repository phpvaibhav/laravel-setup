@extends('layouts.default')
@section('title', 'Customers')
@section('content')
  	<!-- Page Heading -->
  	 <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Customers</h1>
            <a href="javascript:void(0);" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="add-customer-model"><i class="fas fa-plus fa-sm text-white-50"></i> Create Customer</a>
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
						<th>Name</th>
						<th>Email</th>
						<td>Action</td>
                    </tr>
                  </thead>
                  <tbody  id="users-crud">
				<!-- 	@foreach($customers as $customer)
					<tr id="user_id_{{ $customer->id }}">
					<td>{{ $customer->id }}</td>
					<td>{{ $customer->name }}</td>
					<td>{{ $customer->email }}</td>
					<td><a href="javascript:void(0)" id="edit-user" data-id="{{ $customer->id }}" class="btn btn-info">Edit</a>
				<a href="javascript:void(0)" id="delete-user" data-id="{{ $customer->id }}" class="btn btn-danger delete-user">Delete</a>
					</td>
					</tr>
					@endforeach
					@if(!$customers->total())
						<tr>
							<td colspan="7"> <center>No record Found.</center></td>
						</tr>
                    @endif -->
                  </tbody>
                </table>
              <!--    {{ $customers->links() }} -->
              </div>
            </div>
          </div>
@stop