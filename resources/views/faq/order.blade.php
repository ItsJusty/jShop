@extends('layouts.app')
@section('page', 'Klantenservice Bestellen en bezorgen')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body">
          <h1>Bestellen en bezorgen</h1>
          <p>Voor alle vragen over je bestelling tot aan je voordeur</p>
          <hr/>
          <div class="accordion" id="accordion">
            <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h1" data-toggle="collapse" data-target="#q1" aria-expanded="true" aria-controls="q1">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Wanneer ontvang ik mijn bestelling?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q1" class="collapse show" aria-labelledby="h1" data-parent="#accordion">
              <div class="card-body">
                Wij en onze bezorgers doen er alles aan om de beloofde levertijd waar te maken. Als dat onverhoopt niet lukt, brengen we je daarvan op de hoogte. Bij sommige artikelen kan je je Track&Trace in de gaten houden voor de meest actuele informatie.
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h2" data-toggle="collapse" data-target="#q2" aria-expanded="true" aria-controls="q2">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Kan ik een geplaatste bestelling nog wijzigen?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q2" class="collapse show" aria-labelledby="h2" data-parent="#accordion">
              <div class="card-body">
                Nee, om je gegevens zo veel mogelijk te beschermen kan je helaas je bestelling niet wijzigen. Indien je bestelling nog niet is verzonden kun je deze wel annuleren, en je bestelling opnieuw plaatsen.
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h3" data-toggle="collapse" data-target="#q3" aria-expanded="true" aria-controls="q3">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Hoe snel ontvang ik mijn geld weer na een retour of annulering?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q3" class="collapse show" aria-labelledby="h3" data-parent="#accordion">
              <div class="card-body">
                Het hangt af van de manier waarop je de bestelling hebt geplaatst.<br/><br/>
                <b>Ideal</b> binnen 5 werkdagen
                <b>Creditcard</b> binnen 7 werkdagen
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h4" data-toggle="collapse" data-target="#q4" aria-expanded="true" aria-controls="q4">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Worden de bestellingen gratis verzonden?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q4" class="collapse show" aria-labelledby="h4" data-parent="#accordion">
              <div class="card-body">
                Jazeker! Alle bestellingen worden <b>gratis</b> verzonden.
              </div>
            </div>
            <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h5" data-toggle="collapse" data-target="#q5" aria-expanded="true" aria-controls="q5">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Kan ik buiten Nederland ook bestellen?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q5" class="collapse show" aria-labelledby="h5" data-parent="#accordion">
              <div class="card-body faq-text">
                Nope, helaas! Op dit moment bezorgen wij alleen in Nederland. Je kan wel via onze <a href="https://www.bol.com/nl/v/overdeverkoper/1474326/index.html?offerId=#seller_overview">bol.com pagina</a> in belgie bestellen
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
