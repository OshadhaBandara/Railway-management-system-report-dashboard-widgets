@extends('admin_layout')

@section('admincontent')


<div class="container-fluid">
    <h1>Add Employee</h1>

    <form action="{{route('submit_admin_user') }}" method="POST">
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
          <input type="number" class="form-control w-100" id="user_id" name="user_id" value="{{$data}}" min="0">
        </div>
        </div>

        <div class="row mt-4 mb-3">
        <div class="col-12 col-sm mb-3 mb-sm-0">
          <label for="first_name" class="form-label" >First name </label>
          <input type="text" class="form-control" id="signUpFirst"  name="first_name" value="{{old('first_name')}}">
          <span class="text-danger">@error('first_name') {{ $message }} @enderror</span>
        </div>
        <div class="col-12 col-sm">
          <label for="last_name" class="form-label" >Last Name </label>
          <input type="text" class="form-control" id="signUpLast"  name="last_name" value="{{old('last_name')}}">
          <span class="text-danger">@error('last_name') {{$message }}@enderror</span>
        </div>
        </div>
       <div class="row mb-3">
        <div class="col-12 col-sm mb-3 mb-sm-0">
          <label for="email" class="form-label">Email </label>
          <input type="email" class="form-control" id="email" name="email"  value="{{old('email')}}">
          <span class="text-danger">@error('email') {{$message }}@enderror</span>
        </div>
              <div class="col-12 col-sm">
          <label for="tp_number" class="form-label">Telephone</label>
          <div class="input-group">
              <span class="input-group-text" id="basic-addon1">+94</span>
              <input type="text" id="tp_number" class="form-control"  aria-label="Telephone" aria-describedby="basic-addon1" name="tp_number"  value="{{old('tp_number')}}">
              <span class="text-danger">@error('tp_number') {{$message }}@enderror</span>
            </div>
        </div> 
        </div>

       <div class="row mb-3">
        <div class="col">
          <label for="nic" class="form-label">NIC</label>
          <input type="text" class="  form-control w-100" id="nic" name="nic"  value="{{old('nic')}}">
          <span class="text-danger">@error('nic') {{$message }}@enderror</span>
        </div>
        </div>

        <div class="row mb-3">
            <div class="col">
              <label for="department" class="form-label">Department</label>
              <input type="text" class="form-control w-100" id="department" name="department"  value="{{old('department')}}">
              <span class="text-danger">@error('department') {{$message }}@enderror</span>
            </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <label for="address" class="form-label">Address</label>
            <input type="Text" class="form-control w-100" id="address"  name="address"  value="{{old('address')}}">
            <span class="text-danger">@error('address') {{$message }}@enderror</span>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm mb-3 mb-sm-0">
            <label for="InputPassword1" class="form-label">Create Password </label>
            <input type="password" class="form-control" id="signUpPass" placeholder="Create a Password" name="InputPassword1">
            <span class="text-danger">@error('InputPassword1') {{$message }}@enderror</span>
          </div>
          <div class="col-12 col-sm">
            <label for="confirmInputPassword2" class="form-label" >Confirm Password </label>
            <input type="password" class="form-control" id="signUpPass2" placeholder="Confirm the Password" name="confirmInputPassword2">
            <span class="text-danger">@error('confirmInputPassword2') {{$message }}@enderror</span>
          </div>
        </div>
        <div class="row mt-4">
        <div class="col"><button type="submit" class="btn btn-primary w-100">Get started</button></div>
        </div>
      
      </div>
@endsection