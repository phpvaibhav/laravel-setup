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

                <table class="table table-bordered" id="laravel_datatable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>S NO</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- customer add -->
<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="userCrudModal"></h4>
        </div>
         <form id="userForm" name="userForm" action="{{url('customer-create')}}"  method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="modal-body">
          {{ csrf_field() }}
            
               <input type="hidden" value="0" name="user_id" id="user_id">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50">
                    </div>
                </div>
 
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-12">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="" >
                    </div>
                </div>
                <div class="form-group">
                  <label for="profileImage"></label>
                  <input type="file" class="" id="profileImage" name="image"  placeholder="Enter image" onchange="filePreview(this)" accept="image/*">
                  <p class="text-danger">{{ $errors->first('image') }}</p>
                </div>
                <div class="form-group">
                  <div id="privew"></div>
                </div>
       
           
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
            </button>
        </div>
         </form>
    </div>
  </div>
</div>
<!-- customer add -->
@stop