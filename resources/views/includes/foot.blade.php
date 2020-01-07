
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{url('logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{!! asset('backend_assets/vendor/jquery/jquery.min.js') !!}"></script>
  <script src="{!! asset('backend_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{!! asset('backend_assets/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{!! asset('backend_assets/js/sb-admin-2.min.js') !!}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>

    <script src="{!! asset('backend_assets/toastr/toastr.min.js') !!}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <!-- jquery-validate JavaScript-->
  </script>
  @isset($front_scripts)
    @foreach ($front_scripts as $script)
      <script src="{{asset('backend_assets/'.$script)}}"></script>
     
    @endforeach
 @endisset

  <script type="text/javascript">
    setTimeout(function(){ $('.alert').hide() }, 4000);
    function filePreview(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    /*   $('#uploadForm + img').remove();
    $('#uploadForm').after('<img src="'+e.target.result+'" width="450" height="300"/>');*/
     $('#privew').html("");
    $('#privew + embed').remove();
    $('#privew + img').remove();
    $('#privew').after('');
    $('#privew').after('<embed src="'+e.target.result+'" class="img img-thumbnail" width="250" height="250">');
  }
  reader.readAsDataURL(input.files[0]);
  }
}
  </script>