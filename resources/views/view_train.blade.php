@extends('admin_layout')

@section('admincontent')

<h1>View Train</h1>



<div class="container-fluid">
<table class="table table-hover ">
    <thead>
      <tr>
        <th>Train ID</th>
        <th>Train Name</th>
        <th>Available First Class Seat</th>
        <th>Available Second Class Seat</th>
        <th>Available Third Class Seat</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($train as $train)
      <tr>
       
        <td>{{$train['train_id']}}</td>
        <td>{{$train['train_name']}}</td>
        <td>{{$train['seat_cat_1']}}</td>
        <td>{{$train['seat_cat_2']}}</td>
        <td>{{$train['seat_cat_3']}}</td>
        <td><a href="{{ "edit_train/".$train['train_id'] }}" class="btn btn-primary">Edit</a></td>
        <td><a href="{{ "delete_train/".$train['train_id'] }}" class="btn btn-danger">Delete</a></td>
        
      </tr>
      @endforeach
    </tbody>
  </table>



</div>
@endsection
