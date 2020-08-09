@extends('layouts.osm')
@section('page', 'Productaanpassingen')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body pb-0">
          <h1>Productaanpassingen</h1>
          <p>Voor de schoonheidsfoutjes en de product-visagie</p>
          <p class="pt-3"><a href="{{ route('osm-store-products') }}">Terug naar productoverzicht</a></p>
        </div>
        <hr/ class="mt-0">
        {{ Form::open(array('action' => array('ProductController@updateProduct', $product->id))) }}
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="title">Product naam</label>
              <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ $product->title }}" required>
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="description_short">Korte beschrijving</label>
              <textarea class="form-control @error('description_short') is-invalid @enderror" type="text" name="description_short" rows="2" required>{{ $product->description_short }}</textarea>
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="description">Grote beschrijving</label>
              <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description" rows="6" required>{{ $product->description }}</textarea>
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="ean13">EAN code</label>
              <input class="form-control @error('ean13') is-invalid @enderror" type="text" name="ean13" value="{{ $product->ean13 }}" required>
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="price">Prijs*</label>
              <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" value="{{ number_format($product->price, 2) }}" required>
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="stock">Voorraad*</label>
              <input class="form-control @error('stock') is-invalid @enderror" type="text" name="stock" value="{{ $product->stock }}" required>
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="intern_referention">Interne referentie</label>
              <input class="form-control @error('intern_referention') is-invalid @enderror" type="text" name="intern_referention" value="{{ $product->intern_referention }}" @if(!$product->intern_referention) placeholder="Geen" @endif>
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="description">Label</label>
              <select class="form-control" name="label" value="{{ $product->label_id }}">
                <option value="0">Geen label</option>
                @foreach ($labels as $label)
                  <option @if($product->label_id == $label->id) selected @endif value="{{ $label->id }}">{{ $label->text }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-7 col-md-8 col-12 text-right">
               <button class="btn btn-geekr" type="submit" name="submit"><i class="far fa-edit"></i> Pas product aan</button>
            </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

@endsection
