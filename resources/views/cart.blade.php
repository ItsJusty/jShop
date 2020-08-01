@extends('layouts.app')

@section('page', 'Winkelmandje')

@section('content')

<div class="container mt-5">
  @include('flash::message')
  <h3 class="mb-4">{{ __('cart.name') }}</h3>

  <!-- <div class="row align-items-center mt-4">
    Data
  </div> -->
  <hr/>
  @forelse($cartProducts as $cartProduct)
    <div class="row align-items-center mt-4" style="height: 100px;">
      <div class="col-lg-2 align-items-center d-none d-lg-block">
        <img src="{{$cartProduct['product']->thumbnail}}" width="100px" height="100px" alt="product image"/>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-5 col-12 align-items-center">
        <p class="ml-3"><a href="{{route('product-details', $cartProduct['product']->id)}}" style="color: rgba(0, 0, 0, 0.7)">{{ $cartProduct['product']->title }}</a></p>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 col-5 align-items-center">
        {{ Form::open(array('action' => 'CartController@amountChange')) }}
          <input type="hidden" name="id" value="{{$cartProduct['product']->id}}" />
          <input style="max-width: 64px;" type="number" name="amount" class="form-contol form-control-sm" id="{{'aantal' . $cartProduct['product']->id}}" aria-describedby="quantity" placeholder="Aantal" value="{{$cartProduct['amount']}}" />
          <!-- <button type="submit" class="btn btn-nw" name="button"><i class="fas fa-sync-alt"></i></button> -->
        {{ Form::close() }}
      </div>
      <div class="col-lg-2 align-items-center d-none d-lg-block">
        <p>{{ $cartProduct['amount'] }} x {{ __('general.currency') }}{{ number_format($cartProduct['product']->price, 2) }}</p>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 col-3 align-items-center">
        <p>{{ __('general.currency') }}{{ number_format($cartProduct['amount'] * $cartProduct['product']->price, 2) }}</p>
      </div>
      <div class="col-lg-1 col-md-2 col-sm-2 col-xs-1 col-4 align-items-center">
        <p class="text-right">
          <a class="text-danger" href="{{ action('CartController@removeFromCart', $cartProduct['product']->id) }}">
            <i class="fas fa-times"></i>
          </a>
        </p>
      </div>
    </div>
    <hr/>
  @empty
    <div class="row">
      <div class="col-12">
        <p class="text-center mt-3">{{ __('cart.empty') }}</p>
      </div>
    </div>
  @endforelse


  @if($cartProducts)
      @php
        $total = 0.00;
        foreach($cartProducts as $p) {
          $total += $p['product']->price * $p['amount'];
        }
      @endphp
      <div class="row">
        <div class="col-lg-2 offset-lg-8 col-sm-4 offset-sm-6">
          Exclusief BTW
        </div>
        <div class="col-lg-2 col-sm-2">
          <p class="text-right">
            {{ __('general.currency') }}{{ number_format(($total / 1.21), 2) }}
          </p>
        </div>
        <div class="col-lg-2 offset-lg-8 col-sm-4 offset-sm-6">
          BTW 21%
        </div>
        <div class="col-lg-2 col-sm-2">
          <p class="text-right">
            {{ __('general.currency') }}{{ number_format( $total - ($total / 1.21) , 2) }}
          </p>
        </div>
        <div class="col-lg-2 offset-lg-8 col-sm-4 offset-sm-6">
          Inclusief BTW
        </div>
        <div class="col-lg-2 col-sm-2">
          <p class="text-right">
            {{ __('general.currency') }}{{ number_format($total, 2) }}
          </p>
        </div>
      </div>

      <div class="row align-items-center mt-4" style="height:100px">
          <div class="col-lg-2 align-items-center">
              {{--            <img src="{{$cartProduct['product']->image}}" width="100px" height="100px"/>--}}
          </div>
          <div class="col-lg-1 align-items-center">
              {{--            <input style="margin-top: -15px" type="number" class="form-control form-control-sm" id="{{'quantity' . $cartProduct['product']->id}}" aria-describedby="quantityBox" placeholder="Quantity" value="{{$cartProduct['amount']}}">--}}
          </div>
          <div class="col-lg-1 align-items-center">
              {{--            <p>{{$cartProduct['amount']}} x {{ __('general.currency') }}{{$cartProduct['product']->price}}</p>--}}
          </div>
          <div class="col-lg-3 offset-lg-5 align-items-center">
              <p class="text-right"><a class="btn btn-nw text-white" href="{{action('OrderController@loadOrder')}}">{{__('cart.place_order')}} <i class="fas fa-plane"></i></a></p>
          </div>
      </div>
  @endif
</div>

@endsection
