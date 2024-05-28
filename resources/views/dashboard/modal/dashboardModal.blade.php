@extends('layout.master')
@section('title','Login')
{{-- @section('content') --}}


<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary">
   
  </button> --}}
  
  <!-- Modal -->
  <div class="modal fade" id="DashboradModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <form>
        @csrf
        @method('delete');
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            Are  you sure Want to Delete this user?
          </div>
          <div class="modal-footer">
            <input type="hidden" name="PassId" class="PassId" id="PassId" value="">
            <button type="button" class="btn btn-secondary text-center" data-dismiss="modal">No</button>
            <button type="button" id="RecordDelete" class="btn btn-danger text-center">Yes</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!--Edit Modal-->
  <div class="modal fade" id="DashboradEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="mx-1 mx-md-4" autocomplete="off">
                @csrf
                @method('POST');
                <div class="d-flex flex-column mb-4">
                    <input type="hidden" name="HiddenId" class="UpdateId" id="UpdateId" value="">
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Your Name <span class="text-danger">*</span></label>
                        <input type="text" id="EditName" class="form-control form-control" name="EditName" value="" required>
                        {{-- @error('FirstName')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror --}}
                    </div>
                </div>
      
                <div class="d-flex flex-column  mb-4">
                  
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Email<span class="text-danger">*</span></label>
                        <input type="email" id="EditEmail" class="form-control form-control" name="EditEmail" value="" autocomplete="off" required>
                        {{-- @error('EditEmail')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror   --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-center" data-dismiss="modal">Cancel</button>
                    <button type="button" id="UpdateBtn" class="btn btn-danger text-center">Update</button>
                  </div>
            </form>
        </div>
      </div>
    </div>
  </div>


