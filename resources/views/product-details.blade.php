@extends('layouts.app')

@section('page', $product->title)

@section('content')
<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col-xl-4 col-lg-4 offset-lg-0 col-md-5 offset-md-0 col-sm-8 offset-sm-2">
      <div class="product-image shadow-lg">
        @if ($product->stock <= 5 && $product->stock > 0)
        <div class="label p-1" style="background-color: #FF0000">
          Bijna uitverkocht
        </div>
        @elseif ($product->stock <= 0)
        <div class="label p-1" style="background-color: #FF0000">
          Uitverkocht
        </div>
        @elseif ($product->label)
        <div class="label p-1" style="background-color: {{$product->label->color}}">
          <!-- nu in prijs verlaagd -->
          {{$product->label->text}}
        </div>
        @endif
        <div class="image-container">
          <img class="w-100" width="350px" height="350px" src="{{ $product->thumbnail }}" alt="Image">
          <!-- small remove image-zoom -->
          <div class="image-details"></div>
        </div>
      </div>
    </div>
    <div class="offset-lg-1 col-lg-4 offset-lg-0 col-md-6 offset-md-1 col-sm-8 offset-sm-2">
      <h3 class="mb-4 pt-4">{{ $product->title }}</h3>
      <p>Prijs: {{__('general.currency')}}{{number_format($product->price, 2)}}</p>
      <p>Inclusief {{ $product->tax->display }}% BTW</p>
      <p>{{ __('product.intern_referention') }}: @if($product->intern_referention) {{ $product->intern_referention }} @else {{ $product->id }} @endif</p>

      @if ($product->stock <= 5 && $product->stock >= 1)
        <div class="alert alert-warning">
          Let op! Er zijn nog {{$product->stock}} items op voorraad
        </div>
      @elseif ($product->stock <= 0)
        <div class="alert alert-danger">
          Dit product is tijdelijk uitverkocht.
        </div>
      @endif

      {{ Form::open(array('action' => 'CartController@addToCart')) }}
      <input type="number" name="order_amount" id="order_amount" min="1" value="1" width="100%"/>
      <input type="hidden" name="id" id="id" value="{{$product->id}}"><br/>
      <button class="btn btn-nw btn-sm mt-4" type="submit" name="submit">
        <i class="fas fa-plus"></i> {{__('product.add_to_cart')}}
      </button>
      {{ Form::close() }}

      <h5 class="pt-5 ">Artikelomschrijving</h5>
      <p>{{ $product->description }}</p>
    </div>
  </div>
  <hr/>
  <h3 class="mb-4 mt-5">Wat mensen ook bestellen</h3>
  <div class="row">
    @forelse(\App\Product::inRandomOrder()->where([['id', '!=', $product->id], ['stock', '>=', 1], ['is_active', '=', 1]])->take(4)->get() as $product)
    <div class="col-lg-3 col-md-4 col-sm-6 col-11 offset-lg-0 offset-md-0 offset-sm-0">
      <div class="card w-100 border-0 underline-hover shadow-lg" style="border-radius: 0rem">
        @if($product->label_id)
        <div class="label p-1" style="background-color: {{$product->label->color}}">
          {{ $product->label->text }}
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
            <h6 class="d-inline p-1 w-100 bd-highlight">{{__('general.currency')}}{{number_format($product->price, 2)}}</h6>
            {{ Form::open(array('action' => 'CartController@addToCart')) }}
            <input type="hidden" name="id" id="id" value="{{ $product->id }}">
            <button href="{{action('CartController@addToCart', $product->id)}}" class="btn btn-nw flex-shrink-1 bd-highlight">
              <i class="fas fa-cart-plus"></i>
            </button>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
      @empty
      <div class="col">
        <div class="text-center">
          Geen gerelateerde producten gevonden
        </div>
      </div>
    @endforelse
  </div>
</div>

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>

<script type="{{asset('js/plugins/jquery.zoom.js')}}"></script>

<script>
$(function() {
		$('.product-image').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');
		});
});

$('#imagemodal').on('click', function(e) {
  e.preventDefault()
  $('#imagemodal').modal('hide');
})
</script>
@endsection
