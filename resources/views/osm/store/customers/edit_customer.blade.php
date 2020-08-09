@extends('layouts.osm')
@section('page', 'Klantaanpassingen')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body pb-0">
          <h1>Klantaanpassingen - {{ $customer->id }}</h1>
          <p>Voor de mensen die te lui zijn om het zelf te doen</p>
          <p class="pt-3"><a href="{{ route('osm-store-customers') }}">Terug naar klantoverzicht</a></p>
        </div>
        <hr/ class="mt-0">
        {{ Form::open(array('action' => array('Osm\CustomerController@updateCustomer', $customer->id))) }}
        <div class="row pl-3 pb-4">
          <div class="col-lg-7 col-md-8 col-12">
            <label for="company_name">Bedrijfsnaam</label>
            <input class="form-control @error('company_name') is-invalid @enderror" type="text" name="company_name" value="{{ $customer->company_name }}">
          </div>
        </div>
        <div class="row pl-3 pb-4">
          <div class="col-lg-3 col-md-4 col-6">
            <label for="first_name">Voornaam*</label>
            <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ $customer->first_name }}" autofocus required>
          </div>
          <div class="col-lg-4 col-md-4 col-6">
            <label for="last_name">Achternaam*</label>
            <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ $customer->last_name }}" required>
          </div>
        </div>
        <div class="row pl-3 pb-4">
          <div class="col-lg-7 col-md-8 col-12">
            <label for="email">Email*</label>
            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $customer->email }}" required>
          </div>
        </div>
        <div class="row pl-3 pb-4">
          <div class="col-lg-7 col-md-8 col-12">
            <label for="intern_note">Interne notite</label>
            <textarea class="form-control @error('intern_note') is-invalid @enderror" type="text" name="intern_note" rows="6">{{ $customer->intern_note }}</textarea>
          </div>
        </div>
        <div class="row pl-3 pb-4">
          <div class="col-lg-7 col-md-8 col-12">
            <label for="receive_newsletter">Nieuwsbrief voorkeur</label>
            <select class="form-control @error('receive_newsletter') is-invalid @enderror" name="receive_newsletter">
              <option @if(!$customer->receive_newsletter) selected @endif value="0">Geen nieuwsbrief</option>
              <option @if($customer->receive_newsletter) selected @endif value="1">Wel een nieuwsbrief</option>
            </select>
          </div>
        </div>
        <div class="row pl-3 pb-4">
          <div class="col-lg-7 col-md-8 col-12">
            <label for="is_active">Account blokkade</label>
            <select class="form-control @error('is_active') is-invalid @enderror" name="is_active">
              <option @if($customer->is_active) selected @endif value="1">Geen blokkade</option>
              <option @if(!$customer->is_active) selected @endif value="0">Geblokkeerd</option>
            </select>
          </div>
        </div>
        <div class="row pl-3 pb-4">
          <div class="col-lg-7 col-md-8 col-12">
            <label for="created_at">Klant sinds</label>
            <input class="form-control @error('created_at') is-invalid @enderror" type="datetime" name="created_at" value="{{ date('d-m-Y', strtotime($customer->created_at)) }} om {{ date('H:i', strtotime($customer->created_at)) }}" disabled>
          </div>
        </div>
        <div class="row pl-3 pb-4">
          <div class="col-lg-7 col-md-8 col-12">
            <label for="updated_at">Laatste aanpassing</label>
            <input class="form-control @error('updated_at') is-invalid @enderror" type="datetime" name="updated_at" value="{{ date('d-m-Y', strtotime($customer->updated_at)) }} om {{ date('H:i', strtotime($customer->updated_at)) }}" disabled>
          </div>
        </div>
        <div class="row pl-3 pb-4">
          <div class="col-lg-7 col-md-8 col-12">
            <label for="gender">Gender</label>
            <select class="form-control @error('gender') is-invalid @enderror" name="gender">
              <option @if($customer->gender == "m") selected @endif value="m">{{__('user.male')}}</option>
              <option @if($customer->gender == "f") selected @endif value="f">{{__('user.female')}}</option>
              <option @if($customer->gender == "u") selected @endif value="u">{{__('user.ufo')}}</option>
              <option @if($customer->gender == "o") selected @endif value="o">{{__('user.other')}}</option>
            </select>
          </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-7 col-md-8 col-12 text-right">
               <button class="btn btn-geekr" type="submit" name="submit"><i class="far fa-edit"></i> Pas klant aan</button>
            </div>
        </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

@endsection
