@extends('admin_layout')

@section('admincontent')


<div class="container-fluid" >
    <h1>Update Promotion</h1>

    <form action="{{route('update-promotion') }}" method="POST">
        @csrf
         {{--  new use success  & fail message --}}
        @if (Session::has('success'))

        <div class="alert alert-success">{{Session::get('success')}} </div>

        @endif

        @if (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}} </div>
        @endif
      {{--  new use success  & fail message --}}

    <div class="mb-3">
        <input type="hidden" name="id" value="{{$data->promo_id}}">
            <label for="promo_value" class="form-label">Promotion Value</label>
            <input type="number" class="form-control" id="promo_value" name="promo_value" value="{{$data->promo_value}}" min="0">
    </div>
    <div class="mb-3">
            <label for="" class="form-label">Bookings Count</label>
            <input type="number" class="form-control"  name="bookings" value="{{$data->booking_limit}}" min="0">
    </div>
    <div class="mb-3">
            <label for="" class="form-label">Promotion Text</label>
            <input type="text" class="form-control"  name="promo_text" value="{{$data->promo_text}}">
    </div>


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

@endsection