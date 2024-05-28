@extends('layout.master')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="margin-top:30px;">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Form </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label>First Name<span class="text-danger">*</span></label>
          <div class="col">
            <input type="text" class="form-control" id="fname" name="fname" value="{{old('name')}}">
           @error('fname')
           <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <label>Last Name<span class="text-danger">*</span></label>
          <div class="col">
            <input type="text" class="form-control" id="name" name="fname" value="{{old('lname')}}">
            @error('lname')
            <span class="text-danger">{{ $message }}</span>
             @enderror
          </div>
          <label>Email<span class="text-danger">*</span></label>
          <div class="col">
            <input type="text" class="form-control" id="name" name="Email" value="{{old('email')}}">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
             @enderror
          </div>
          <label>Address<span class="text-danger">*</span></label>
          <div class="col">
            <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}">
            @error('address')
            <span class="text-danger">{{ $message }}</span>
             @enderror
          </div>
          <label>City<span class="text-danger">*</span></label>
          <div class="col">
            <input type="text" class="form-control" id="city" name="city" value="{{old('city')}}">
            @error('city')
            <span class="text-danger">{{ $message }}</span>
             @enderror
          </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Update">
        </div>
      </div>
    </div>
  </div>
 