@extends('layout.master')
@section('title','Dashboard')
{{-- @section('content') --}}

@include('Employee.addEmployee')


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
                        <form action="{{ route('Logout') }}">
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
                        <a class="nav-link active text-dark" href="#">Dashboard</a>
                        {{-- <ul class="submenu">
                            <li> <a class="nav-link active text-light" href="#">Add Employee</a></li>
                            <li> <a class="nav-link active text-light" href="#">Show</a></li>
                        </ul> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark toggle-submenu" href="#">Employee <span class="toggle-icon" style="float: right">+</span></a>
                        <ul class="submenu">
                            <li> <a class="nav-link active text-dark" data-toggle="modal" data-target="#exampleModalCenter" href="#">Add Employee</a></li>
                            <li> <a class="nav-link active text-dark" href="{{route('EmployeeList')}}">Show Employee</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark toggle-submenu" href="#">Studen<span class="toggle-icon"  style="float: right">+</span></a>
                        <ul class="submenu">
                            <li> <a class="nav-link active text-dark add " href="#">Add Student</a></li>
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
                <h4 class="text-center"> User Dashboard</h4>
                <table class="table table-sm mt-4">
                    <thead>
                      <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Join Date</th>
                        <th scope="col">Action </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($Data as $row)
                      <tr>
                        <th>{{$row->id}}
                        
                        </th>
                        <td>{{$row->first_name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{ $row->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="javascript:;" class="EditBtn" id="Edit" data-name={{$row->first_name}}   data-email={{$row->email}} data-toggle="modal" data-id={{$row->id}} data-target="#DashboradEditModal"><i class="fa fa-edit"></i></a>
                            |
                            <a href="javascript:;" id="DeleteBtn" data-toggle="modal"  delete-id={{$row->id}}  data-target="#DashboradModal" class="text-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach           
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

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

        //Edit Value assign for input field
        $('.EditBtn').click(function(){
            var dataName=$(this).attr('data-name');
            var dataEmail=$(this).attr('data-email');
            var dataId=$(this).attr('data-id');
            $('#EditName').val(dataName);
            $('#EditEmail').val(dataEmail);
            $('#UpdateId').val(dataId);
        })

        $('#UpdateBtn').on('click',function(){
            var Name=$('#EditName').val();
            // alert(Name);
            var Email=$('#EditEmail').val();
            var UpdateId=$('#UpdateId').val();
        
            $.ajax({
                url: "{{ route('Update') }}",
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: Name,
                    email: Email,
                    updateId:UpdateId,
                },
                success: function(response) {
                        // Check if Toastr is defined
                    if(typeof toastr !== 'undefined') {
                        toastr.options = {
                            "positionClass": "toast-top-center",
                            "hideDuration": "7000" // 7 seconds
                        };
                        toastr.success('Record Updated Successfully!');
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


        //Delete
        $(document).ready(function(){
            $('#DeleteBtn').on('click',function(){
                var Ids=$(this).attr('delete-id');
                alert(Ids);
                $('.PassId').val(Ids);
            })

            $('#RecordDelete').on('click',function(){
                var DeleteId=$('#PassId').val();
                alert(DeleteId);
                $.ajax({
                    url: "{{ route('Delete') }}",
                    type: 'Delete',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        Deleteid:DeleteId,
                    },
                    success: function(response) {
                            // Check if Toastr is defined
                        if(typeof toastr !== 'undefined') {
                            toastr.options = {
                                "positionClass": "toast-top-center",
                                "hideDuration": "7000" // 7 seconds
                            };
                            toastr.success('Record Deleted Successfully!');
                            setTimeout(function() {
                                window.location.reload();
                        }, 1000);
                        } else {
                            alert('Record Deleted SuccessFully!'); // Fallback if Toastr is not defined
                        }
                    },
                    error: function(xhr, status, error) {
                            // Handle error
                        }
                });
            })
        })
    })

</script>



{{-- @endsection --}}