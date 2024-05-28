@extends('layout.master')
@section('title','Login')
@section('content')

<div class="container mt-5">
  <div class="row justify-content-center">
      <div class="card mt-5 col-5">
          <div class="card-header">
              Login:<p>
                     @if(session('success'))
                    <script>
                        alert('{{ session('success') }}');
                    </script>
                     @endif
                     @if (session('error'))
                    <script>
                        alert('{{ session('error') }}');
                     </script>
                 @endif
              </p>
          </div>
        </span>
          <div class="card-body d-flex justify-content-center">
            <form   action="{{route('CreateLog')}}"  class="mx-1 mx-md-4" autocomplete="off" method="POST">
                 @csrf
               @method('POST') 
              <div class="d-flex flex-column  mb-4">
                  {{-- <i class="fas fa-envelope fa-lg me-3 fa-fw"></i> --}}
                  <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Email<span class="text-danger">*</span></label>
                      <input type="email" id="EmailLog" class="form-control form-control" name="email" value="{{old('email')}}" autocomplete="off">
                      @error('email')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror  
                  </div>
              </div>
    
              <div class="d-flex flex-column mb-4">
                  {{-- <i class="fas fa-lock fa-lg me-3 fa-fw"></i> --}}
                  <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Password<span class="text-danger">*</span></label>
                      <input type="password" id="PasswordLog" class="form-control form-control" name="password" value="{{old('password')}}" autocomplete="off">
                      @error('password')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
              </div>
    
              <div class="d-flex mx-4 mb-3 mb-lg-4">
                  <input id="LoginFormData" type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" value="LogIn">
              </div>
    
              <div class="text-center">
                  <span class="text-center text-muted mt-5 mb-0">Haven't an account? <a href="{{route('RegisterForm')}}" class="fw-bold text-body"><u>Create an Account</u></a></span>
              </div>
          </form>
          </div>
          <div class="card-footer text-muted">
              2 days ago
          </div>
      </div>
  </div>
</div>
@stop