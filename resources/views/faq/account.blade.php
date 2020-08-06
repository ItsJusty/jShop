@extends('layouts.app')
@section('page', 'Klantenservice Mijn Account')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col-12">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body">
          <h1>Mijn Account</h1>
          <p>Voor alle vragen over alles wat om jou draait</p>
          <hr/>
          <div class="accordion" id="accordion">
            <h5 class="mb-2 faq-item">
              <button class="btn btn-nw text-left text-white w-100" id="h1" data-toggle="collapse" data-target="#q1" aria-expanded="true" aria-controls="q1">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Hoe maak ik een account aan?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q1" class="collapse show" aria-labelledby="h1" data-parent="#accordion">
              <div class="card-body">
                Je kunt gemakkelijk een account aanmaken door <a href="{{ route('register') }}"><b>hier</b></a> te klikken.
              </div>
            </div>

            <h5 class="mb-2 faq-item">
              <button class="btn btn-nw text-left text-white w-100" id="h2" data-toggle="collapse" data-target="#q2" aria-expanded="true" aria-controls="q2">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Waar zie ik mijn bestelling details?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q2" class="collapse show" aria-labelledby="h2" data-parent="#accordion">
              <div class="card-body">
                Heel gemakkelijk, je drukt op je naam rechts bovenin, mijn bestellingen, en vervolgens op details. Of je drukt op <a href="{{ route('my-orders') }}"><b>dit</b></a> knopje.
              </div>
            </div>

            <h5 class="mb-2 faq-item">
              <button class="btn btn-nw text-left text-white w-100" id="h3" data-toggle="collapse" data-target="#q3" aria-expanded="true" aria-controls="q3">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Hoe wijzig ik mijn gegevens?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q3" class="collapse show" aria-labelledby="h3" data-parent="#accordion">
              <div class="card-body">
                Heel simpel, druk voor je persoonlijke gegevens op <a href="{{ route('my-details') }}"><b>deze</b></a> link, en voor je adressen op <a href="{{ route('my-addresses') }}"><b>deze</b></a> link.
              </div>
            </div>

            <h5 class="mb-2 faq-item">
              <button class="btn btn-nw text-left text-white w-100" id="h4" data-toggle="collapse" data-target="#q4" aria-expanded="true" aria-controls="q4">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Hoe verwijder ik mijn gegevens?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q4" class="collapse show" aria-labelledby="h4" data-parent="#accordion">
              <div class="card-body">
                Om je gegevens en account te verwijderen, kun je contact opnemen met onze klantenservice.
              </div>
            </div>

            <h5 class="mb-2 faq-item">
              <button class="btn btn-nw text-left text-white w-100" id="h5" data-toggle="collapse" data-target="#q5" aria-expanded="true" aria-controls="q5">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Delen jullie mijn gegevens met derden?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q5" class="collapse show" aria-labelledby="h5" data-parent="#accordion">
              <div class="card-body">
                Wij delen geen gegevens met derden. Aangezien wij ook onze eigen verzending regelen, is ook een verzendpartij hiervoor niet nodig.
              </div>
            </div>

            <h5 class="mb-2 faq-item">
              <button class="btn btn-nw text-left text-white w-100" id="h6" data-toggle="collapse" data-target="#q6" aria-expanded="true" aria-controls="q6">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Ik ben mijn wachtwoord vergeten
                  </div>
                </div>
              </button>
            </h5>
            <div id="q6" class="collapse show" aria-labelledby="h6" data-parent="#accordion">
              <div class="card-body">
                Je kan gemakkelijk je wachtwoord weer veranderen via <a href="{{ route('password.request') }}"><b>deze link</b></a>.
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('.collapse').collapse()
</script>
@endsection
