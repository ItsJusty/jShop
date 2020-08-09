@extends('layouts.osm')
@section('page', 'Nieuw product')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body pb-0">
          <h1>Nieuw product</h1>
          <p>Om ons assoritment wat vriendjes te geven</p>
          <p class="pt-3"><a href="{{ route('osm-store-products') }}">Terug naar productoverzicht</a></p>
        </div>
        <hr/ class="mt-0">
        {{ Form::open(array('action' => array('ProductController@newProduct'))) }}
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="title">Product naam*</label>
              <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" autofocus required>
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="description_short">Korte beschrijving*</label>
              <textarea class="form-control @error('description_short') is-invalid @enderror" type="text" name="description_short" rows="2" required></textarea>
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="description">Grote beschrijving*</label>
              <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description" rows="6" required></textarea>
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="ean13">EAN code*</label>
              <input class="form-control @error('ean13') is-invalid @enderror" type="text" name="ean13" required>
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="price">Prijs*</label>
              <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" required>
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="stock">Voorraad*</label>
              <input class="form-control @error('stock') is-invalid @enderror" type="text" name="stock" required>
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="intern_referention">Interne referentie</label>
              <input class="form-control @error('intern_referention') is-invalid @enderror" type="text" name="intern_referention">
            </div>
          </div>
        </div>
        <div class="pl-3 pb-4">
          <div class="row">
            <div class="col-lg-7 col-md-8 col-12">
              <label for="description">Label*</label>
              <select class="form-control" name="label">
                <option value="0">Geen label</option>
                @foreach ($labels as $label)
                  <option value="{{ $label->id }}">{{ $label->text }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-7 col-md-8 col-12 text-right">
               <button class="btn btn-geekr" type="submit" name="submit"><i class="far fa-plane"></i> Voeg product toe</button>
            </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

@endsection
