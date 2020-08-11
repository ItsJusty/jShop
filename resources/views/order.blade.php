@extends('layouts.app')

@section('page', __('cart.place_order'))

@section('content')
    <div class="container mt-5 mb-5">
        @include('flash::message')
        <h3 class="mb-4">{{ __('cart.place_order') }}</h3>
        <p>Waar mogen wij het pakket naartoe sturen?</p>
        <hr/>
        {{ Form::open(array('action' => 'OrderController@createOrder')) }}
        <div class="container">
          <div class="row">
            <!-- <div class=""> -->
              @forelse($user->addresses as $address)
                <div class="col-lg-4 col-md-6 col-12">
                  <div class="card w-100 border-0 underline-hover shadow-lg" onclick="$('#address_{{$address->id}}').prop('checked', true);" style="height: 250px">
                    <div class="card-body my-3 p-0 pl-3 pr-3">
                      <h5 class="text-center">{{ $address->alias }}</h5>
                      <hr/>
                      <div class="bd-highlight d-flex">
                        <h6 class="d-inline p-1 w-100 bd-highlight">
                          @if($address->company)
                            {{ $address->company }}<br/>
                            T.a.v {{ $address->first_name }} {{ $address->last_name }}<br/>
                          @else
                            {{ $address->first_name }} {{ $address->last_name }}<br/>
                          @endif
                          {{ $address->address }}<br/>
                          {{ $address->postal_code }}
                          {{ $address->city }} <br/>
                          @if($address->phone_number)
                            {{ $address->phone_number }}
                          @endif
                        </h6>
                      </div>
                    </div>
                    <hr/>
                    <input class="offset-10 mb-3" type="radio" name="address" id="address_{{$address->id}}" value="{{ $address->id }}" aria-label="...">
                  </div>
                </div>
              @empty
                <p class="text-center mt-5 col-12">Je hebt nog geen adressen toegevoegd aan je account. Waar moeten we nu alle pakketjes naartoe verzenden? :(</p>
                <a class="btn btn-main text-white align-center col-lg-4 offset-lg-4" href="{{ route('new-addresses') }}"><i class="fa fa-plus"></i> Voeg je eerste adres toe</a>
              @endforelse
              <div class="col-md-3 offset-md-9 p-1 mt-4 pb-0">
                <button class="btn btn-main w-100" type="submit" name="submit"><i class="fa fa-shopping-cart"></i> {{__('cart.place_your_order')}}</button>
              </div>
            <!-- </div> -->
          </div>
        </div>
        {{ Form::close() }}
    </div>

@endsection
