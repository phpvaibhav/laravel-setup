var errorClass    = 'error';
var errorElement  = 'em';
var base_url  = $('body').data('base-url'); // Base url
$(document).ready(function () {
  	
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*  When user click add user button */
    $('#add-customer-model').click(function () {
        $('#btn-save').val("create-user");
        $('#userForm').trigger("reset");
        $('#user_id').val(0);
        $('#userCrudModal').html("Add New User");
        $('#privew').html("");
        $('#ajax-crud-modal').modal('show');
    });
 
   /* When click edit user */
       $('body').on('click', '#edit-user', function () {
        var user_id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var address = $(this).data('address');
        var url = $(this).data('image');
        var image = '<embed src="'+url+'" class="img img-thumbnail" width="250" height="250">';
        $('#userForm').trigger("reset");
        $('#userCrudModal').html("Edit User");
        $('#btn-save').val("edit-user");
        $('#user_id').val(user_id);
        $('#name').val(name);
        $('#email').val(email);
        $('#address').val(address);
        $('#privew').html(image);
        $('#ajax-crud-modal').modal('show');
       /* $.get('ajax-crud/' + user_id +'/edit', function (data) {
           
          
          $('#user_id').val(data.id);
          $('#name').val(data.name);
          $('#email').val(data.email);
      })*/
   });
   //delete user login
    $('body').on('click', '.delete-user', function () {
        var user_id = $(this).data("id");
         var token = $("meta[name='csrf-token']").attr("content");
         var yes = confirm("Are You sure want to delete !");
        if(yes){
             $.ajax({
            type: "DELETE",
            url: base_url+"/customer-delete/"+user_id,
             data: {
            "id": user_id,
            "_token": token,
        },
            cache       : false,
            dataType: 'json', 
            success: function (res) {
                  if(res.status=='success'){
                    toastr.success(res.message, 'Success', {timeOut: 3000});
                    setTimeout(function(){ 
                    $('#laravel_datatable').DataTable().ajax.reload();
                  // window.location = base_url+'/customers'; 
                  },3000);
                  }else{
                  toastr.error(res, 'Alert!', {timeOut: 3000});
                  }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        }
     
    });   
});

$("#userForm").validate({
  errorClass    : errorClass,
  errorElement  : errorElement,
  highlight     : function(element) {
    $(element).parent().removeClass('state-success').addClass("state-error");
    $(element).removeClass('valid');
    },
  unhighlight   : function(element) {
    $(element).parent().removeClass("state-error").addClass('state-success');
    $(element).addClass('valid');
  },
  rules : {
        email   : {
          required  : true,
          email     : true
        },
        name : {
          required  : true,
        },
        address : {
          required  : true,
        }
  },
  // Messages for form validation
  messages : {
    email : {
      required  : 'Please enter your email address',
      email     : 'Please enter a valid email address'
    },
    name : {
      required  : 'Please enter your name',
    },address : {
      required  : 'Please enter your address',
    }
  },
  // Do not change code below
  errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
  },
/*  submitHandler: function(form) {

    }*/
  });

  $('#laravel_datatable').DataTable({
         processing: true,
         serverSide: true,
        "order"       : [], //Initial no order.
        "lengthChange": false,
        "language"   : {
        "emptyTable" : '<center>No result found</center>',
        "zeroRecords": '<center>No result found</center>',
        "search"     : '<span class="input-group-addon"><i class="fa fa-search"></i></span>' 
        },
        "paging": true,
        initComplete  : function () {
        $('.dataTables_filter input[type="search"]').css({ 'height': '32px'});
        },
         ajax: {
          url: base_url + "/customer-list",
          type: 'GET',
         },
         columns: [
                  {data: 'id', name: 'id', 'visible': false},
                  {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                  {data: 'image', name: 'image', orderable: false,searchable: false},
                  { data: 'name', name: 'name' },
                  { data: 'email', name: 'email' },
                  { data: 'address', name: 'address' },
                  {data: 'action', name: 'action', orderable: false},
               ],
        order: [[0, 'desc']]
      });
// Validation
$(function() {   
  $(document).on('submit', "#userForm", function (event) {
    toastr.clear();
    event.preventDefault();
    var formData = new FormData(this);
        var actionType = $('#btn-save').val();
    $('#btn-save').html('Sending..');
    $.ajax({
      type        : "POST",
/*      url         : $(form).attr('action'),
      data        : $(form).serialize(),*/
       url             : $(this).attr('action'),
      data            : formData, //only input
      cache       : false,
      contentType: false,
      processData: false,
      dataType: 'json',  
      beforeSend  : function() {
        $('#btn-save').prop('disabled', true);  
      },     
      success: function (res) {
        console.log(res);
        setTimeout(function(){  $('#btn-save').prop('disabled', false);
           $('#btn-save').html('Save changes');
         },4000);
        if(res.status=='success'){
          toastr.success(res.message, 'Success', {timeOut: 3000});
          setTimeout(function(){ 
            $('#ajax-crud-modal').modal('hide');
            $('#laravel_datatable').DataTable().ajax.reload();
           // window.location = base_url+'/customers'; 
          },3000);
        }else{
          toastr.error(res, 'Alert!', {timeOut: 3000});
        }
      },
         error: function (err) {
        if (err.status == 422) { // when status code is 422, it's a validation issue
            console.log(err.responseJSON);
            // you can loop through the errors object and show it to the user
            console.warn(err.responseJSON.errors);
            // display errors on each form field
            $.each(err.responseJSON.errors, function (i, error) {
                 toastr.success(error[0], 'Alert', {timeOut: 3000});
            });
        }
    }
    });
      return false;
/*    $.ajax({
        type            : "POST",
        url             : base_url+'adminapi/'+$(this).attr('action'),
        headers         : { 'authToken': authToken },
        data            : formData, //only input
        processData     : false,
        contentType     : false,
        cache           : false,
        beforeSend      : function () {
          preLoadshow(true);
          $('#submit').prop('disabled', true);
        },
        success         : function (res) {
          preLoadshow(false);
          setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
          if(res.status=='success'){
            toastr.success(res.message, 'Success', {timeOut: 3000});
            setTimeout(function(){window.location.reload(); },4000);
          }else{
            toastr.error(res.message, 'Alert!', {timeOut: 4000});
          }
        }
    });*/
  });
  //fromsubmit
});