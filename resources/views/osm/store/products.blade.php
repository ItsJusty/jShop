@extends('layouts.osm')
@section('page', 'Productbeheer')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body pb-0">
          <h1>Productbeheer</h1>
          <p>Voor alle spulletjes en prijsjes</p>
          <p class="pt-3"><a href="{{ route('osm-add-product') }}">Voeg een product toe</a></p>
        </div>
        <hr/ class="mt-0">
        <div class="support-items p-4">
          <div class="row">
            <div class="col-lg-1 d-none d-lg-block">
              Foto
            </div>
            <div class="col-lg-1 d-none d-lg-block">
              ID
            </div>
            <div class="col-lg-3 col-4">
              Naam
            </div>
            <div class="col-lg-3 d-none d-lg-block">
              Verkoopprijs (incl. btw)
            </div>
            <div class="col-lg-2 d-none d-lg-block">
              Voorraad
            </div>
            <div class="col-lg-1 col-4">
              Status
            </div>
            <div class="col-lg-1 col-4">
              Actie
            </div>
          </div>
          @foreach($products as $product)
            <div class="row">
              <div class="col-lg-1 p-0 d-none d-lg-block">
                <img src="{{$product->thumbnail}}" width="50px" height="50px" alt="product image"/>
              </div>
              <div class="col-lg-1 d-none d-lg-block pt-3">
                {{ $product->id }}
              </div>
              <div class="col-lg-3 col-4 pt-3">
                <a href="{{ route('product-details', $product->id) }}" target="_blank">{{ $product->title }}</a>
              </div>
              <div class="col-lg-3 d-none d-lg-block pt-3">
                {{ __('general.currency') }} {{ number_format($product->price, 2) }}
              </div>
              <div class="col-lg-2 d-none d-lg-block pt-3">
                <span class="@if($product->stock <= 0) text-red @elseif($product->stock >= 0 && $product->stock <= 15) text-orange @else text-green @endif">{{ $product->stock }}<span>
              </div>
              <div class="col-lg-1 col-4 pt-3">
                {{ Form::open(array('action' => 'ProductController@toggleStatus')) }}
                <input type="hidden" name="id" id="id" value="{{$product->id}}">
                @if($product->is_active)
                <button class="btn btn-link flex-shrink-1 bd-highlight">
                  <i class="fa fa-check" style="color: #38c172;"></i>
                </button>
                @else
                <button class="btn btn-link flex-shrink-1 bd-highlight">
                  <i class="fa fa-times" style="color: #FF0000"></i>
                </button>
                @endif
                {{ Form::close() }}
              </div>
              <div class="col-lg-1 col-4 pt-3">
                <a href="{{ route('osm-edit-product', $product->id) }}"><i class="fa fa-edit"></i></a>
              </div>
            </div>
            <hr/>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
