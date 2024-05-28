
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form autocomplete="off">
                @csrf
                @method('POST')
                  <div class="form-group">
                    <input type="text" name='FirstName' id="FirstName" class="form-control FirstName" placeholder="Employee Name">
                    </div>

                  <div class="form-group">
                    <input type="text" name="EmployeeCode" id="EmployeeCode" class="form-control EmployeeCode" placeholder="Employee Code">
                  </div>

               
                    <div class="form-group">
                      <input type="text" name="Email" id="Email" class="form-control Email" placeholder="Employee Email">
                    </div>
                    <div class="form-group">
                      <input type="text" name="Designation" id="Designation" class="form-control Designation" placeholder="Designation">
                    </div>
                </div>
              </form>
        
        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" data-dismiss="modal" value="Cancel">
          <button type="button" id="EmployeeAdd" class="btn btn-primary AddEmployee">Add </button>
        </div>
      </div>
    </div>
  </div>




