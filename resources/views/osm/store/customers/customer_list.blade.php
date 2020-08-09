@extends('layouts.osm')
@section('page', 'Klantbeheer')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body">
          <h1>Klantbeheer</h1>
          <p>Voor alle koopjesjagers</p>
        </div>
        <hr/>
        <div class="support-items p-4">
          <div class="row">
            <div class="col-lg-1 col-md-1 d-none d-md-block">
              ID
            </div>
            <div class="col-lg-2 d-none d-lg-block">
              Naam
            </div>
            <div class="col-lg-4 col-md-9 col-9">
              Email
            </div>
            <div class="col-lg-1 col-md-2 d-none d-lg-block">
              Valid
            </div>
            <div class="col-lg-2 d-none d-lg-block">
              Actief
            </div>
            <div class="col-lg-1 col-md-2 col-3">
              Actie
            </div>
          </div>
          @foreach($customers as $customer)
            <div class="row">
              <div class="col-lg-1 col-md-1 d-none d-md-block pt-3">
                {{ $customer->id }}
              </div>
              <div class="col-lg-2 col-4 pt-3 d-none d-lg-block">
                {{ $customer->first_name }} {{ $customer->last_name }}
              </div>
              <div class="col-lg-4 col-md-9 col-10 pt-3">
                {{ $customer->email }}
              </div>
              <div class="col-lg-1 d-none d-lg-block pt-4">
                @if($customer->email_verified_at)
                  <i class="fa fa-check" style="color: #38c172;"></i>
                @else
                  <i class="fa fa-times" style="color: #FF0000"></i>
                @endif
              </div>
              <div class="col-lg-2 d-none d-lg-block pt-3">
                {{ Form::open(array('action' => 'Osm\CustomerController@toggleStatus')) }}
                <input type="hidden" name="id" id="id" value="{{$customer->id}}">
                @if($customer->is_active)
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
              <div class="col-lg-1 col-md-1 col-2 pt-3">
                <a href="{{ route('osm-edit-customer', $customer->id) }}"><i class="fa fa-edit"></i></a>
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
