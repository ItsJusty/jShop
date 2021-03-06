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
          <!-- <button type="submit" class="btn btn-main" name="button"><i class="fas fa-sync-alt"></i></button> -->
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
        $totalLow = 0.00;
        $totalHigh = 0.00;
        $shipping = 2.50;

        foreach($cartProducts as $p) {
          if ($p['product']->tax->display == 9) {
            $totalLow += $p['product']->price * $p['amount'];
          } else {
            $totalHigh += $p['product']->price * $p['amount'];
          }
        }

        $total = $total + $totalLow + $totalHigh;

      @endphp

      <div class="row">
        <div class="col-lg-2 offset-lg-8 col-sm-4 offset-sm-6">
            Bezorgkosten
        </div>
        <div class="col-lg-2 col-sm-2">
          <p class="text-right">
            @if (($total) >= 25.00)
              Gratis
            @else
              {{ __('general.currency') }}{{ number_format( $shipping, 2) }}
              @php
                $total += $shipping;
                $totalHigh += $shipping;
              @endphp
            @endif
          </p>
        </div>
        <div class="col-lg-2 offset-lg-8 col-sm-4 offset-sm-6">
          Exclusief BTW
        </div>
        <div class="col-lg-2 col-sm-2">
          <p class="text-right">
            {{ __('general.currency') }}{{ number_format(($totalLow / 1.09)+($totalHigh / 1.21), 2) }}
          </p>
        </div>
        @if ($totalLow != 0.00)
        <div class="col-lg-2 offset-lg-8 col-sm-4 offset-sm-6">
            BTW 9%
        </div>
        <div class="col-lg-2 col-sm-2">
          <p class="text-right">
            {{ __('general.currency') }}{{ number_format( $totalLow - ($totalLow / 1.09) , 2) }}
          </p>
        </div>
        @endif
          @if ($totalHigh != 0.00)
            <div class="col-lg-2 offset-lg-8 col-sm-4 offset-sm-6">
              BTW 21%
            </div>

        <div class="col-lg-2 col-sm-2">
          <p class="text-right">
            {{ __('general.currency') }}{{ number_format( $totalHigh - ($totalHigh / 1.21) , 2) }}
          </p>
        </div>
        @endif
        <div class="col-lg-2 offset-lg-8 col-sm-4 offset-sm-6">
          Totaal inclusief BTW
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
              <p class="text-right"><a class="btn btn-main text-white" href="{{action('OrderController@loadOrder')}}">{{__('cart.place_order')}} <i class="fas fa-plane"></i></a></p>
          </div>
      </div>
  @endif
</div>

@endsection
