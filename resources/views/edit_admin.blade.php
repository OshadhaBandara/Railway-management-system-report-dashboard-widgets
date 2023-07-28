@extends('admin_layout')

@section('admincontent')


<div class="container-fluid">
    <h1>Update Employee</h1>

    <form action="{{route('update_admin') }}" method="POST">
        @csrf
         {{--  new use success  & fail message --}}
        @if (Session::has('success'))

        <div class="alert alert-success">{{Session::get('success')}} </div>
            
        @endif
      
        @if (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}} </div>
        @endif

      
      {{--  new use success  & fail message --}}
      <div class="row mb-3">
        <div class="col">
          <label for="user_id" class="form-label">User ID</label>
          <input type="number" class="form-control w-100" id="user_id" name="user_idD" value="{{$data->user_id}}" min="0"  disabled>
          <input type="number" class="form-control w-100" id="user_id" name="user_id" value="{{$data->user_id}}" min="0"  hidden>
        </div>
        </div>

      <div class="row mt-4 mb-3">
        <div class="col-12 col-sm mb-3 mb-sm-0">
          <label for="first_name" class="form-label" >First name </label>
          <input type="text" class="form-control" id="signUpFirst"  name="first_name"  value="{{$data->first_name}}">
          <span class="text-danger">@error('first_name') {{ $message }} @enderror</span>
        </div>
        <div class="col-12 col-sm">
          <label for="last_name" class="form-label" >Last Name </label>
          <input type="text" class="form-control" id="signUpLast"  name="last_name"  value="{{$data->last_name}}">
          <span class="text-danger">@error('last_name') {{$message }}@enderror</span>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-12 col-sm mb-3 mb-sm-0">
          <label for="email" class="form-label">Email </label>
          <input type="email" class="form-control" id="email" name="email"   value="{{$data->email}}">
          <span class="text-danger">@error('email') {{$message }}@enderror</span>
        </div>
              <div class="col-12 col-sm">
          <label for="tp_number" class="form-label">Telephone</label>
          <div class="input-group">
              <span class="input-group-text" id="basic-addon1">+94</span>
              <input type="text" id="tp_number" class="form-control"  aria-label="Telephone" aria-describedby="basic-addon1" name="tp_number"   value="{{$data->tp_number}}">
              <span class="text-danger">@error('tp_number') {{$message }}@enderror</span>
            </div>
        </div> 
      </div>

      <div class="row mb-3">
        <div class="col">
          <label for="nic" class="form-label">NIC</label>
          <input type="text" class="  form-control w-100" id="nic" name="nic"   value="{{$data->nic}}">
          <span class="text-danger">@error('nic') {{$message }}@enderror</span>
        </div>
        </div>

        <div class="row mb-3">
            <div class="col">
              <label for="department" class="form-label">Department</label>
              <input type="text" class="form-control w-100" id="department" name="department"   value="{{$data->department}}">
              <span class="text-danger">@error('department') {{$message }}@enderror</span>
            </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <label for="address" class="form-label">Address</label>
            <input type="Text" class="form-control w-100" id="address"  name="address"   value="{{$data->address}}">
            <span class="text-danger">@error('address') {{$message }}@enderror</span>
          </div>
      </div>
     
      <div class="row mt-4">
        <div class="col"><button type="submit" class="btn btn-primary w-100">Get started</button></div>
      </div>
      

@endsection