@extends('admin_layout')

@section('admincontent')


<div class="container-fluid" >
    <h1>Add Train Stations</h1>

    <form action="{{route('add_stationsTo_db') }}" method="POST">
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
            <label for="trainId" class="form-label">Train Station ID</label>
            <input type="number" class="form-control" id="trainId" name="st_no" value="{{$data}}" min="0">
    </div>

      <div class="mb-3">
        <label for="st_name" class="form-label">Train Station Name</label>
        <input type="text" class="form-control" id="st_name" name="st_name">
        <span class="text-danger">@error('st_name') {{$message }}@enderror</span>
      </div>

      <div class="mb-3">
        <label for="ft_class_seat" class="form-label">First class Seat Price(Colombo to Station)</label>
        <input type="number" class="form-control" id="ft_class_seat" name="ft_class_seat" min="0" >
        <span class="text-danger">@error('ft_class_seat') {{$message }}@enderror</span>
      </div>

      <div class="mb-3">
        <label for="snd_class_seat" class="form-label">Second class Seat Seat Price(Colombo to Station)</label>
        <input type="number" class="form-control" id="snd_class_seat" name="snd_class_seat"  min="0" >
        <span class="text-danger">@error('snd_class_seat') {{$message }}@enderror</span>
      </div>

      <div class="mb-3">
        <label for="trd_class_seat" class="form-label">Third class Seat Seat Price(Colombo to Station)</label>
        <input type="number" class="form-control" id="trd_class_seat" name="trd_class_seat"  min="0" >
        <span class="text-danger">@error('trd_class_seat') {{$message }}@enderror</span>
      </div>
   
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

@endsection