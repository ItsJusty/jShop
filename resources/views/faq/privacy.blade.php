@extends('layouts.app')
@section('page', 'Klantenservice Privacy')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body">
          <h1>Privacy</h1>
          <p>Voor alle geheime informatie over jou</p>
          <hr/>
          <div class="accordion" id="accordion">
            <h5 class="mb-2">
              <button class="btn btn-nw text-left text-white w-100" id="h1" data-toggle="collapse" data-target="#q1" aria-expanded="true" aria-controls="q1">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Kan ik mijn gegevens laten verwijderen?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q1" class="collapse show" aria-labelledby="h1" data-parent="#accordion">
              <div class="card-body">
                Jahoor, dit is geen enkel probleem. Neem even contact op met onze klantenservice en wij zullen je gegevens zo snel mogelijk verwijderen.
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-nw text-left text-white w-100" id="h2" data-toggle="collapse" data-target="#q2" aria-expanded="true" aria-controls="q2">
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
            <div id="q2" class="collapse show" aria-labelledby="h2" data-parent="#accordion">
              <div class="card-body">
                Wij delen geen gegevens met derden. Aangezien wij ook onze eigen verzending regelen, is ook een verzendpartij hiervoor niet nodig.
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-nw text-left text-white w-100" id="h3" data-toggle="collapse" data-target="#q3" aria-expanded="true" aria-controls="q3">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Wat voor gegevens slaan jullie op?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q3" class="collapse show" aria-labelledby="h3" data-parent="#accordion">
              <div class="card-body">
                Wij slaan je persoonlijke gegevens op die je zelf invult, informatie over je bestelling en je betaalinformatie.<br/>
                Voor een meer specifieke uitleg verwijzen we je graag door naar ons privacybeleid
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
