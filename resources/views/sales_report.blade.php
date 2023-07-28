@extends('admin_layout')

@section('admincontent')





<div class="container-fluid">
<h1>Sales Report</h1>
@if (Session::has('success'))

        <div class="alert alert-success">{{Session::get('success')}} </div>

        @endif

        @if (Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}} </div>
        @endif
      {{--  new use success  & fail message --}}



  <!-- ===========| Start: Search Area |================ -->
  <section class="wr-search py-0" data-aos="fade-up">
    <form action="{{route('sales-report-data')}}" method="get">
      <div class="contentMaxWidth mx-auto search">
        <div class="container wr_searchBox">

          <div class="row max-w-2 pt-2">
          <div class="col-12 col-lg mb-1 mb-sm-2 mb-lg-0">
              <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Enter date"
                name="sch_datef" value="{{$data['filter']['sch_datef']}}">
            </div>
            <div class="col-12 col-lg mb-1 mb-sm-2 mb-lg-0">
              <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Enter date"
                name="sch_datet" value="{{$data['filter']['sch_datet']}}">
            </div>
            <div class="col-12 col-lg mb-1 mb-sm-2 mb-lg-0">
              <select name="cls" class="form-control" id="">
                <option value="0">All Classes</option>
                <option value="1" {{$data['filter']['cls']==1?'selected':''}}>1st</option>
                <option value="2" {{$data['filter']['cls']==2?'selected':''}}>2nd</option>
                <option value="3" {{$data['filter']['cls']==3?'selected':''}}>3rd</option>
              </select>
            </div>
            <div class="col-12 col-lg">
              <select name="train" class="form-control" id="">
              <option value="0">All Trains</option>
              @foreach($data['trains'] as $tr)
              <option value="{{$tr->train_id}}" {{$data['filter']['train']==$tr->train_id?'selected':''}}>{{$tr->train_name}}</option>
              @endforeach
              </select>
            </div>
          </div>
          <div class="row pt-2 pt-sm-3">
            <div class="col d-sm-flex  flex-row-reverse">
              <div>
                <button type="submit" class="btn btn-primary px-5">Search</button>
                <a type="button" class="btn btn-outline-primary px-5 ms-2" href="{{route('sales-report')}}">Reset</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
  <!-- ===========|  End : Search Area |================= -->
<table class="table table-hover ">
    <thead>
      <tr>
        <th>#</th>
        <th>Ticket No</th>
        <th>Date</th>
        <th>Train</th>
        <th>Class</th>
        <th>Seats</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
     @foreach($data['result'] as $key=>$d)
        <tr>
        <td>{{$key+1}}</td>
        <td>{{$d->tc_number}}</td>
        <td>{{$d->created_at}}</td>
        <td>{{$d->train_name}}</td>
        <td>{{$d->seat_cat==1?'1st Class':($d->seat_cat==2?'2nd Class':'3rd Class')}}</td>
        <td>{{$d->seats}}</td>
        <td>{{$d->amount}}</td>
        </tr>
     @endforeach
    </tbody>
  </table>


</div>

@endsection