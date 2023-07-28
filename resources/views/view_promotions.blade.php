@extends('admin_layout')

@section('admincontent')





<div class="container-fluid">
<h1>View Promotions</h1>
@if (Session::has('success'))

        <div class="alert alert-success">{{Session::get('success')}} </div>

        @endif

        @if (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}} </div>
        @endif
      {{--  new use success  & fail message --}}
<table class="table table-hover ">
    <thead>
      <tr>
        <th>ID</th>
        <th>Value</th>
        <th>Required Bookings</th>
        <th>text</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $d)

      <tr>

        <td>{{$d['promo_id']}}</td>
        <td>{{$d['promo_value']}}</td>
        <td>{{$d['booking_limit']}}</td>
        <td>{{$d['promo_text']}}</td>
        <td><a href="{{ "edit-promotion/".$d['promo_id'] }}" class="btn btn-primary">Edit</a></td>
        <td><a href="{{ "delete-promotion/".$d['promo_id'] }}" class="btn btn-danger">Delete</a></td>

      </tr>
      @endforeach
    </tbody>
  </table>


</div>

@endsection