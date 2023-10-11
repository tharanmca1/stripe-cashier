@extends('layouts.app') <!-- You might have a different layout -->

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-4 ms-3">
        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Product Payment</li>
    </ol>
  </nav>
<div class="container-xl">
    
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>Payment Success</p>
        </div>
    @endif
    <div class="row mt-4">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="card">
                <img src="{{ $product->image }}" class="card-img-top " alt="{{ $product->name }}">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h5>{{$product->name}}</h5>            
            <p class="mt-2">Description: <br>{{$product->description}}</p>            
            <p>Price : $ {{$product->price}}</p>          
            <form action="{{route('processPayment', [$product, $price])}}" method="POST" id="subscribe-form">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="subscription-option">
                                <label for="plan-silver">
                                    <span class="plan-price" style="display: none;">${{$price}}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="card-holder-name">Card Holder Name</label>
                    <input id="card-holder-name" class="form-control" type="text" value="{{$user->name}}" disabled>    
                </div>
                @csrf
                <div class="form-row">
                    <label for="card-element">Credit or debit card</label>
                    <div id="card-element" class="form-control">   </div>
                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>
                <div class="stripe-errors"></div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                <div class="form-group text-center">
                    <button type="button"  id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-sm btn-success btn-block mt-2">Pay Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
            }
        };
        var card = elements.create('card', {hidePostalCode: true, style: style});
        card.mount('#card-element');
        console.log(document.getElementById('card-element'));
        card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;    cardButton.addEventListener('click', async (e) => {
        console.log("attempting");
        const { setupIntent, error } = await stripe.confirmCardSetup(
        clientSecret, {
            payment_method: {
                card: card,
                billing_details: { name: cardHolderName.value }
            }
        });        
        if (error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        }
        else {
            paymentMethodHandler(setupIntent.payment_method);
        }
    });
    function paymentMethodHandler(payment_method) {
        var form = document.getElementById('subscribe-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', payment_method);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
@endsection