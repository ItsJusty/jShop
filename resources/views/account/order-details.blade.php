@extends('layouts.app')
@section('page', 'Bestelling details')
@section('content')

<div class="container mt-5">
  @include('flash::message')
  <h3 class="mb-5">Details van bestelling: {{ $order->number }}</h3>
  <p>Geplaatst op {{ date('d-m-Y', strtotime($order->created_at)) }}</p>
  <hr/>
  <div class="row">
    <div class="col-lg-2 col-md-3 col-sm-4 col-5">
      <i class="fa fa-car"></i> Vervoerder:
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1 col-1">
      PostNL
    </div>
  </div>
  <div class="row">
    <div class="col-lg-2 col-md-3 col-sm-4 col-5">
      <i class="fa fa-euro"></i> Verzendkosten:
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1 col-1">
      Gratis
    </div>
  </div>
  <div class="row">
    <div class="col-lg-2 col-md-3 col-sm-4 col-5">
      <i class="fa fa-file"></i> Factuur:
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1 col-1">
      <a href=""> Download</a>
    </div>
  </div>

  <hr/>
  <div class="row">
    <div class="col-lg-2 col-md-3 col-sm-4 col-5">
      <b>{{ $order->address_alias }}</b>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-2 col-md-3 col-sm-4 col-5">
      {{ $order->first_name }} {{ $order->last_name }}
    </div>
  </div>
  <div class="row">
    <div class="col-lg-2 col-md-3 col-sm-4 col-5">
      {{ $order->address_street }}
    </div>
  </div>
  <div class="row">
    <div class="col-lg-2 col-md-3 col-sm-4 col-5">
      {{ $order->postal_code }} {{ $order->city }}
    </div>
  </div>
  @if($order->phone_number)
  <div class="row">
    <div class="col-lg-2 col-md-3 col-sm-4 col-5">
      {{ $order->phone_number }}
    </div>
  </div>
  @endif

  <hr/>
  <div class="row align-items-center">
    <div class="col-lg-2 d-none d-lg-block">
      Afbeelding
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-4">
      Titel
    </div>
    <div class="col-lg-2 col-md-3 col-sm-2 col-3">
      Stukprijs
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-2">
      Aantal
    </div>
    <div class="col-lg-3 col-md-3 col-sm-2 col-3">
      Totaalprijs
    </div>
  </div>
  <hr/>

  @forelse($products as $product)
    <div class="row align-items-center">
      <div class="col-lg-2 d-none d-lg-block">
        <img src="{{ $product['product']->thumbnail }}" alt="Product image" height="100px" width="100px">
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-4">
        <a href="{{route('product-details', $product['product']->id)}}" style="color: rgba(0, 0, 0, 0.7)">{{ $product['product']->title }}</a>
      </div>
      <div class="col-lg-2 col-md-3 col-sm-2 col-3">
        {{ __('general.currency') }}{{ number_format($product['product']->price, 2) }}
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-2">
        {{ $product['amount'] }}
      </div>
      <div class="col-lg-3 col-md-3 col-sm-2 col-3">
        {{ __('general.currency') }}{{ number_format($product['product']->price * $product['amount'], 2) }}
      </div>
    </div>
    <hr/>
  @empty

  @endforelse

  <div class="row mb-3">
    <div class="col-lg-2 offset-lg-8 col-sm-4 col-8">
      Exclusief BTW
    </div>
    <div class="col-lg-2 col-sm-2 col-4">
      {{ __('general.currency') }}{{ number_format(($order->total_price / 1.21), 2) }}
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-2 offset-lg-8 col-sm-4 col-8">
      BTW 21%
    </div>
    <div class="col-lg-2 col-sm-2 col-4">
      {{ __('general.currency') }}{{ number_format( $order->total_price - ($order->total_price / 1.21) , 2) }}
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-2 offset-lg-8 col-sm-4 col-8">
      Inclusief BTW
    </div>
    <div class="col-lg-2 col-sm-2 col-4">
      {{ __('general.currency') }}{{ number_format($order->total_price, 2) }}
    </div>
  </div>

</div>

@endsection
