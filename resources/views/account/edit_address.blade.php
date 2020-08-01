@extends('layouts.app')
@section('page', 'Pas je adres aan ')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <h3 class="mb-4">{{__('user.edit_address')}}</h3>
  <p>Toch maar even de schoonheidsfoutjes oplossen</p>
  <hr/>
  {{ Form::open(array('action' => array('AddressController@editAddress', $address->id))) }}
  <div class="row">
    <div class="col-lg-7 col-md-8 col-12">
      <label for="alias">{{ __('user.alias') }}*</label>
      <input class="form-control @error('alias') is-invalid @enderror" type="text" name="alias" placeholder="{{ __('user.alias') }}" value="{{ $address->alias }}" autofocus required>
    </div>
  </div>
  <br/>
  <div class="row">
    <div class="col-lg-7 col-md-8 col-12">
      <label for="company_name">{{ __('user.company_name') }}</label>
      <input class="form-control @error('company_name') is-invalid @enderror" type="text" name="company_name" value="{{ $address->company_name }}">
    </div>
  </div>
  <br/>
  <div class="row">
      <div class="col-lg-3 col-md-4 col-6">
          <label for="first_name">{{__('user.first_name')}}*</label>
          <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ $address->first_name }}" required>
      </div>
      <div class="col-lg-4 col-md-4 col-6">
          <label for="last_name">{{__('user.last_name')}}*</label>
          <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ $address->last_name }}" required>
      </div>
  </div>
  <br/>
  <div class="row">
      <div class="col-lg-4 col-md-5 col-7">
          <label for="address">{{__('user.street_and_house_number')}}*</label>
          <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" value="{{ $address->address }}" required>
      </div>
      <div class="col-lg-3 col-md-3 col-5">
          <label for="phone_number">{{__('user.telephone')}}</label>
          <input class="form-control @error('phone_number') is-invalid @enderror" type="phone_number" name="phone_number" value="{{ $address->phone_number }}" >
      </div>
  </div>
  <br/>
  <div class="row">
      <div class="col-lg-2 col-md-3 col-6">
          <label for="postal_code">{{__('user.postal_code')}}*</label>
          <input class="form-control @error('postal_code') is-invalid @enderror" type="text" name="postal_code" value="{{ $address->postal_code }}" required>
      </div>
      <div class="col-md-5 col-6">
          <label for="city">{{__('user.city')}}*</label>
          <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" value="{{ $address->city }}" required>
      </div>
  </div>
  <br/>
   <input type="hidden" id="id" name="id" value="{{ $address->id }}">
  <div class="row">
      <div class="col-lg-7 col-md-8 col-12 text-right">
         <button class="btn btn-nw" type="submit" name="submit"><i class="far fa-edit"></i> {{__('user.edit_address')}}</button>
      </div>
  </div>
  {{ Form::close() }}
</div>

@endsection
