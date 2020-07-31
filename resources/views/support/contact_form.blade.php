@extends('layouts.app')
@section('page', 'Klantenservice Neem contact met ons op')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body">
          <h1>Neem contact met ons op</h1>
          <p>Voor alles wat je niet kan vinden, of gewoon te lui bent om te zoeken.</p>
          <hr>
          {{ Form::open(array('action' => 'Support\ContactController@submitForm')) }}
            <div class="form-group row pb-2">
              <label for="first_name" class="pt-2 col-12">Naam*</label>
              <div class="col-lg-8 col-12">
                <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" id="first_name" required autocomplete="first_name" autofocus>
                @error('first_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row pb-2">
              <label for="email" class="col-12">Email*</label>
              <div class="col-lg-8 col-12">
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" required autocomplete="email">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row pb-2">
              <label for="subject" class="col-12">Waarover gaat je vraag?*</label>
              <div class="col-lg-8 col-12">
                <select class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" required autocomplete="subject">
                  <option value="0" disabled>Selecteer een optie</option>
                  <option value="Bestelling of assortiment">Bestelling of assortiment</option>
                  <option value="Zakelijk">Zakelijk</option>
                  <option value="Klacht of feedback">Klacht of feedback</option>
                  <option value="Klantenservice">Klantenservice</option>
                  <option value="Overig">Overig</option>
                </select>
                @error('subject')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row pb-2">
              <label for="message" class="col-12">Je bericht*</label>
              <div class="col-lg-8 col-12">
                <textarea name="message" id="message" class="form-control" rows="5"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-8 col-12">
                <button style="width: 100%;" class="btn btn-geekr" type="submit" name="submit"><i class="fa fa-plane"></i> Verstuur</button>
              </div>
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
