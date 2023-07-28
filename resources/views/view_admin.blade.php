@extends('admin_layout')

@section('admincontent')

<h1>View Admin Users</h1>




<div class="container-fluid">
<table class="table table-hover ">
    <thead>
      <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>NIC</th>
        <th>Department</th>
        <th>Address</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($admin as $admin)

      <tr>

        <td>{{$admin['user_id']}}</td>
        <td>{{$admin['first_name']}} {{$admin['last_name']}}</td>
        <td>{{$admin['email']}}</td>
        <td>{{$admin['tp_number']}}</td>
        <td>{{$admin['nic']}}</td>
        <td>{{$admin['department']}}</td>
        <td>{{$admin['address']}}</td>
        <td><a href="{{ "edit_admin_user/".$admin['user_id'] }}" class="btn btn-primary">Edit</a></td>
        <td><a href="{{ "delete_admin/".$admin['user_id'] }}" class="btn btn-danger">Delete</a></td>
        
      </tr>
      @endforeach
    </tbody>
  </table>

</div>


@endsection
