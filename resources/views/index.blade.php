@extends('layout.master')
@section('title','www//Record//irfan//display')
@section('content')
<br>
<br>
<br>


@method('POST')
<table class="table">
  @if(session()->has('success'))
  <div class="alert alert-seccess">
    <p>{{ session()->get('success')}}</p>
  </div>
  @endif
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $row)
    <tr>
      <th>{{$row->first_name}}</th>
      <td>{{$row->last_name}}</td>
      <td>{{$row->email}}</td>
      <td>{{$row->password}}</td>
      <td>{{$row->address}}</td>
      <td>{{$row->city}}</td>
      <td>
        <button type="button"  data-bs-toggle="modal"  id="EditModal" data-id="{{$row->id}}" data-bs-target="#staticBackdrop"  id="EditBtn" class="btn btn-primary">Edit</button>
       
        <button type="button"  data-bs-toggle="modal" id="DeleteModal" Data-Delete="{{$row->id}}" data-bs-target="#staticBackdropDelete"  id="EditBtn" class="btn btn-danger DeleteModal">Delete</button>
 
    </tr>
    @endforeach
  </tbody>
</table>
<!-- Modal -->
<!-- Button trigger modal -->
@include('edit');

@include('delete');
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
$(document).ready(function(){
  $('.DeleteModal').click(function(){
    var DeleteId = $(this).attr('Data-Delete');
    $('#DeleteId').val(DeleteId);
  })


  $(document).ready(function(){
    $('#DeleteBtn').on('click',function(){
      var ValueDelte=$('.DeleteId').val();
      
        $.ajax({
          url: "{{ route('deleteRoute') }}",
          type: "POST",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // assuming you have CSRF token meta tag
          },
          data: {
              Delete: ValueDelte,
          },
          success: function(response) {
            console.log(response);
            if(response.status == 'success'){
              toastr.success(response.message);
              window.location.reload();
            }else{
              toastr.error(response.message);
            }   
          },
          error: function(xhr, status, error) {
            toastr.error('Error occurred while deleting the record.');
          }
        });  
      })
  })
});




</script>
@endsection