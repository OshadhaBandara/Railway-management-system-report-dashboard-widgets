@extends('passenger_layout')

@section('passengercontent')

<h1>Active Tickets Info</h1>

@foreach ($item as $item)
<table class="tabale">

    <tr>
        <a href="{{ "track_train/".$item->train_id }}">Ticket Number {{$item->tc_number}}</a>
    </tr>
</table>

@endforeach
   


@endsection
    