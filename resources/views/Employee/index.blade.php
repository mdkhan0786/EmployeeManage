@extends('layout.master');
@section('title','Dashboard');

{{-- @section('content') --}}

<style>
    .nav-link:hover{
        /* background-color: rgb(245, 240, 240); */
        color:black;
        font-weight: bold;
        border-radius:300px;
    }
    .submenu{
        display: none;
    }

    /* Styling for the user button */
    .user-btn {
        background-color: #e0e0e0;
        border: none;
        font-weight: bold;
        color: #5a5a5a; /* Choose a color that suits your design */
        padding: 8px 16px;
        cursor: pointer;
        border-radius: 30px;
        transition: background-color 0.3s ease;
    }
    .navbar{
        border-radius: 10px;
        
    }
    .sidebar{
        border-radius: 30px;
        padding-left: 10px;
    }

    .user-btn:hover {
        background-color: black;
        color:whitesmoke; /* Light background on hover */
    }

    /* Styling for the logout button */

    /* Style the logout form for proper alignment */
    .logout-form {
        display: inline-block;
        margin: 0;
        padding: 0;
    }
</style>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for Admin Dashboard -->
    <div class="container-fluid mt-2">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-light border" style="height: 60px;width:100%">
            <a class="navbar-brand text-dark font-weight-bold" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto pt-4">
                    <li class="nav-item active mr-1">
                        @if (Auth::check())
                            @php
                                $user = Auth::user();
                            @endphp
                            <button class="user-btn">
                               Welcome: {{ $user->email }}!
                            </button>
                        @endif
                        <!-- If the user is not logged in, nothing will be displayed -->
                    </li>
                    <li class="nav-item ">
                        <form action="{{ route('Logout') }}" method="post">
                            @csrf
                          
                            <input  type="submit"  class="user-btn" value="LogOut">
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Nav -->

        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3  sidebar bg-light" style="height:600" >
                <ul class="nav flex-column mt-3">
                    <li class="nav-item ">
                        <a class="nav-link active text-dark" href="{{route('Dashboard')}}">Dashboard</a>
                        {{-- <ul class="submenu">
                            <li> <a class="nav-link active text-light" href="#">Add Employee</a></li>
                            <li> <a class="nav-link active text-light" href="#">Show</a></li>
                        </ul> --}}
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark toggle-submenu" href="#">Employee <span class="toggle-icon" style="float: right">+</span></a>
                        <ul class="submenu">
                            <li> <a class="nav-link active text-dark" data-toggle="modal" data-target="#exampleModalCenter" href="#">Add Employee</a></li>
                            <li> <a class="nav-link active text-dark" href="">Show Employee</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark toggle-submenu" href="#">Studen<span class="toggle-icon"  style="float: right">+</span></a>
                        <ul class="submenu">
                            <li> <a class="nav-link active text-dark add" href="#">Add Student</a></li>
                            <li> <a class="nav-link active text-dark add" href="#">Show Student</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark toggle-submenu" href="#">Project <span class="toggle-icon"  style="float: right">+</span></a>
                        <ul class="submenu">
                            <li> <a class="nav-link active text-dark add" href="#">Add Project</a></li>
                            <li> <a class="nav-link active text-dark add" href="#">Show Project</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-dark toggle-submenu" href="#">User <span class="toggle-icon"  style="float: right">+</span></a>
                        <ul class="submenu">
                            <li><a class="nav-link text-dark" href="#">Add User</a></li>
                            <li><a class="nav-link text-dark" href="{{route('Dashboard')}}">Show User</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- Main Content -->
            <div class="col-md-9">
                <h4 class="text-center">Employee Details</h4>
                <table class="table table-sm mt-4">
                    <thead>
                      <tr>
                        <th scope="col">Emp ID</th>
                        <th scope="col">Emp Name</th>
                        <th scope="col"> Emp Code</th>
                        <th scope="col"> Emp Email</th>
                        <th scope="col"> Designation </th>

                        
                        <th scope="col">Action </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($Employee as $row)
                      <tr>
                        <th>{{$row->id}}
                        </th>
                        <td>{{$row->Employee_Name}}</td>
                        <td>{{$row->Employee_Code}}</td>
                        <td>{{$row->Employee_Email}}</td>
                        <td>{{$row->Designation}}</td> 
                        
                        <td>
                            <a href="javascript:;" class="EditBtn" id="EmployeeEdit" data-id={{$row->id}} data-name={{$row->Employee_Name}}  data-email={{$row->Employee_Email}} data-designation={{$row->Designation}} data-code={{$row->Employee_Code}} data-toggle="modal"  data-target="#EmployeeEditModalTarget"><i class="fa fa-edit"></i></a>
                            |
                            <a href="javascript:;" id="EmployeeDeleteBtn" data-toggle="modal"  delete-id={{$row->id}}  data-target="#DashboradModal" class="text-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach           
                    </tbody>
                  </table>
            </div>
        </div>
    </div>


