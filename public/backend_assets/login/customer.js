var errorClass    = 'error';
var errorElement  = 'em';
  $(document).ready(function () {
  	var base_url  = $('body').data('base-url'); // Base url
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*  When user click add user button */
    $('#add-customer-model').click(function () {
        $('#btn-save').val("create-user");
        $('#userForm').trigger("reset");
        $('#userCrudModal').html("Add New User");
        $('#ajax-crud-modal').modal('show');
    });
 
   /* When click edit user */
/*    $('body').on('click', '#edit-user', function () {
      var user_id = $(this).data('id');
      $.get('ajax-crud/' + user_id +'/edit', function (data) {
         $('#userCrudModal').html("Edit User");
          $('#btn-save').val("edit-user");
          $('#ajax-crud-modal').modal('show');
          $('#user_id').val(data.id);
          $('#name').val(data.name);
          $('#email').val(data.email);
      })
   });*/
   //delete user login
 /*   $('body').on('click', '.delete-user', function () {
        var user_id = $(this).data("id");
        confirm("Are You sure want to delete !");
 
        $.ajax({
            type: "DELETE",
            url: "{{ url('ajax-crud')}}"+'/'+user_id,
            success: function (data) {
                $("#user_id_" + user_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });*/   
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
     submitHandler: function(form) {
 
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
      $.ajax({
        type        : "POST",
        url         : $(form).attr('action'),
        data        : $(form).serialize(),
        cache       : false,
        beforeSend  : function() {
         
          $('#submit').prop('disabled', true);  
        },     
        success: function (res) {
         	console.log(res);
          setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
          if(res.status=='success'){
            toastr.success(res, 'Success', {timeOut: 3000});
            setTimeout(function(){ window.location = base_url+'/dashboard'; },4000);
          }else{
            toastr.error(res, 'Alert!', {timeOut: 3000});
          }
        }
      });
      return false;
      

    }
  })

   
/*      $.ajax({
			url         : $(form).attr('action'),
			data        : $(form).serialize(),
       // cache       : false,
          type: "POST",
          dataType: 'json',
          success: function (data) {
          		console.log(data);
              var user = '<tr id="user_id_' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.email + '</td>';
              user += '<td><a href="javascript:void(0)" id="edit-user" data-id="' + data.id + '" class="btn btn-info">Edit</a></td>';
              user += '<td><a href="javascript:void(0)" id="delete-user" data-id="' + data.id + '" class="btn btn-danger delete-user">Delete</a></td></tr>';
               
              
              if (actionType == "create-user") {
                  $('#users-crud').prepend(user);
              } else {
                  $("#user_id_" + data.id).replaceWith(user);
              }
 
              $('#userForm').trigger("reset");
              $('#ajax-crud-modal').modal('hide');
              $('#btn-save').html('Save Changes');
              
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });*/