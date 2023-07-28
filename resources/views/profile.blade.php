@extends('passenger_layout')
@php
$page_name = "Profile"
@endphp
@section('passengercontent')


<div class="inner-page">

    <div class="container">
    <div class="row">
      <!-- Start : Vertical Tabber -->
      <div class="tab col-3">
        <button class="tablinks d-flex align-items-center " onclick="openContent(event, 'activeTicket')"
          id="defaultOpen">
          <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M4.14645 5.14645C4.05268 5.24021 4 5.36739 4 5.5C4 5.63261 4.05268 5.75979 4.14645 5.85355C4.24021 5.94732 4.36739 6 4.5 6H11.5C11.6326 6 11.7598 5.94732 11.8536 5.85355C11.9473 5.75979 12 5.63261 12 5.5C12 5.36739 11.9473 5.24021 11.8536 5.14645C11.7598 5.05268 11.6326 5 11.5 5H4.5C4.36739 5 4.24021 5.05268 4.14645 5.14645Z" />
            <path
              d="M4.14645 10.1464C4.05268 10.2402 4 10.3674 4 10.5C4 10.6326 4.05268 10.7598 4.14645 10.8536C4.24021 10.9473 4.36739 11 4.5 11H11.5C11.6326 11 11.7598 10.9473 11.8536 10.8536C11.9473 10.7598 12 10.6326 12 10.5C12 10.3674 11.9473 10.2402 11.8536 10.1464C11.7598 10.0527 11.6326 10 11.5 10H4.5C4.36739 10 4.24021 10.0527 4.14645 10.1464Z" />
            <path
              d="M4.29289 7.29289C4.48043 7.10536 4.73478 7 5 7H11C11.2652 7 11.5196 7.10536 11.7071 7.29289C11.8946 7.48043 12 7.73478 12 8C12 8.26522 11.8946 8.51957 11.7071 8.70711C11.5196 8.89464 11.2652 9 11 9H5C4.73478 9 4.48043 8.89464 4.29289 8.70711C4.10536 8.51957 4 8.26522 4 8C4 7.73478 4.10536 7.48043 4.29289 7.29289Z" />
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M0.43934 3.43934C0.158035 3.72064 0 4.10218 0 4.5V6C0 6.13261 0.0526784 6.25979 0.146447 6.35355C0.240215 6.44732 0.367392 6.5 0.5 6.5C0.897825 6.5 1.27936 6.65804 1.56066 6.93934C1.84196 7.22064 2 7.60218 2 8C2 8.39782 1.84196 8.77936 1.56066 9.06066C1.27936 9.34196 0.897825 9.5 0.5 9.5C0.367392 9.5 0.240215 9.55268 0.146447 9.64645C0.0526784 9.74021 0 9.86739 0 10V11.5C0 11.8978 0.158035 12.2794 0.43934 12.5607C0.720644 12.842 1.10218 13 1.5 13H14.5C14.8978 13 15.2794 12.842 15.5607 12.5607C15.842 12.2794 16 11.8978 16 11.5V10C16 9.86739 15.9473 9.74021 15.8536 9.64645C15.7598 9.55268 15.6326 9.5 15.5 9.5C15.1022 9.5 14.7206 9.34196 14.4393 9.06066C14.158 8.77936 14 8.39782 14 8C14 7.60218 14.158 7.22064 14.4393 6.93934C14.7206 6.65804 15.1022 6.5 15.5 6.5C15.6326 6.5 15.7598 6.44732 15.8536 6.35355C15.9473 6.25979 16 6.13261 16 6V4.5C16 4.10218 15.842 3.72064 15.5607 3.43934C15.2794 3.15804 14.8978 3 14.5 3H1.5C1.10218 3 0.720644 3.15804 0.43934 3.43934ZM1.14645 4.14645C1.24021 4.05268 1.36739 4 1.5 4H14.5C14.6326 4 14.7598 4.05268 14.8536 4.14645C14.9473 4.24021 15 4.36739 15 4.5V5.55C14.4349 5.66476 13.9268 5.97136 13.5618 6.41787C13.1969 6.86438 12.9975 7.42332 12.9975 8C12.9975 8.57668 13.1969 9.13562 13.5618 9.58213C13.9268 10.0286 14.4349 10.3352 15 10.45V11.5C15 11.6326 14.9473 11.7598 14.8536 11.8536C14.7598 11.9473 14.6326 12 14.5 12H1.5C1.36739 12 1.24021 11.9473 1.14645 11.8536C1.05268 11.7598 1 11.6326 1 11.5V10.45C1.56514 10.3352 2.07324 10.0286 2.43819 9.58213C2.80314 9.13562 3.00251 8.57668 3.00251 8C3.00251 7.42332 2.80314 6.86438 2.43819 6.41787C2.07324 5.97136 1.56514 5.66476 1 5.55V4.5C1 4.36739 1.05268 4.24021 1.14645 4.14645Z" />
          </svg>
          <h5 class="mb-0 ms-3">Active Tickets</h5>
        </button>
        <button class="tablinks d-flex align-items-center" onclick="openContent(event, 'history')">
          <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_9_199412)">
              <path
                d="M8.515 1.019C8.34363 1.00635 8.17185 1.00001 8 1V2.81458e-07C8.19654 9.6109e-05 8.39301 0.00743442 8.589 0.0220003L8.515 1.019ZM10.519 1.469C10.1985 1.3453 9.86923 1.24537 9.534 1.17L9.753 0.194C10.136 0.28 10.513 0.394 10.879 0.536L10.519 1.469ZM11.889 2.179C11.746 2.08365 11.5996 1.99359 11.45 1.909L11.943 1.039C12.2849 1.23274 12.6121 1.45132 12.922 1.693L12.307 2.482C12.1714 2.37623 12.032 2.2755 11.889 2.18V2.179ZM13.723 3.969C13.5252 3.68798 13.3069 3.42192 13.07 3.173L13.794 2.483C14.064 2.768 14.314 3.073 14.541 3.393L13.723 3.969ZM14.467 5.321C14.4014 5.16246 14.33 5.00636 14.253 4.853L15.146 4.403C15.3226 4.75409 15.473 5.11774 15.596 5.491L14.646 5.804C14.5923 5.64087 14.5326 5.47976 14.467 5.321ZM14.997 7.828C14.9889 7.48434 14.9555 7.14174 14.897 6.803L15.882 6.633C15.949 7.019 15.988 7.411 15.998 7.803L14.998 7.828H14.997ZM14.866 9.366C14.899 9.196 14.926 9.027 14.947 8.856L15.94 8.979C15.892 9.36915 15.8151 9.75521 15.71 10.134L14.746 9.867C14.792 9.702 14.832 9.535 14.866 9.366ZM13.914 11.745C14.098 11.455 14.26 11.151 14.4 10.837L15.314 11.242C15.154 11.602 14.969 11.948 14.759 12.28L13.914 11.745ZM12.95 12.95C13.072 12.828 13.189 12.702 13.3 12.572L14.058 13.225C13.9296 13.3738 13.7959 13.5179 13.657 13.657L12.95 12.95Z" />
              <path
                d="M8 1C6.84888 1.00008 5.71555 1.28405 4.70038 1.82674C3.68521 2.36943 2.81955 3.1541 2.18006 4.11125C1.54057 5.0684 1.147 6.16848 1.0342 7.31406C0.921398 8.45964 1.09285 9.61536 1.53338 10.6789C1.97391 11.7423 2.6699 12.6808 3.55973 13.4111C4.44955 14.1413 5.50574 14.6409 6.63474 14.8655C7.76374 15.0901 8.9307 15.0328 10.0323 14.6987C11.1338 14.3645 12.136 13.7639 12.95 12.95L13.657 13.657C12.7267 14.5878 11.5813 15.2747 10.322 15.657C9.06283 16.0393 7.72877 16.105 6.43807 15.8485C5.14736 15.5919 3.93986 15.021 2.92255 14.1862C1.90524 13.3515 1.10954 12.2787 0.605938 11.0629C0.102337 9.84711 -0.0936103 8.52588 0.0354575 7.21627C0.164525 5.90666 0.614623 4.6491 1.34587 3.55502C2.07712 2.46094 3.06694 1.56411 4.22763 0.944003C5.38832 0.323895 6.68405 -0.000348732 8 2.81458e-07V1Z" />
              <path
                d="M7.5 3C7.63261 3 7.75979 3.05268 7.85356 3.14645C7.94733 3.24022 8 3.36739 8 3.5V8.71L11.248 10.566C11.3598 10.6334 11.4408 10.7419 11.4736 10.8683C11.5065 10.9946 11.4886 11.1288 11.4239 11.2422C11.3591 11.3556 11.2525 11.4391 11.127 11.4749C11.0014 11.5108 10.8669 11.4961 10.752 11.434L7.252 9.434C7.17548 9.39029 7.11186 9.32712 7.06761 9.25091C7.02336 9.17469 7.00003 9.08813 7 9V3.5C7 3.36739 7.05268 3.24022 7.14645 3.14645C7.24022 3.05268 7.3674 3 7.5 3Z" />
            </g>
            <defs>
              <clipPath id="clip0_9_199412">
                <rect width="16" height="16" fill="white" />
              </clipPath>
            </defs>
          </svg>
          <h5 class="mb-0 ms-3">History</h5>
        </button>
        <button class="tablinks d-flex align-items-center" onclick="openContent(event, 'personalInfo')">
          <svg width="24" height="24" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M8 8C8.79565 8 9.55871 7.68393 10.1213 7.12132C10.6839 6.55871 11 5.79565 11 5C11 4.20435 10.6839 3.44129 10.1213 2.87868C9.55871 2.31607 8.79565 2 8 2C7.20435 2 6.44129 2.31607 5.87868 2.87868C5.31607 3.44129 5 4.20435 5 5C5 5.79565 5.31607 6.55871 5.87868 7.12132C6.44129 7.68393 7.20435 8 8 8ZM10 5C10 5.53043 9.78929 6.03914 9.41421 6.41421C9.03914 6.78929 8.53043 7 8 7C7.46957 7 6.96086 6.78929 6.58579 6.41421C6.21071 6.03914 6 5.53043 6 5C6 4.46957 6.21071 3.96086 6.58579 3.58579C6.96086 3.21071 7.46957 3 8 3C8.53043 3 9.03914 3.21071 9.41421 3.58579C9.78929 3.96086 10 4.46957 10 5ZM14 13C14 14 13 14 13 14H3C3 14 2 14 2 13C2 12 3 9 8 9C13 9 14 12 14 13ZM13 12.996C12.999 12.75 12.846 12.01 12.168 11.332C11.516 10.68 10.289 10 8 10C5.71 10 4.484 10.68 3.832 11.332C3.154 12.01 3.002 12.75 3 12.996H13Z" />
          </svg>
          <h5 class="mb-0 ms-3">Personal Information</h5>
        </button>
        
        @foreach($promos as $p)
        @if($p->promo_id==$Passenger->promo_id && $Passenger->promo_used==0)
        <div class="card text-center mt-3 border-primary">
          <div class="card-body">
            
            <h5 class="card-title">Promotional Coupen</h5>
            <h5 class="card-title fw-bold">{{$p->promo_value}}%</h5>
            <small class="card-text">{{$p->promo_text}}</small>
            <p class="fw-bold text-success" id="promo_code">{{$Passenger->promo_code}}</p>
           
            <a class="btn btn-secondary copy-to-clipboard"><i class="fa fa-copy"></i> Copy Code</a>
          </div>
        </div>
        @endif
      @endforeach
      </div>

      

      <div class="col-9 wr_tabcontent">
        <div id="activeTicket" class="tabcontent">
          <h2 class="titleTabContent">Active Tickets</h2>
          <div class="wr_content">


            @foreach ($item as $item)


            <!-- Item -->


            <div class="card-searchResult">

              <div class="d-md-flex justify-content-between px-md-3">

                <div class="d-md-flex align-items-md-center mb-2">
                  <div class="train-icon me-3 mt-1 my-md-0 mb-1"><img src="{{asset('assets/img/train-icon.png')}}" />
                  </div>
                  <div class="">
                    <!-- Train No. and Name -->
                    <div class="trainName text-primary-emphasis">Ticket ID #{{$item->tc_number}}
                      <b>{{$item->train_name}}</b>&nbsp;&nbsp;&nbsp;
                     
                        <?php 
                                            
                          if(is_null($item->delay)){
                            $delay = $item->delay;
                                  $hrs='';
                                  $mns='';

                          }else{
                            $delay = $item->delay;

                              $pieces = explode(":", $delay);
                              $hrs = $pieces[0]==0?'':($pieces[0]==1?$pieces[0].' hr & ' :$pieces[0].' hrs & ' );
                              $mns = $pieces[1]==0?'0 mins delay':($pieces[1]==1?$pieces[1].' min delay' :$pieces[1].' mins delay' );
                          }

                               

                        ?>
                      <span class="badge bg-danger">{{$hrs.$mns}}</span>
                    </div>

                  </div>
                </div>

                <!-- Ticket Price -->
                <div class="ticketPrice fw-bold mb-2 mb-md-0 d-inline-block">LKR {{$item->amount}}</div>
              </div>


              <div class="destinationDeparture d-md-flex justify-content-between px-md-3">
                <div class="wr-departure fw-semibold">
                  <!-- Departure Station -->
                  <div class="departureStation text-dark">
                    @foreach($stations as $st)
        
                    {{$item->start_station==$st->st_no?$st->st_name:''}}
                    @endforeach
                  </div>
                  <!-- Departure Time -->
                  <div class="departureTime">
                    <?php
                      foreach(explode(",",$item->stations) as $key=>$st){
                        if($item->start_station==$st){
                          $time = 20.00 * $key*60;
                          $cal_time = strtotime($item->start_time)+$time;
                          print(date("h:i a",$cal_time));
                        }
                      }
                    ?>
                  </div>
                </div>
                <div class="wr-destination fw-semibold text-md-end mt-1 mt-md-0">
                  <!-- Destination Station -->
                  <div class="destinationStation text-dark">
                    @foreach($stations as $st)
                    {{$item->end_station==$st->st_no?$st->st_name:''}}
                    @endforeach
                  </div>
                  <!-- Destination Time -->
                  <div class="destinationTime">
                  <?php
                      foreach(explode(",",$item->stations) as $key=>$st){
                        if($item->end_station==$st && count(explode(",",$item->stations))-1!=$key){
                          $time = 20.00 * $key*60;
                          $cal_time = strtotime($item->end_time)+$time;
                          print(date("h:i a",$cal_time));
                        }
                        if($item->end_station==$st && count(explode(",",$item->stations))-1==$key){
                          print(date("h:i a",strtotime($item->end_time)));
                        }
                      }
                    ?>
                  </div>
                </div>
              </div>

              <div class="w-100 breakerLine my-2"></div>

              <!-- Train Tags -->
              <div class="wr-trainTags d-flex">

                <div class="tarainTag">Express</div>

                <div class="tarainTag d-flex align-items-center">
                  <span class="trainTagIcon pe-1"><img src="{{asset('assets/img/lunch-1.png')}}" /></span> Buffet
                </div>

                <div class="tarainTag text-right text-primary fw-bold">
                  <i class="fa fa-subway" aria-hidden="true">  ...</i>
   <i class="fa fa-map-marker" ></i> {{$item->track_station_text}}</div>

              </div>

            </div>


            <!-- Item -->

            @endforeach

          </div>
        </div>

        <div id="history" class="tabcontent">
          <h2 class="titleTabContent">History</h2>
          <div class="wr_content">

            <!--History tabale -->

            <div class="container-fluid">
              <table class="table table-hover ">
                <thead>
                  <tr>
                    <th>Ticket ID</th>
                    <th>Train Name</th>
                    <th>Departure</th>
                    <th>Departure Time</th>
                    <th>Destination</th>
                    <th>Destination Time</th>
                    <th>Seat Class</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($history as $history)

                  <tr>

                    <td>#{{$history->tc_number}}</td>
                    <td>{{$history->train_name}}</td>
                    <td>{{$history->start_station}}</td>
                    <td>{{$history->start_time}}</td>
                    <td>{{$history->end_station}}</td>
                    <td>{{$history->end_time}}</td>
                    <td>{{$history->seat_cat}}</td>
                    {{-- <td><a href="{{ " edit_history_user/".$history['user_id'] }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td><a href="{{ " delete_history/".$history['user_id'] }}" class="btn btn-danger">Delete</a></td>
                    --}}
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>


            <!--History tabale -->



          </div>
        </div>

        <div id="personalInfo" class="tabcontent">
          <h2 class="titleTabContent">Personal Information</h2>
          <div class="wr_content">

            <!--Passenger info form -->


            <form action="{{ route('Passenger_submit') }}" method="POST">

              @csrf

              <!---->
              <div class="container wr-signUp py-5">
                <!--  new use success  & fail message -->
                @if (Session::has('success'))

                <div class="alert alert-success">{{Session::get('success')}} </div>

                @endif

                @if (Session::has('fail'))
                <div class="alert alert-danegr">{{Session::get('fail')}} </div>
                @endif
                <!--  new use success  & fail message -->

                <input type="text" class="form-control" id="signUpFirst" name="passenger_id"
                  value="{{Session('passenger_id')}}" hidden>

                <div class="row mt-4 mb-3">
                  <div class="col-12 col-sm mb-3 mb-sm-0">
                    <label for="firstName" class="form-label">First name </label>
                    <input type="text" class="form-control" id="signUpFirst" name="firstName"
                      value="{{$Passenger->first_name}}">
                    <span class="text-danger">@error('firstName') {{ $message }} @enderror</span>
                  </div>
                  <div class="col-12 col-sm">
                    <label for="LastName" class="form-label">Last Name </label>
                    <input type="text" class="form-control" id="signUpLast" name="LastName"
                      value="{{$Passenger->last_name}}">
                    <span class="text-danger">@error('LastName') {{$message }}@enderror</span>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-12 col-sm mb-3 mb-sm-0">
                    <label for="signUpEmail" class="form-label">Email </label>
                    <input type="email" class="form-control" id="signUpEmail" name="email"
                      value="{{$Passenger->email}}">
                    <span class="text-danger">@error('email') {{$message }}@enderror</span>
                  </div>
                  <div class="col-12 col-sm">
                    <label for="tp_number" class="form-label">Telephone</label>
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1">+94</span>
                      <input type="text" id="signUpTel" class="form-control" name="tp_number" aria-label="Telephone"
                        aria-describedby="basic-addon1" value="{{$Passenger->tp_number}}">
                      <span class="text-danger">@error('tp_number') {{$message }}@enderror</span>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control w-100" name="address" id="signUpAddress"
                      value="{{$Passenger->address}}">
                    <span class="text-danger">@error('address') {{$message }}@enderror</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm mb-3 mb-sm-0">
                    <label for="signUpPass" class="form-label">Change Password </label>
                    <input type="password" class="form-control" id="signUpPass" placeholder="Change a Password"
                      name="InputPassword">
                    <span class="text-danger">@error('InputPassword') {{$message }}@enderror</span>
                  </div>
                  <div class="col-12 col-sm">
                    <label for="signUpPass2" class="form-label">Confirm Password </label>
                    <input type="password" class="form-control" id="signUpPass2" placeholder="Confirm the Password"
                      name="confirmInputPassword">
                    <span class="text-danger">@error('confirmInputPassword') {{$message }}@enderror</span>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col"><button type="submit" class="btn btn-primary w-100">Submit</button></div>
                </div>

              </div>
            </form>



            <!--Passenger info form -->



          </div>
        </div>

      </div>

      <!-- End : Vertical Tabber -->

    </div>
  </div>
</div>


@endsection

@section('page-scripts')
<script>
  $(document).ready(function () {
    $('.copy-to-clipboard').on('click', function () {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($("#promo_code").text()).select();
      document.execCommand("copy");
      $temp.remove();
    });
  });
</script>
@endsection('page-scripts')