@include('Employee.addEmployee');
@include('Employee.editEmployee');

@include('dashboard.modal.dashboardModal');

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.toggle-submenu').click(function() {
            $(this).next('.submenu').slideToggle();
            $(this).find('.toggle-icon').text(function(_, text) {
                return text === '+' ? '-' : '+';
            });
            $('.toggle-submenu').not(this).find('.toggle-icon').text('+');
        });

        // Add Employee Code
        $('.AddEmployee').on('click',function(){
          var fname=$('#FirstName').val();
          var code=$('#EmployeeCode').val();
          var EmpEmail=$('#Email').val();
          var Designation=$('#Designation').val();
          $.ajax({
            url:"{{ route('CreateEmp') }}",
            type:'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              EmpName: fname,
              EmpCode: code,
              EmpEmail: EmpEmail,
              EmpDesignation: Designation,
            },
            success: function(response) {
                    // Check if Toastr is defined
              if(typeof toastr !== 'undefined') {
                toastr.options = {
                    "positionClass": "toast-top-center",
                    "hideDuration": "7000" // 7 seconds
                };
                toastr.success('Employee Added  Successfully!');
                setTimeout(function() {
                    window.location.reload();
            }, 1000);
              } else {
              alert('Record Update SuccessFully!'); // Fallback if Toastr is not defined
              }
            },
            error: function(xhr, status, error) {
            // Handle error
            }
          });
        })
                
        //Edit Employee
    $(document).ready(function(){
        $('.EditBtn').on('click',function(){
            var EmpId=$(this).attr('data-id');
            var EmpName=$(this).attr('data-name');
            var EmpEmail=$(this).attr('data-email');
            var EmpDesignation=$(this).attr('data-designation');
            var EmpCode=$(this).attr('data-code');
            // alert(EmpId);
            $('#EmployeeHiddenId').val(EmpId);
            $('#EmpEditName').val(EmpName);
            $('#EmpEditEmail').val(EmpEmail);
            $('#EmpEditDesignation').val(EmpDesignation);
            $('#EmpEditCode').val(EmpCode);
            
        });
        
        $('#UpdateEmployee').on('click',function(){
          var EmpName=$('#EmpEditName').val();
          var EmpEmail=$('#EmpEditEmail').val();
          var EmpDesi = $('#EmpEditDesignation').val();
          var EmployeId = $('#EmployeeHiddenId').val();
          $.ajax({
              Url:"{{ route('testupdate') }}",
              type:"POST",
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data:{
                  EmpName:EmpName,
                  EmpEmail:EmpEmail,
                  EmpDesi:EmpDesi,
                  EmpId:EmployeId,
              },
              success: function(response) {
                      // Check if Toastr is defined
              if(typeof toastr !== 'undefined') {
                  toastr.options = {
                      "positionClass": "toast-top-center",
                      "hideDuration": "7000" // 7 seconds
                  };
                  toastr.success('Employee Updated  Successfully!');
                  setTimeout(function() {
                      window.location.reload();
              }, 1000);
              } else {
              alert('Employee Updated SuccessFully!'); // Fallback if Toastr is not defined
              }
              },
              error: function(xhr, status, error) {
              // Handle error
              }
          })

        })
    
    });
      
    })
</script>
{{-- @endsection --}}