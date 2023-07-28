@extends('layout')

@section('content')









<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center text-center">
        <h3 id="welcome" data-aos="fade-up" class="text-light ">Welcome to RailTrack</h3>
        <h1 data-aos="fade-up" data-aos-delay="400" class="text-white">Online Train Booking Portal</h1>
      </div>
      <!-- <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="{{asset('assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
        </div> -->
    </div>
  </div>
</section><!-- End Hero -->


<main id="main">

  <!-- ===========| Start: Search Area |================ -->
  <section class="wr-search py-0" data-aos="fade-up">
    <form action="{{route('search_result')}}" method="get">
      <div class="contentMaxWidth mx-auto search">
        <div class="container wr_searchBox">
          <div class="row searchArea mx-auto px-1 px-lg-4 py-lg-3 py-2">
            <div class="col-12 mb-2 mb-lg-0 col-lg-6">
              <div class="align-items-center d-sm-flex stationFinder">
                <label for="inputDeparture" class="pe-3 col-form-label d-flex align-items-center w-25 w-lg-auto">
                  <div class="icon mb-1 me-2"><img src="{{asset('assets/img/location-marker.png')}}" /></div>From
                </label>
                <select class="form-select" aria-label="Default select example" id="inputDeparture" name="st_start">
                  <option selected value="0" {{$data['filter']['st_start']==0?'selected':''}}>Select a station</option>
                  @foreach($data['stations'] as $st)
                  <option value="{{$st->st_no}}" {{$data['filter']['st_start']==$st->
                    st_no?'selected':''}}>{{$st->st_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="d-sm-flex align-items-center stationFinder">
                <label for="inputDestination" class="pe-3 col-form-label d-flex align-items-center w-25 w-lg-auto">
                  <div class="icon mb-1 me-2"><img src="{{asset('assets/img/location-marker.png')}}" /></div>To
                </label>
                <select class="form-select" aria-label="Default select example" id="inputDestination" name="st_end">
                  <option selected value="0" {{$data['filter']['st_end']==0?'selected':''}}>Select a station</option>
                  @foreach($data['stations'] as $st)
                  <option value="{{$st->st_no}}" {{$data['filter']['st_end']==$st->
                    st_no?'selected':''}}>{{$st->st_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row max-w-2 pt-2">
            <div class="col-12 col-lg mb-1 mb-sm-2 mb-lg-0">
              <select class="form-select" aria-label="Default select example" name="cls">
                <option selected value="0" {{$data['filter']['cls']==0?'selected':''}}>All Classes</option>
                <option value="1" {{$data['filter']['cls']==1?'selected':''}}>1st</option>
                <option value="2" {{$data['filter']['cls']==2?'selected':''}}>2nd</option>
                <option value="3" {{$data['filter']['cls']==3?'selected':''}}>3rd</option>
              </select>
            </div>
            <div class="col-12 col-lg mb-1 mb-sm-2 mb-lg-0">
              <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Enter date"
                name="sch_datef" value="{{$data['filter']['sch_datef']}}">
            </div>
            <div class="col-12 col-lg mb-1 mb-sm-2 mb-lg-0">
              <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Enter date"
                name="sch_datet" value="{{$data['filter']['sch_datet']}}">
            </div>
            <div class="col-12 col-lg">
              <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="How many Passengers"
                name="pssngrs" value="{{$data['filter']['pssngrs']}}">
            </div>
          </div>
          <div class="row pt-2 pt-sm-3">
            <div class="col d-sm-flex align-items-center justify-content-between flex-row-reverse">
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <!-- <label class="form-check-label" for="flexCheckDefault">
                  Return
                </label> -->
              </div>
              <div>
                <button type="submit" class="btn btn-primary px-5">Search</button>
                <a type="button" class="btn btn-outline-primary px-5 ms-2" href="{{url('/')}}">Reset</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
  <!-- ===========|  End : Search Area |================= -->



  <!-- =========================== Start : Search Result ================================= -->
  <section class="contentMaxWidth mx-auto container pt-0" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col">

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="searchResults">
              <button class="nav-link active" id="oneway-tab" data-bs-toggle="tab" data-bs-target="#oneway-tab-pane"
                type="button" role="tab" aria-controls="oneway-tab-pane" aria-selected="true">One-way</button>
            </li>
            <li class="nav-item" role="searchResults">
              <button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return-tab-pane"
                type="button" role="tab" aria-controls="return-tab-pane" aria-selected="false">Return</button>
            </li>
          </ul>


          <div class="tab-content" id="myTabContent">

            <!-- ================== One-way ========================= -->
            <div class="tab-pane fade show active" id="oneway-tab-pane" role="tabpanel" aria-labelledby="oneway-tab"
              tabindex="0">

              <div class="d-sm-flex justify-content-between mb-3 align-items-center">
                <div
                  class="text-body-emphasis {{$data['filter']['st_start']!=0 && $data['filter']['st_end']!=0 ? '':'d-none'}}">
                  <h6>
                    
                    @foreach($data['stations'] as $st)
                    {{$data['filter']['st_start']==$st->st_no?$st->st_name:''}}
                   
                    @endforeach

                    <span class="text-body-tertiary"> > </span>
                    @foreach($data['stations'] as $st)
                    {{$data['filter']['st_end']==$st->st_no?$st->st_name:''}}
                    @endforeach
                  </h6>
                </div>
                <div
                  class="text-body-emphasis {{$data['filter']['st_start']==0 && $data['filter']['st_end']==0 ? '':'d-none'}}">
                  <h6>All Stations</h6>
                </div>
                <div class="text-body-secondary">
                  <h6>{{$data['filter']['sch_datef']}} to {{$data['filter']['sch_datet']}}</h6>
                </div>
              </div>

              @foreach($data['schedules'] as $key=>$sh)
              <?php
                $c1 = $sh->class_1_seats - $sh->booked_class_1_seats;
                $c2 = $sh->class_2_seats - $sh->booked_class_2_seats;
                $c3 = $sh->class_3_seats - $sh->booked_class_3_seats;
                
                $c1_st_seat_price = 0;
                $c2_st_seat_price = 0;
                $c3_st_seat_price = 0;
                $c1_end_seat_price = 0;
                $c2_end_seat_price = 0;
                $c3_end_seat_price = 0;
                $c1_total = 0;
                $c2_total = 0;
                $c3_total = 0;

                foreach ($data['stations'] as $st) {
                  if($data['filter']['st_start']==$st->st_no){
                    $c1_st_seat_price = $st->ft_class_seat;
                    $c2_st_seat_price = $st->snd_class_seat;
                    $c3_st_seat_price = $st->trd_class_seat;
                  }
                  if($data['filter']['st_end']==$st->st_no){
                    $c1_end_seat_price = $st->ft_class_seat;
                    $c2_end_seat_price = $st->snd_class_seat;
                    $c3_end_seat_price = $st->trd_class_seat;
                  }
                  if($data['filter']['st_start']==0 && $st->st_no == $sh->start_station){
                    $c1_st_seat_price = $st->ft_class_seat;
                    $c2_st_seat_price = $st->snd_class_seat;
                    $c3_st_seat_price = $st->trd_class_seat;
                  }
                  if($data['filter']['st_end']==0 && $st->st_no == $sh->end_station){
                    $c1_end_seat_price = $st->ft_class_seat;
                    $c2_end_seat_price = $st->snd_class_seat;
                    $c3_end_seat_price = $st->trd_class_seat;
                  }
                }
                
                $c1_total = abs($c1_end_seat_price - $c1_st_seat_price);
                $c2_total = abs($c2_end_seat_price - $c2_st_seat_price);
                $c3_total = abs($c3_end_seat_price - $c3_st_seat_price);

                $filter_dif = $data['filter']['st_start'] - $data['filter']['st_end'];
                $data_dif = $sh->start_station - $sh->end_station;
                $filter_state = $filter_dif>=0?'P':'N';
                $data_state = $data_dif>=0?'P':'N';

              ?>

              @if($filter_state == $data_state && $data['filter']['search']==true)
              @if($c1>=$data['filter']['pssngrs'] && $c1>0 && ( $data['filter']['cls']==0 || $data['filter']['cls']==1))
              <a href="{{ "book-tour/".encrypt($sh->schedule_id.",".$data['filter']['pssngrs'].",1,".$c1_total.",".$data['filter']['st_start'].",".$data['filter']['st_end']) }}">
              <div class="card-searchResult hover-card">

                <div class="d-md-flex justify-content-between px-md-3">

                  <div class="d-md-flex align-items-md-center mb-2">
                    <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img src="{{asset('assets/img/train-icon.png')}}" />
                    </div>
                    <div class="">
                      <!-- Train No. and Name -->
                      <div class="trainName text-primary-emphasis">#{{$sh->schedule_id}} <b>{{$sh->train_name}}</b></div>
                      <div class="d-md-flex align-items-center wr-trainClass text-secondary">
                        <!-- Train Class -->
                        <div class="trainClass pe-2">1st Class</div>
                        <div class="pe-2 d-none d-md-block">•</div>
                        <!-- Available Seats -->
                        <div class="trainClass">{{$c1}} Seats Available</div>

                      </div>
                    </div>
                  </div>

                  <!-- Ticket Price -->
                  <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block">LKR {{number_format($c1_total,2)}}</div>
                </div>


                <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                  <div class="wr-departure fw-semibold">
                    <!-- Departure Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->start_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Departure Time -->
                    <div class="departureTime">{{date("H:i:s", strtotime($sh->start_time))}}</div>
                  </div>
                  <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                    <!-- Destination Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->end_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Destination Time -->
                    <div class="destinationTime">{{date("H:i:s", strtotime($sh->end_time))}}</div>
                  </div>
                </div>

                <div class="w-100 breakerLine my-2"></div>

                <!-- Train Tags -->
                <div class="wr-trainTags d-flex">

                  <div class="tarainTag">Express</div>

                  <div class="tarainTag d-flex align-items-center">
                    <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span> Buffet
                  </div>

                </div>

              </div>
              </a>
              @endif

              @if($c2>=$data['filter']['pssngrs'] && $c2>0 && ($data['filter']['cls']==0 || $data['filter']['cls']==2))
              <a href="{{ "book-tour/".encrypt($sh->schedule_id.",".$data['filter']['pssngrs'].",2,".$c2_total.",".$data['filter']['st_start'].",".$data['filter']['st_end']) }}">
              <div class="card-searchResult hover-card">

                <div class="d-md-flex justify-content-between px-md-3">

                  <div class="d-md-flex align-items-md-center mb-2">
                    <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img src="{{asset('assets/img/train-icon.png')}}" />
                    </div>
                    <div class="">
                      <!-- Train No. and Name -->
                      <div class="trainName text-primary-emphasis">#{{$sh->schedule_id}} <b>{{$sh->train_name}}</b></div>
                      <div class="d-md-flex align-items-center wr-trainClass text-secondary">
                        <!-- Train Class -->
                        <div class="trainClass pe-2">2nd Class</div>
                        <div class="pe-2 d-none d-md-block">•</div>
                        <!-- Available Seats -->
                        <div class="trainClass">{{$c2}} Seats Available</div>

                      </div>
                    </div>
                  </div>

                  <!-- Ticket Price -->
                  <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block">LKR {{number_format($c2_total,2)}}</div>
                </div>


                <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                  <div class="wr-departure fw-semibold">
                    <!-- Departure Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->start_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Departure Time -->
                    <div class="departureTime">{{date("H:i:s", strtotime($sh->start_time))}}</div>
                  </div>
                  <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                    <!-- Destination Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->end_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Destination Time -->
                    <div class="destinationTime">{{date("H:i:s", strtotime($sh->end_time))}}</div>
                  </div>
                </div>

                <div class="w-100 breakerLine my-2"></div>

                <!-- Train Tags -->
                <div class="wr-trainTags d-flex">

                  <div class="tarainTag">Express</div>

                  <div class="tarainTag d-flex align-items-center">
                    <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span> Buffet
                  </div>

                </div>

              </div>
              </a>
              @endif

              @if($c3>=$data['filter']['pssngrs'] && $c3>0 && ($data['filter']['cls']==0 || $data['filter']['cls']==3))
              <a href="{{ "book-tour/".encrypt($sh->schedule_id.",".$data['filter']['pssngrs'].",3,".$c3_total.",".$data['filter']['st_start'].",".$data['filter']['st_end']) }}">
              <div class="card-searchResult hover-card">

                <div class="d-md-flex justify-content-between px-md-3">

                  <div class="d-md-flex align-items-md-center mb-2">
                    <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img src="{{asset('assets/img/train-icon.png')}}" />
                    </div>
                    <div class="">
                      <!-- Train No. and Name -->
                      <div class="trainName text-primary-emphasis">#{{$sh->schedule_id}} <b>{{$sh->train_name}}</b></div>
                      <div class="d-md-flex align-items-center wr-trainClass text-secondary">
                        <!-- Train Class -->
                        <div class="trainClass pe-2">3rd Class</div>
                        <div class="pe-2 d-none d-md-block">•</div>
                        <!-- Available Seats -->
                        <div class="trainClass">{{$c3}} Seats Available</div>

                      </div>
                    </div>
                  </div>

                  <!-- Ticket Price -->
                  <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block">LKR {{number_format($c3_total,2)}}</div>
                </div>


                <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                  <div class="wr-departure fw-semibold">
                    <!-- Departure Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->start_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Departure Time -->
                    <div class="departureTime">{{date("H:i:s", strtotime($sh->start_time))}}</div>
                  </div>
                  <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                    <!-- Destination Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->end_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Destination Time -->
                    <div class="destinationTime">{{date("H:i:s", strtotime($sh->end_time))}}</div>
                  </div>
                </div>

                <div class="w-100 breakerLine my-2"></div>

                <!-- Train Tags -->
                <div class="wr-trainTags d-flex">

                  <div class="tarainTag">Express</div>

                  <div class="tarainTag d-flex align-items-center">
                    <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span> Buffet
                  </div>

                </div>

              </div>
              </a>
              @endif
              @elseif( $data['filter']['search']==false)
              @if($c1>=$data['filter']['pssngrs'] && $c1>0 && ( $data['filter']['cls']==0 || $data['filter']['cls']==1))
              <a href="{{ "book-tour/".encrypt($sh->schedule_id.",".$data['filter']['pssngrs'].",1,".$c1_total.",".$data['filter']['st_start'].",".$data['filter']['st_end']) }}">
              <div class="card-searchResult hover-card">

                <div class="d-md-flex justify-content-between px-md-3">

                  <div class="d-md-flex align-items-md-center mb-2">
                    <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img src="{{asset('assets/img/train-icon.png')}}" />
                    </div>
                    <div class="">
                      <!-- Train No. and Name -->
                      <div class="trainName text-primary-emphasis">#{{$sh->schedule_id}} <b>{{$sh->train_name}}</b></div>
                      <div class="d-md-flex align-items-center wr-trainClass text-secondary">
                        <!-- Train Class -->
                        <div class="trainClass pe-2">1st Class</div>
                        <div class="pe-2 d-none d-md-block">•</div>
                        <!-- Available Seats -->
                        <div class="trainClass">{{$c1}} Seats Available</div>

                      </div>
                    </div>
                  </div>

                  <!-- Ticket Price -->
                  <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block">LKR {{number_format($c1_total,2)}}</div>
                </div>


                <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                  <div class="wr-departure fw-semibold">
                    <!-- Departure Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->start_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Departure Time -->
                    <div class="departureTime">{{date("H:i:s", strtotime($sh->start_time))}}</div>
                  </div>
                  <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                    <!-- Destination Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->end_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Destination Time -->
                    <div class="destinationTime">{{date("H:i:s", strtotime($sh->end_time))}}</div>
                  </div>
                </div>

                <div class="w-100 breakerLine my-2"></div>

                <!-- Train Tags -->
                <div class="wr-trainTags d-flex">

                  <div class="tarainTag">Express</div>

                  <div class="tarainTag d-flex align-items-center">
                    <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span> Buffet
                  </div>

                </div>

              </div>
              </a>
              @endif

              @if($c2>=$data['filter']['pssngrs'] && $c2>0 && ($data['filter']['cls']==0 || $data['filter']['cls']==2))
              <a href="{{ "book-tour/".encrypt($sh->schedule_id.",".$data['filter']['pssngrs'].",2,".$c2_total.",".$data['filter']['st_start'].",".$data['filter']['st_end']) }}">
              <div class="card-searchResult hover-card">

                <div class="d-md-flex justify-content-between px-md-3">

                  <div class="d-md-flex align-items-md-center mb-2">
                    <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img src="{{asset('assets/img/train-icon.png')}}" />
                    </div>
                    <div class="">
                      <!-- Train No. and Name -->
                      <div class="trainName text-primary-emphasis">#{{$sh->schedule_id}} <b>{{$sh->train_name}}</b></div>
                      <div class="d-md-flex align-items-center wr-trainClass text-secondary">
                        <!-- Train Class -->
                        <div class="trainClass pe-2">2nd Class</div>
                        <div class="pe-2 d-none d-md-block">•</div>
                        <!-- Available Seats -->
                        <div class="trainClass">{{$c2}} Seats Available</div>

                      </div>
                    </div>
                  </div>

                  <!-- Ticket Price -->
                  <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block">LKR {{number_format($c2_total,2)}}</div>
                </div>


                <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                  <div class="wr-departure fw-semibold">
                    <!-- Departure Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->start_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Departure Time -->
                    <div class="departureTime">{{date("H:i:s", strtotime($sh->start_time))}}</div>
                  </div>
                  <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                    <!-- Destination Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->end_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Destination Time -->
                    <div class="destinationTime">{{date("H:i:s", strtotime($sh->end_time))}}</div>
                  </div>
                </div>

                <div class="w-100 breakerLine my-2"></div>

                <!-- Train Tags -->
                <div class="wr-trainTags d-flex">

                  <div class="tarainTag">Express</div>

                  <div class="tarainTag d-flex align-items-center">
                    <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span> Buffet
                  </div>

                </div>

              </div>
              </a>
              @endif

              @if($c3>=$data['filter']['pssngrs'] && $c3>0 && ($data['filter']['cls']==0 || $data['filter']['cls']==3))
              <a href="{{ "book-tour/".encrypt($sh->schedule_id.",".$data['filter']['pssngrs'].",3,".$c3_total.",".$data['filter']['st_start'].",".$data['filter']['st_end']) }}">
              <div class="card-searchResult hover-card">

                <div class="d-md-flex justify-content-between px-md-3">

                  <div class="d-md-flex align-items-md-center mb-2">
                    <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img src="{{asset('assets/img/train-icon.png')}}" />
                    </div>
                    <div class="">
                      <!-- Train No. and Name -->
                      <div class="trainName text-primary-emphasis">#{{$sh->schedule_id}} <b>{{$sh->train_name}}</b></div>
                      <div class="d-md-flex align-items-center wr-trainClass text-secondary">
                        <!-- Train Class -->
                        <div class="trainClass pe-2">3rd Class</div>
                        <div class="pe-2 d-none d-md-block">•</div>
                        <!-- Available Seats -->
                        <div class="trainClass">{{$c3}} Seats Available</div>

                      </div>
                    </div>
                  </div>

                  <!-- Ticket Price -->
                  <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block">LKR {{number_format($c3_total,2)}}</div>
                </div>


                <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                  <div class="wr-departure fw-semibold">
                    <!-- Departure Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->start_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Departure Time -->
                    <div class="departureTime">{{date("H:i:s", strtotime($sh->start_time))}}</div>
                  </div>
                  <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                    <!-- Destination Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->end_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Destination Time -->
                    <div class="destinationTime">{{date("H:i:s", strtotime($sh->end_time))}}</div>
                  </div>
                </div>

                <div class="w-100 breakerLine my-2"></div>

                <!-- Train Tags -->
                <div class="wr-trainTags d-flex">

                  <div class="tarainTag">Express</div>

                  <div class="tarainTag d-flex align-items-center">
                    <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span> Buffet
                  </div>

                </div>

              </div>
              </a>
              @endif
              @endif
              @endforeach


            </div>
            <!-- ================== One-way ========================= -->

            <!-- ================== Return ========================= -->
            <div class="tab-pane fade" id="return-tab-pane" role="tabpanel" aria-labelledby="return-tab" tabindex="0">

              <div class="d-sm-flex justify-content-between mb-3 align-items-center">
                <div
                  class="text-body-emphasis {{$data['filter']['st_start']!=0 && $data['filter']['st_end']!=0 ? '':'d-none'}}">
                  <h6>
                    @foreach($data['stations'] as $st)
                    {{$data['filter']['st_end']==$st->st_no?$st->st_name:''}}
                    @endforeach

                    <span class="text-body-tertiary"> > </span>
                    @foreach($data['stations'] as $st)
                    {{$data['filter']['st_start']==$st->st_no?$st->st_name:''}}
                    @endforeach
                  </h6>
                </div>
                <div
                  class="text-body-emphasis {{$data['filter']['st_start']==0 && $data['filter']['st_end']==0 ? '':'d-none'}}">
                  <h6>All Stations</h6>
                </div>
                <div class="text-body-secondary">
                  <h6>{{$data['filter']['sch_datef']}} to {{$data['filter']['sch_datet']}}</h6>
                </div>
              </div>

              @foreach($data['schedules'] as $key=>$sh)
              <?php
                $c1 = $sh->class_1_seats - $sh->booked_class_1_seats;
                $c2 = $sh->class_2_seats - $sh->booked_class_2_seats;
                $c3 = $sh->class_3_seats - $sh->booked_class_3_seats;
                
                $c1_st_seat_price = 0;
                $c2_st_seat_price = 0;
                $c3_st_seat_price = 0;
                $c1_end_seat_price = 0;
                $c2_end_seat_price = 0;
                $c3_end_seat_price = 0;
                $c1_total = 0;
                $c2_total = 0;
                $c3_total = 0;

                foreach ($data['stations'] as $st) {
                  if($data['filter']['st_start']==$st->st_no){
                    $c1_st_seat_price = $st->ft_class_seat;
                    $c2_st_seat_price = $st->snd_class_seat;
                    $c3_st_seat_price = $st->trd_class_seat;
                  }
                  if($data['filter']['st_end']==$st->st_no){
                    $c1_end_seat_price = $st->ft_class_seat;
                    $c2_end_seat_price = $st->snd_class_seat;
                    $c3_end_seat_price = $st->trd_class_seat;
                  }
                  if($data['filter']['st_start']==0 && $st->st_no == $sh->start_station){
                    $c1_st_seat_price = $st->ft_class_seat;
                    $c2_st_seat_price = $st->snd_class_seat;
                    $c3_st_seat_price = $st->trd_class_seat;
                  }
                  if($data['filter']['st_end']==0 && $st->st_no == $sh->end_station){
                    $c1_end_seat_price = $st->ft_class_seat;
                    $c2_end_seat_price = $st->snd_class_seat;
                    $c3_end_seat_price = $st->trd_class_seat;
                  }
                }
                
                $c1_total = abs($c1_end_seat_price - $c1_st_seat_price);
                $c2_total = abs($c2_end_seat_price - $c2_st_seat_price);
                $c3_total = abs($c3_end_seat_price - $c3_st_seat_price);

                $filter_dif = $data['filter']['st_start'] - $data['filter']['st_end'];
                $data_dif = $sh->start_station - $sh->end_station;
                $filter_state = $filter_dif>=0?'P':'N';
                $data_state = $data_dif>=0?'P':'N';

              ?>

              @if($filter_state!=$data_state && $data['filter']['search']==true)
              @if($c1>=$data['filter']['pssngrs'] && $c1>0 && ( $data['filter']['cls']==0 || $data['filter']['cls']==1))
              <a href="{{ "book-tour/".encrypt($sh->schedule_id.",".$data['filter']['pssngrs'].",1,".$c1_total.",".$data['filter']['st_start'].",".$data['filter']['st_end']) }}">
              <div class="card-searchResult hover-card">

                <div class="d-md-flex justify-content-between px-md-3">

                  <div class="d-md-flex align-items-md-center mb-2">
                    <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img src="{{asset('assets/img/train-icon.png')}}" />
                    </div>
                    <div class="">
                      <!-- Train No. and Name -->
                      <div class="trainName text-primary-emphasis">#{{$sh->schedule_id}} <b>{{$sh->train_name}}</b></div>
                      <div class="d-md-flex align-items-center wr-trainClass text-secondary">
                        <!-- Train Class -->
                        <div class="trainClass pe-2">1st Class</div>
                        <div class="pe-2 d-none d-md-block">•</div>
                        <!-- Available Seats -->
                        <div class="trainClass">{{$c1}} Seats Available</div>

                      </div>
                    </div>
                  </div>

                  <!-- Ticket Price -->
                  <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block">LKR {{number_format($c1_total,2)}}</div>
                </div>


                <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                  <div class="wr-departure fw-semibold">
                    <!-- Departure Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->start_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Departure Time -->
                    <div class="departureTime">{{date("H:i:s", strtotime($sh->start_time))}}</div>
                  </div>
                  <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                    <!-- Destination Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->end_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Destination Time -->
                    <div class="destinationTime">{{date("H:i:s", strtotime($sh->end_time))}}</div>
                  </div>
                </div>

                <div class="w-100 breakerLine my-2"></div>

                <!-- Train Tags -->
                <div class="wr-trainTags d-flex">

                  <div class="tarainTag">Express</div>

                  <div class="tarainTag d-flex align-items-center">
                    <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span> Buffet
                  </div>

                </div>

              </div>
              </a>
              @endif

              @if($c2>=$data['filter']['pssngrs'] && $c2>0 && ($data['filter']['cls']==0 || $data['filter']['cls']==2))
              <a href="{{ "book-tour/".encrypt($sh->schedule_id.",".$data['filter']['pssngrs'].",2,".$c2_total.",".$data['filter']['st_start'].",".$data['filter']['st_end']) }}">
              <div class="card-searchResult hover-card">

                <div class="d-md-flex justify-content-between px-md-3">

                  <div class="d-md-flex align-items-md-center mb-2">
                    <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img src="{{asset('assets/img/train-icon.png')}}" />
                    </div>
                    <div class="">
                      <!-- Train No. and Name -->
                      <div class="trainName text-primary-emphasis">#{{$sh->schedule_id}} <b>{{$sh->train_name}}</b></div>
                      <div class="d-md-flex align-items-center wr-trainClass text-secondary">
                        <!-- Train Class -->
                        <div class="trainClass pe-2">2nd Class</div>
                        <div class="pe-2 d-none d-md-block">•</div>
                        <!-- Available Seats -->
                        <div class="trainClass">{{$c2}} Seats Available</div>

                      </div>
                    </div>
                  </div>

                  <!-- Ticket Price -->
                  <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block">LKR {{number_format($c2_total,2)}}</div>
                </div>


                <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                  <div class="wr-departure fw-semibold">
                    <!-- Departure Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->start_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Departure Time -->
                    <div class="departureTime">{{date("H:i:s", strtotime($sh->start_time))}}</div>
                  </div>
                  <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                    <!-- Destination Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->end_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Destination Time -->
                    <div class="destinationTime">{{date("H:i:s", strtotime($sh->end_time))}}</div>
                  </div>
                </div>

                <div class="w-100 breakerLine my-2"></div>

                <!-- Train Tags -->
                <div class="wr-trainTags d-flex">

                  <div class="tarainTag">Express</div>

                  <div class="tarainTag d-flex align-items-center">
                    <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span> Buffet
                  </div>

                </div>

              </div>
              </a>
              @endif

              @if($c3>=$data['filter']['pssngrs'] && $c3>0 && ($data['filter']['cls']==0 || $data['filter']['cls']==3))
              <a href="{{ "book-tour/".encrypt($sh->schedule_id.",".$data['filter']['pssngrs'].",3,".$c3_total.",".$data['filter']['st_start'].",".$data['filter']['st_end']) }}">
              <div class="card-searchResult hover-card">

                <div class="d-md-flex justify-content-between px-md-3">

                  <div class="d-md-flex align-items-md-center mb-2">
                    <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img src="{{asset('assets/img/train-icon.png')}}" />
                    </div>
                    <div class="">
                      <!-- Train No. and Name -->
                      <div class="trainName text-primary-emphasis">#{{$sh->schedule_id}} <b>{{$sh->train_name}}</b></div>
                      <div class="d-md-flex align-items-center wr-trainClass text-secondary">
                        <!-- Train Class -->
                        <div class="trainClass pe-2">3rd Class</div>
                        <div class="pe-2 d-none d-md-block">•</div>
                        <!-- Available Seats -->
                        <div class="trainClass">{{$c3}} Seats Available</div>

                      </div>
                    </div>
                  </div>

                  <!-- Ticket Price -->
                  <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block">LKR {{number_format($c3_total,2)}}</div>
                </div>


                <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                  <div class="wr-departure fw-semibold">
                    <!-- Departure Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->start_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Departure Time -->
                    <div class="departureTime">{{date("H:i:s", strtotime($sh->start_time))}}</div>
                  </div>
                  <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                    <!-- Destination Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->end_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Destination Time -->
                    <div class="destinationTime">{{date("H:i:s", strtotime($sh->end_time))}}</div>
                  </div>
                </div>

                <div class="w-100 breakerLine my-2"></div>

                <!-- Train Tags -->
                <div class="wr-trainTags d-flex">

                  <div class="tarainTag">Express</div>

                  <div class="tarainTag d-flex align-items-center">
                    <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span> Buffet
                  </div>

                </div>

              </div>
              </a>
              @endif
              @elseif( $data['filter']['search']==false)
              @if($c1>=$data['filter']['pssngrs'] && $c1>0 && ( $data['filter']['cls']==0 || $data['filter']['cls']==1))
              <a href="{{ "book-tour/".encrypt($sh->schedule_id.",".$data['filter']['pssngrs'].",1,".$c1_total.",".$data['filter']['st_start'].",".$data['filter']['st_end']) }}">
              <div class="card-searchResult hover-card">

                <div class="d-md-flex justify-content-between px-md-3">

                  <div class="d-md-flex align-items-md-center mb-2">
                    <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img src="{{asset('assets/img/train-icon.png')}}" />
                    </div>
                    <div class="">
                      <!-- Train No. and Name -->
                      <div class="trainName text-primary-emphasis">#{{$sh->schedule_id}} <b>{{$sh->train_name}}</b></div>
                      <div class="d-md-flex align-items-center wr-trainClass text-secondary">
                        <!-- Train Class -->
                        <div class="trainClass pe-2">1st Class</div>
                        <div class="pe-2 d-none d-md-block">•</div>
                        <!-- Available Seats -->
                        <div class="trainClass">{{$c1}} Seats Available</div>

                      </div>
                    </div>
                  </div>

                  <!-- Ticket Price -->
                  <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block">LKR {{number_format($c1_total,2)}}</div>
                </div>


                <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                  <div class="wr-departure fw-semibold">
                    <!-- Departure Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->start_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Departure Time -->
                    <div class="departureTime">{{date("H:i:s", strtotime($sh->start_time))}}</div>
                  </div>
                  <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                    <!-- Destination Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->end_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Destination Time -->
                    <div class="destinationTime">{{date("H:i:s", strtotime($sh->end_time))}}</div>
                  </div>
                </div>

                <div class="w-100 breakerLine my-2"></div>

                <!-- Train Tags -->
                <div class="wr-trainTags d-flex">

                  <div class="tarainTag">Express</div>

                  <div class="tarainTag d-flex align-items-center">
                    <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span> Buffet
                  </div>

                </div>

              </div>
              </a>
              @endif

              @if($c2>=$data['filter']['pssngrs'] && $c2>0 && ($data['filter']['cls']==0 || $data['filter']['cls']==2))
              <a href="{{ "book-tour/".encrypt($sh->schedule_id.",".$data['filter']['pssngrs'].",2,".$c2_total.",".$data['filter']['st_start'].",".$data['filter']['st_end']) }}">
              <div class="card-searchResult hover-card">

                <div class="d-md-flex justify-content-between px-md-3">

                  <div class="d-md-flex align-items-md-center mb-2">
                    <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img src="{{asset('assets/img/train-icon.png')}}" />
                    </div>
                    <div class="">
                      <!-- Train No. and Name -->
                      <div class="trainName text-primary-emphasis">#{{$sh->schedule_id}} <b>{{$sh->train_name}}</b></div>
                      <div class="d-md-flex align-items-center wr-trainClass text-secondary">
                        <!-- Train Class -->
                        <div class="trainClass pe-2">2nd Class</div>
                        <div class="pe-2 d-none d-md-block">•</div>
                        <!-- Available Seats -->
                        <div class="trainClass">{{$c2}} Seats Available</div>

                      </div>
                    </div>
                  </div>

                  <!-- Ticket Price -->
                  <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block">LKR {{number_format($c2_total,2)}}</div>
                </div>


                <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                  <div class="wr-departure fw-semibold">
                    <!-- Departure Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->start_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Departure Time -->
                    <div class="departureTime">{{date("H:i:s", strtotime($sh->start_time))}}</div>
                  </div>
                  <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                    <!-- Destination Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->end_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Destination Time -->
                    <div class="destinationTime">{{date("H:i:s", strtotime($sh->end_time))}}</div>
                  </div>
                </div>

                <div class="w-100 breakerLine my-2"></div>

                <!-- Train Tags -->
                <div class="wr-trainTags d-flex">

                  <div class="tarainTag">Express</div>

                  <div class="tarainTag d-flex align-items-center">
                    <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span> Buffet
                  </div>

                </div>

              
              </div>
              @endif

              @if($c3>=$data['filter']['pssngrs'] && $c3>0 && ($data['filter']['cls']==0 || $data['filter']['cls']==3))
              <a href="{{ "book-tour/".encrypt($sh->schedule_id.",".$data['filter']['pssngrs'].",1,".$c1_total.",".$data['filter']['st_start'].",".$data['filter']['st_end']) }}">
              <div class="card-searchResult hover-card">

                <div class="d-md-flex justify-content-between px-md-3">

                  <div class="d-md-flex align-items-md-center mb-2">
                    <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img src="{{asset('assets/img/train-icon.png')}}" />
                    </div>
                    <div class="">
                      <!-- Train No. and Name -->
                      <div class="trainName text-primary-emphasis">#{{$sh->schedule_id}} <b>{{$sh->train_name}}</b></div>
                      <div class="d-md-flex align-items-center wr-trainClass text-secondary">
                        <!-- Train Class -->
                        <div class="trainClass pe-2">3rd Class</div>
                        <div class="pe-2 d-none d-md-block">•</div>
                        <!-- Available Seats -->
                        <div class="trainClass">{{$c3}} Seats Available</div>

                      </div>
                    </div>
                  </div>

                  <!-- Ticket Price -->
                  <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block">LKR {{number_format($c3_total,2)}}</div>
                </div>


                <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                  <div class="wr-departure fw-semibold">
                    <!-- Departure Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->start_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Departure Time -->
                    <div class="departureTime">{{date("H:i:s", strtotime($sh->start_time))}}</div>
                  </div>
                  <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                    <!-- Destination Station -->
                    @foreach($data['stations'] as $st)
                    <div class="departureStation text-dark {{$st->st_no==$sh->end_station?'':'d-none'}}">
                      {{$st->st_name}}</div>
                    @endforeach
                    <!-- Destination Time -->
                    <div class="destinationTime">{{date("H:i:s", strtotime($sh->end_time))}}</div>
                  </div>
                </div>

                <div class="w-100 breakerLine my-2"></div>

                <!-- Train Tags -->
                <div class="wr-trainTags d-flex">

                  <div class="tarainTag">Express</div>

                  <div class="tarainTag d-flex align-items-center">
                    <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span> Buffet
                  </div>

                </div>

              
              </div>
              </a>
              @endif
              @endif


              @endforeach


            </div>
            <!-- ================== Return  ========================= -->
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- =========================== End : Search Result ================================= -->


  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>About Us</h2>
      </div>

      <div class="row content">
        'About Us' content goes here.
      </div>

    </div>
  </section><!-- End About Us Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Services</h2>
      </div>

      <div class="row">

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= More Services Section ======= -->
  <section id="more-services" class="more-services">
    <div class="container">

      <div class="row">
        <div class="col-md-6 d-flex align-items-stretch">
          <div class="card" style='background-image: url("assets/img/more-services-1.jpg");' data-aos="fade-up"
            data-aos-delay="100">
            <div class="card-body">
              <h5 class="card-title"><a href="">Lobira Duno</a></h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et
                dolore magna aliqua.</p>
              <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="card" style='background-image: url("assets/img/more-services-2.jpg");' data-aos="fade-up"
            data-aos-delay="200">
            <div class="card-body">
              <h5 class="card-title"><a href="">Limere Radses</a></h5>
              <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium,
                totam rem.</p>
              <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
            </div>
          </div>

        </div>
        <div class="col-md-6 d-flex align-items-stretch mt-4">
          <div class="card" style='background-image: url("assets/img/more-services-3.jpg");' data-aos="fade-up"
            data-aos-delay="100">
            <div class="card-body">
              <h5 class="card-title"><a href="">Nive Lodo</a></h5>
              <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni
                dolores.</p>
              <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch mt-4">
          <div class="card" style='background-image: url("assets/img/more-services-4.jpg");' data-aos="fade-up"
            data-aos-delay="200">
            <div class="card-body">
              <h5 class="card-title"><a href="">Pale Treda</a></h5>
              <p class="card-text">Nostrum eum sed et autem dolorum perspiciatis. Magni porro quisquam laudantium
                voluptatem.</p>
              <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End More Services Section -->


  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>Contact Us</h2>
      </div>

      <div class="row">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="contact-about">
            <h3>Vesperr</h3>
            <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque
              felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
          <div class="info">
            <div>
              <i class="ri-map-pin-line"></i>
              <p>A108 Adam Street<br>New York, NY 535022</p>
            </div>

            <div>
              <i class="ri-mail-send-line"></i>
              <p>info@example.com</p>
            </div>

            <div>
              <i class="ri-phone-line"></i>
              <p>+1 5589 55488 55s</p>
            </div>

          </div>
        </div>


        <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
          <form action="{{ route('contact_us') }}" method="post" role="form">
            @csrf
            <div class="form-group">  
              <label for="name">Your Name</label>
              <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
              <label for="email">Your Email</label>
              <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" required>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" name="message" rows="5" required></textarea>
            </div>
        
            <div class="text-center m-3">
              <button type="submit" class="btn btn-primary ">Send Message</button>
            </div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->



@endsection