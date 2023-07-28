<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link rel="stylesheet" href="{{asset('css/payment.css')}}">

<form action="{{ route('cardpayment') }}" method="POST">
    @csrf   
    <div>
        <div class="container p-0">
            <div class="card px-4">
                <p class="h8 py-3">Payment Details </p>
                <div class="row gx-3">
                    <div class="col-12">
                        <input type="hidden" name="id" value="{{$data['ticket_id']}}">
                        <input type="hidden" name="total" value="{{$data['total']}}">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Person Name</p>
                            <input class="form-control mb-3" type="text" placeholder="Name" {{-- value="Barry Allen" --}}>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Card Number</p>
                            <input class="form-control mb-3" type="text" placeholder="1234 5678 435678">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Expiry</p>
                            <input class="form-control mb-3" type="text" placeholder="MM/YYYY">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">CVV/CVC</p>
                            <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <button type="submit" class="btn btn-primary mb-3 w-100">
                                <span class="ps-3">Pay Rs. {{number_format($data['total'],2)}}</span>
                                <span class="fas fa-arrow-right"></span>
                            </button>
                            <div class="col-12 mb-3">
                                
                                <div >
                                    <a href="{{ route('checkout') }}" class="btn btn-secondary w-100">
                                    <span class="ps-3">Back</span>
                                    <span class="fas fa-arrow-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>    