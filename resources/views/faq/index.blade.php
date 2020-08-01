@extends('layouts.app')
@section('page', 'Klantenservice Veelgestelde vragen')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body">
          @if (Auth::user())
            <h1>Hallo, {{Auth::user()->first_name}}</h1>
          @else
            <h1>Hallo,</h1>
          @endif
          <p>Hoe kunnen wij je helpen?</p>
          <hr/>
          <div class="support-items">
            <div class="row">
              <div class="col-lg-6 col-12">
                <a href="{{ route('customer-support-order') }}" class="btn btn-nw border-radius-none w-100 text-left"><i class="fa fa-truck col-1 mr-2"></i>Bestellen en bezorgen</a>
              </div>
              <div class="col-lg-6 col-12">
                <a href="{{ route('customer-support-pay') }}" class="btn btn-nw border-radius-none w-100 text-left"><i class="fa fa-euro col-1 mr-2"></i>Betalen</a>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-12">
                <a href="{{ route('customer-support-account') }}" class="btn btn-nw border-radius-none w-100 text-left"><i class="fa fa-user col-1 mr-2"></i>Mijn account</a>
              </div>
              <div class="col-lg-6 col-12">
                <a href="{{ route('customer-support-cadeau') }}" class="btn btn-nw border-radius-none w-100 text-left"><i class="fa fa-gift col-1 mr-2"></i>Cadeaubonnen</a>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-12">
                <a href="{{ route('customer-support-privacy') }}" class="btn btn-nw border-radius-none w-100 text-left"><i class="fa fa-user-secret col-1 mr-2"></i>Voorwaarden en privacy</a>
              </div>
              <div class="col-lg-6 col-12">
                <a href="{{ route('customer-support-other') }}" class="btn btn-nw border-radius-none w-100 text-left"><i class="fa fa-comments col-1 mr-2"></i>Iets anders</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
