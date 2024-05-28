@extends('layout.master')

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
                    <li> <a class="nav-link active text-dark" href="{{route('Index')}}">Show Employee</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark toggle-submenu" href="#">Studen<span class="toggle-icon"  style="float: right">+</span></a>
                <ul class="submenu">
                    <li> <a class="nav-link active text-dark " href="#">Add Student</a></li>
                    <li> <a class="nav-link active text-dark" href="#">Show Student</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark toggle-submenu" href="#">Project <span class="toggle-icon"  style="float: right">+</span></a>
                <ul class="submenu">
                    <li> <a class="nav-link active text-dark" href="#">Add Project</a></li>
                    <li> <a class="nav-link active text-dark" href="#">Show Project</a></li>
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
   
</div>