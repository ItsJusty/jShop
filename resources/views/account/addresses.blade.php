@extends('layouts.app')
@section('page', 'Mijn Addressen')
@section('content')

<div class="container mt-5 ">
  @include('flash::message')
  <h3 class="mb-2">{{__('user.my_addresses')}}</h3>
  @if($user->addresses()->first())
    <a href="{{ route('new-addresses') }}" class="mb-5">{{__('user.add_another_address')}}</a>
  @endif
  <hr class="mb-5" />
</div>

<div class="container">
  <div class="row">
    @forelse($user->addresses as $address)
      <div class="col-lg-4 col-md-6 col-12">
        <div class="card w-100 border-0 underline-hover shadow-lg border-radius-none" style="height: 250px">
          <div class="card-body my-3 p-0 pl-3 pr-3">
            <h5 class="text-center">{{ $address->alias }}</h5>
            <hr/>
            <div class="bd-highlight d-flex">
              <h6 class="d-inline p-1 w-100 bd-highlight">
                @if($address->company_name)
                  {{ $address->company_name }}<br/>
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
          <div class="container pb-3">
            <div class="row">
              <div class="col-6 text-center">
                <a href="{{ route('edit-addresses', $address->id) }}"><i class="fa fa-pen"></i> {{__('general.edit')}}</a>
              </div>
              <div class="col-6 text-center">
                <a href="{{action('AddressController@removeAddress', $address->id)}}" type=""><i class="fa fa-trash"></i> {{__('general.delete')}}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    @empty
      <p class="text-center mt-5 col-12">{{__('user.add_first_address_sub')}}</p>
      <a class="btn btn-geekr text-white align-center col-lg-4 offset-lg-4" href="{{ route('new-addresses') }}"><i class="fa fa-plus"></i> {{__('general.add_first_address')}}</a>
    @endforelse
  </div>
</div>

@endsection
