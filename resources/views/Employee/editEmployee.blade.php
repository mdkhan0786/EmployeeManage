
  <!-- Employee Edit Modal-->
<div class="modal fade" id="EmployeeEditModalTarget" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form autocomplete="off">
            <input type="hidden" name="EmployeeHiddenId" id="EmployeeHiddenId" class="EmployeeHiddenId" value="">
              @csrf
                <div class="form-group">
                  <input type="text" name='EmpEditName' id="EmpEditName" class="form-control FirstName" placeholder="Employee Name">
                  </div>

                <div class="form-group">
                  <input disabled type="text" name="EmpEditCode" id="EmpEditCode" class="form-control EmployeeCode" placeholder="Employee Code">
                </div>

             
                  <div class="form-group">
                    <input type="text" name="EmpEditEmail" id="EmpEditEmail" class="form-control Email" placeholder="Employee Email">
                  </div>
                  <div class="form-group">
                    <input type="text" name="EmpEditDesignation" id="EmpEditDesignation" class="form-control Designation" placeholder="Designation">
                  </div>
              </div>
            </form>
      
      <div class="modal-footer">
        <input type="reset" class="btn btn-secondary" data-dismiss="modal" value="Cancel">
        <button type="button" class="btn btn-primary UpdateEmployee" id="UpdateEmployee" class="btn btn-primary UpdateEmployee">Update </button>
      </div>
    </div>
  </div>
</div>

