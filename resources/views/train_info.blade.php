@extends('passenger_layout')

@section('passengercontent')

<h1>Train Info {{$item[0]->tc_number}}</h1>

<table class="table">
<tr>
    <td> Train Status</td>
    <td>Arrival time</td>
    <td>Departure time</td>
    <td> Train Station</td>
    <td> Current Locations</td>
    <td> Delays Time</td>
    <td> Delays Arrival Time</td>
</tr>
@foreach ($item as $item)

<tr>
    <td> {{$item->status}}</td>
    <td> {{$item->st_arr_time}}</td>
    <td> {{$item->st_dep_time}}</td>
    <td> {{$item->st_name}}</td>
    <td> {{$item->arrv_in}}</td>
    <td> {{$item->delays}}</td>
    <td> {{$item->end_dly_at}}</td>
</tr>

@endforeach
   

    
    
</table>

@endsection