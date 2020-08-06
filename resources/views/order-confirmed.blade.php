@extends('layouts.app')

@section('page', __('cart.order_confirmed'))

@section('content')
<script src="https://cdn.jsdelivr.net/gh/mathusummut/confetti.js/confetti.min.js"></script><script>confetti.start()</script>
<div class="container mt-5 mb-5">
    @include('flash::message')
    <div class="row d-flex justify-content-center">
        <div class="col text-center">
            @if($paid == true)
                <div class="card shadow-lg">
                  <!-- <h1><i class="fa fa-check color-main"></i></h1> -->
                  <div class="card-body">
                    <h4>Hey {{ Auth::user()->first_name }},</h4>
                    <h1>{{__('cart.order_confirmed')}}</h1>
                    <p>{{__('cart.order_confirmed_sub')}}</p>
                    <a href="{{route('order-details', session('last_created_order_id'))}}" class="btn btn-nw">{{__('cart.show_order_details')}}</a>
                  </div>
                  <div class="yay" style="width: 100%;">
                    <img class="center pb-4" src="https://media.giphy.com/media/WsKVAem02Efuw/giphy.gif" height="250px" width="250px" alt="YAYYY">
                  </div>
                </div>
            @else
                <p>{{__('cart.order_status')}} <span class="geekr-color">{{__('cart.order_awaiting_payment')}}</span></p>
                <a class="btn btn-nw" href="{{ action("PaymentController@preparePayment") }}">{{__('cart.order_click_to_pay')}}</a>
            @endif

        </div>

    </div>
</div>
@endsection
