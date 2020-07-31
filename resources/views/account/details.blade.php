@extends('layouts.app')
@section('page', 'Persoonlijke gegevens ')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <h3 class="mb-4">{{__('user.edit_details')}}</h3>
  <p>{{__('user.edit_details_sub')}}</p>
  <hr/>
  {{ Form::open(array('action' => 'UserController@editDetails')) }}
  <div class="row">
      <div class="col-lg-7 col-md-8 col-12">
          <label for="company_name">{{__('user.company_name')}}</label>
          <input class="form-control @error('company_name') is-invalid @enderror" type="text" name="company_name" value="{{ $user->company_name }}" >
      </div>
  </div>
  <br/>
  <div class="row">
      <div class="col-lg-3 col-md-4 col-6">
          <label for="first_name">{{__('user.first_name')}}*</label>
          <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ $user->first_name }}" >
      </div>
      <div class="col-lg-4 col-md-4 col-6">
          <label for="last_name">{{__('user.last_name')}}*</label>
          <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value="{{ $user->last_name }}">
      </div>
  </div>
  <br/>
  <div class="row">
      <div class="col-lg-7 col-md-8 col-12">
          <label for="email">{{__('user.email')}}*</label>
          <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ $user->email }}" >
      </div>
  </div>
  <br/>
  <div class="row">
      <div class="col-lg-7 col-md-8 col-12">
          <label for="gender">{{__('user.gender')}}</label>
          <select class="form-control" id="gender" name="gender">
            <option value="">Wil ik niet vertellen</option>
            <option @if($user->gender == "m") selected @endif value="m">{{__('user.male')}}</option>
            <option @if($user->gender == "f") selected @endif value="f">{{__('user.female')}}</option>
            <option @if($user->gender == "u") selected @endif value="u">{{__('user.ufo')}}</option>
            <option @if($user->gender == "o") selected @endif value="o">{{__('user.other')}}</option>
          </select>
      </div>
  </div>
  <br/>
  <div class="row">
      <div class="col-lg-7 col-md-8 col-12 text-right">
         <button class="btn btn-geekr" type="submit" name="submit"><i class="far fa-edit"></i> {{__('general.change')}}</button>
      </div>
  </div>
  {{ Form::close() }}
</div>

@endsection
