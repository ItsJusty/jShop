@extends('layouts.app')

@section('page', 'Voor al jouw drank in de nacht')
@section('content')
<div class="container mt-5">
  <div class="image text-center">
    <!-- <img class="w-100" src="http://localhost.dev:81/img/banner.png" alt="banner"> -->
  </div>
</div>
<div class="container mt-5">
  <div class="mb-4">
    <h3>Zoekresultaten voor: <b>{{ $query }}</b></h3>
  </div>
  <div class="row">
    @forelse($products as $product)
      <div class="col-lg-3 col-md-4 col-sm-6 col-10 offset-1 offset-lg-0 offset-md-0 offset-sm-0">
        <div class="card w-100 border-0 underline-hover shadow-lg" style="border-radius: 0rem">
          @if ($product->stock <= 5)
          <div class="label p-1" style="background-color: #FF0000">
            Bijna uitverkocht
          </div>
          @elseif ($product->label)
          <div class="label p-1" style="background-color: {{$product->label->color}}">
            <!-- nu in prijs verlaagd -->
            {{$product->label->text}}
          </div>
          @endif
          <a href="{{action('ProductController@loadProductDetails', $product->id)}}">
            <img style="height:250px" class="card-img-top" src="{{$product->thumbnail}}" alt="Card image cap">
          </a>
          <div class="card-body my-3 p-0 pl-3 pr-3">
            <a href="{{action('ProductController@loadProductDetails', $product->id)}}" class="text-dark">
              <h5 class="">{{$product->title}}</h5>
            </a>
            <hr>
            <div class="bd-highlight d-flex">
              <h6 class="p-1 w-100 bd-highlight">{{__('general.currency')}}{{number_format($product->price, 2)}}</h6>
              <button class="btn btn-main" href="{{ route('product-details', $product->id) }}" name="button">Bekijk</button>
              <!-- {{ Form::open(array('action' => 'CartController@addToCart')) }}
              <input type="hidden" name="id" id="id" value="{{$product->id}}">
              <button href="{{action('CartController@addToCart')}}" class="btn btn-main flex-shrink-1 bd-highlight">
                <i class="fas fa-cart-plus"></i>
              </button>
              {{ Form::close() }} -->
            </div>
          </div>
        </div>
      </div>

    @empty
      <div class="col-12">
        <p class="text-center">Geen producten gevonden met deze zoekopdracht</p>
      </div>
    @endforelse
  </div>
</div>

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="mb-4">
    <h3>Gevonden categorien</h3>
  </div>
  <div class="row">
    @forelse ($categories as $cat)
      <div class="col-lg-3 col-md-4 col-sm-6 col-10 offset-1 offset-lg-0 offset-md-0 offset-sm-0 mb-4">
        <div class="card w-100 h-100 border-0 underline-hover shadow-lg text-center pt-3" style="border-radius: 0rem">
          <a href="{{ route('category', $cat->id) }}">{{ $cat->name }}</a>
        </div>
      </div>
    @empty
      <div class="col-12">
        <p class="text-center">Geen categorien gevonden met deze zoekopdracht</p>
      </div>
    @endforelse
  </div>
</div>

<div class="container-fluid p-0">
  <div class="image w-100 text-center">
    <!-- <img class="w-100" src="http://localhost.dev:81/img/banner.png" alt="banner"> -->
  </div>
</div>

@endsection
