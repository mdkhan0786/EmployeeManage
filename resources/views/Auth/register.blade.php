@extends('layout.master')
@section('title','Register')
@section('content')

<div class="container mt-5">
  <div class="row justify-content-center">
      <div class="card mt-5 col-5">
          <div class="card-header">
              Register:  <span class="text-center">
                {{-- @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }};
                    </div>
                @endif --}}
        </span>
          </div>
          <div class="card-body d-flex justify-content-center">
            <form class="mx-1 mx-md-4" autocomplete="off">
              @csrf
             
              <div class="d-flex flex-column mb-4">
                  <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Your Name <span class="text-danger">*</span></label>
                      <input type="text" id="fname" class="form-control form-control" name="fname" value="{{old('FirstName')}}" required>
                      @error('fname')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
              </div>
    
              <div class="d-flex flex-column  mb-4">
                
                  <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Email<span class="text-danger">*</span></label>
                      <input type="email" id="Email" class="form-control form-control" name="Email" value="{{old('Email')}}" autocomplete="off" required>
                      @error('Email')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror  
                  </div>
              </div>
    
              <div class="d-flex flex-column mb-4">
                 
                  <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Password<span class="text-danger">*</span></label>
                      <input type="password" id="Password" class="form-control form-control" name="Password" value="{{old('Password')}}" autocomplete="off" required>
                      @error('Password')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
              </div>
    
              <div class="d-flex mx-4 mb-3 mb-lg-4">
                  <input id="FormData" type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" value="Register">
              </div>
    
              <div class="text-center">
                  <span class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('LoginForm')}}" class="fw-bold text-body"><u>Login here</u></a></span>
              </div>
          </form>
          </div>
          <div class="card-footer text-muted">
             Register Footer 
          </div>
      </div>
  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>

$(document).ready(function(){
    $('#FormData').on('click', function(){
         // prevent the default form submission
        var FirstName = $('#fname').val();
        var UserEmail = $('#Email').val();
        var UserPass = $('#Password').val();
        $.ajax({
            url: "{{ route('CreateUser') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                Fname: FirstName,
                Email: UserEmail,
                Password: UserPass,
                
            },
            success: function(response) {
                if(typeof toastr !== 'undefined') {
                    toastr.options = {
                        "positionClass": "toast-top-center",
                        "hideDuration": "7000" // 7 seconds
                    };
                    toastr.success('Registration successful!');
                } else {
                    alert('Registration successful!'); // Fallback if Toastr is not defined
                }
                window.location.href = "/Login"; // Change "/login" to your login page URL
            },
            error: function(xhr, status, error) {
                // Handle error
            }
        });
    });
});
</script>
@stop