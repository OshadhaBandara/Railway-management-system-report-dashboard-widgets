@extends('passenger_layout')

@php
$page_name = "Checkout"
@endphp

@section('passengercontent')


<div>



  <section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h1 class="fw-bold mb-0 text-black">Your Train Tickets</h1>
                      <h6 class="mb-0 text-muted">1 items</h6>
                    </div>
                    <hr class="my-4">

                    <!-- Item -->


                    <div class="card-searchResult">

                      <div class="d-md-flex justify-content-between px-md-3">

                        <div class="d-md-flex align-items-md-center mb-2">
                          <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img
                              src="{{asset('assets/img/train-icon.png')}}" /></div>
                          <div class="">
                            <!-- Train No. and Name -->
                            <div class="trainName text-primary-emphasis">#{{$data['schedule']['schedule_id']}}
                              <b>Udarata Menike</b></div>
                            <div class="d-md-flex align-items-center wr-trainClass text-secondary">
                              <!-- Train Class -->{{$data['schedule']['cls']}}
                              <div class="trainClass pe-2">{{$data['cls']=="1"?'1st':(($data['cls']=="2")?'2nd':'3rd')}}
                                Class</div>
                              <div class="pe-2 d-none d-md-block">•</div>
                              <!-- Available Seats -->
                              <?php
                                      $c1 = $data['schedule']['class_1_seats'] - $data['schedule']['booked_class_1_seats'];
                                      $c2 = $data['schedule']['class_2_seats'] - $data['schedule']['booked_class_2_seats'];
                                      $c3 = $data['schedule']['class_3_seats'] - $data['schedule']['booked_class_3_seats'];
                                      
                                      $seat_price = $data['price'];

                                      $promos = $data['promos'];
                                      $passenger_promo_id = $data['passenger']['promo_id'];
                                      $passenger_promo_state = $data['passenger']['promo_used'];
                                      $passenger_promo_code = $data['passenger']['promo_code'];
    
                                    ?>
                              <div class="trainClass">{{$data['cls']=="1"?$c1:(($data['cls']=="2")?$c2:$c3)}} Seats
                                Available</div>
                              
                              <!--   item add & remove   -->


                              <div class="col-md-3 col-lg-3 col-xl-3 d-flex">
                                <button class="btn btn-link px-1 seat_adjust"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                  <i class="fas fa-minus"></i>
                                </button>

                                <input id="form1" min="1" name="quantity" value="{{$data['nofp']}}" type="number"
                                  max='{{$data["cls"]=="1"?$c1:(($data["cls"]=="2")?$c2:$c3)}}' readonly
                                  class="form-control form-control-sm " style="width: 42px"/>

                                <button class="btn btn-link px-1 seat_adjust"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                  <i class="fas fa-plus"></i>
                                </button>
                              </div>
                              <!--   item add & remove    -->

                            </div>

                          </div>
                        </div>

                        <!-- Ticket Price -->
                        <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block total_price"></div>
                      </div>


                      <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                        <div class="wr-departure fw-semibold">
                          <!-- Departure Station -->
                          <div class="departureStation text-dark">
                            @foreach($data['stations'] as $st)
                            {{$data['st_start']==$st->st_no?$st->st_name:''}}
                            @endforeach
                          </div>
                          <!-- Departure Time -->
                          <!-- <div class="departureTime">8:30 PM</div> -->
                        </div>
                        <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                          <!-- Destination Station -->
                          <div class="destinationStation text-dark">
                            @foreach($data['stations'] as $st)
                            {{$data['st_end']==$st->st_no?$st->st_name:''}}
                            @endforeach
                          </div>
                          <!-- Destination Time -->
                          <!-- <div class="destinationTime">5:30 AM</div> -->
                        </div>
                      </div>

                      <div class="w-100 breakerLine my-2"></div>

                      <!-- Train Tags -->
                      <div class="wr-trainTags d-flex">

                        <div class="tarainTag">Express</div>

                        <div class="tarainTag d-flex align-items-center">
                          <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span>
                          Buffet
                        </div>

                      </div>

                    </div>


                    <!-- Item -->


                    <hr class="my-4">


                    <div class="pt-5">
                      <h6 class="mb-0"><a href="#!" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Go
                          Back</a></h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">items 1</h5>
                      <h5 class="total_price"></h5>
                    </div>

                    <h5 class="text-uppercase mb-3">Enter promtion code</h5>

                    <div class="mb-5">
                      <div class="form-outline">
                        <input type="text" id="promo-code" class="form-control form-control-lg" />
                        <button type="button" class="btn btn-dark btn-block btn-lg add-promo"
                          data-mdb-ripple-color="dark">Add</button>
                        {{-- <label class="form-label" for="form3Examplea2">Enter your code</label> --}}
                      </div>
                      <span class="text-danger promo-text"></span>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-2">
                      <h5 class="text-uppercase">Discount</h5>
                      <h5 class="discount">Rs. 00.00</h5>
                    </div>
                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                      <h5 class="total_price"></h5>
                    </div>
                    <form action="{{route('create-ticket')}}" method="post">
                      @csrf
                      <input type="hidden" id="total" name="total">
                      <input type="hidden" id="discount" name="discount">
                      <input type="hidden" id="seats" name="seats">
                      <input type="hidden" id="cls" name="cls" value={{$data['cls']}}>
                      <input type="hidden" name="id" value={{$data['schedule']['schedule_id']}}>
                      <input type="hidden" name="st_start" value={{$data['st_start']}}>
                      <input type="hidden" name="st_end" value="{{$data['st_end']}}">
                      <button type="submit" class="btn btn-dark btn-block btn-lg"
                        data-mdb-ripple-color="dark">Pay</button>
                    </form>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



</div>

@endsection

@section('page-scripts')
<script>
  var cprice = '<?php echo $seat_price ;?>';
    var promolist = <?php echo $promos;?>; 
    var psngr_promo_id = '<?php echo $passenger_promo_id ;?>';
    var psngr_promo_st = '<?php echo $passenger_promo_state ;?>';
    var psngr_promo_code = '<?php echo $passenger_promo_code ;?>';

    
</script>
<script src="{{asset('assets/js/page-script.js')}}"></script>
@endsection('page-scripts')