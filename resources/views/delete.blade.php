@extends('layout.master')
<!-- Modal -->
{{-- @csrf --}}
<div class="modal fade" id="staticBackdropDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="margin-top:140px;">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="staticBackdropLabel">Are you sure want to delete ? </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div style="text-align:center; background: border-box; border: 2px solid; border-radius:353px; background-color: white;">
                <i class="fa  fa-trash-o" style="font-size:60px;color:red;text-align:center"></i>
            </div>
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <input type="hidden" id="DeleteId"  class="DeleteId" name="DeleteId" value="">
          <input type="submit" class="btn btn-primary" id="DeleteBtn" value="Delete">
        </div>
      </div>
    </div>
  </div>
 