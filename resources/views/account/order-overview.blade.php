@extends('layouts.app')
@section('page', 'Mijn bestellingen')

@section('content')

<div class="container mt-5">
  @include('flash::message')
  <h3 class="mb-5">Mijn bestellingen</h3>

  <div class="row">
    <div class="col-lg-1">
      <p>Referentie</p>
    </div>
    <div class="col-lg-2">
      <p>Datum</p>
    </div>
    <div class="col-lg-2">
      <p>Aantal producten</p>
    </div>
    <div class="col-lg-1">
      <p>Totaalprijs</p>
    </div>
    <div class="col-lg-2 offset-lg-1">
      <p>Status</p>
    </div>
  </div>
  <hr/>

  @forelse($user->orders->reverse() as $order)
    <div class="row">
      <div class="col-lg-1 text-uppercase">
        {{ $order->number }}
      </div>
      <div class="col-lg-2">
        {{ date('d F Y', strtotime($order->created_at)) }}
      </div>
      <div class="col-lg-2">
        @if(sizeof($order->products) == 1)
          1 product
        @else
          {{ sizeof($order->products) }} producten
        @endif
      </div>
      <div class="col-lg-1">
        {{ __('general.currency') }}{{ number_format($order->total_price, 2) }}
      </div>
      <div class="col-lg-2 offset-lg-1">
        @if($order->is_paid)
          <p class="label label-green">Betaald</p>
        @else
          <p class="label label-orange">In Afwachting</p>
        @endif
      </div>
      <div class="col-lg-2 offset-lg-1">
        <a href="{{ route('order-details', $order->id) }}">Details</a>
      </div>
    </div>

    <hr/>
  @empty
  <p>Je hebt nog geen bestellingen geplaatst</p>
@endforelse
</div>

@endsection
