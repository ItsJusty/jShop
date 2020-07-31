@extends('layouts.app')
@section('page', 'Klantenservice Anders')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body">
          <h1>Anders</h1>
          <p>Voor alles waar we nog geen plekje voor hebben</p>
          <hr/>
          <div class="accordion" id="accordion">
            Op dit moment hebben we hier nog geen vragen
            <!-- <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h1" data-toggle="collapse" data-target="#q1" aria-expanded="true" aria-controls="q1">
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
              <button class="btn btn-geekr text-left text-white w-100" id="h2" data-toggle="collapse" data-target="#q2" aria-expanded="true" aria-controls="q2">
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
                Wij delen je gegevens met een aantal noodzakelijke partijen. Dit zijn Mollie voor het afhandelen van je betaling, en PostNL / DPD voor het verzenden van je bestelling.
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h3" data-toggle="collapse" data-target="#q3" aria-expanded="true" aria-controls="q3">
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
            </div> -->

          </div>
          <hr/>
          <div class="row justify-content-center text-center p-3">
            <a href="https://api.whatsapp.com/send?phone=31617674540" class="btn btn-geekr col-lg-3 col-12 pb-2 mb-3">
              <!-- <a class="underline-hover" href="#"><i class="fa fa-large fa-whatsapp"></i> Whatsapp</a> -->
              <i class="fa fa-large fa-whatsapp"></i> Whatsapp
            </a>
            <hr>
            <a href="mailto:hallo@geekr.nl?subject=Geekr.nl - Digitale post vanuit de website" class="btn btn-geekr col-lg-3 col-12 pb-2 mb-3">
              <i class="fa fa-large fa-paper-plane"></i> hallo@geekr.nl
            </a>
            <hr>
            <a href="{{ route('customer-support-form') }}" class="btn btn-geekr col-lg-3 col-12 pb-2 mb-3">
              <i class="fa fa-large fa-envelope"></i> Contactformulier
            </a>
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
