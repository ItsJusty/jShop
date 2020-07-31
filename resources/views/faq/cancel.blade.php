@extends('layouts.app')
@section('page', 'Klantenservice Annuleren en retour')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body">
          <h1>Annuleren en retour</h1>
          <p>Voor alle vragen over je bestelling die niet bij je voordeur moeten komen</p>
          <hr/>
          <div class="accordion" id="accordion">
            <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h1" data-toggle="collapse" data-target="#q1" aria-expanded="true" aria-controls="q1">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Mag ik mijn bestelling retourneren?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q1" class="collapse show" aria-labelledby="h1" data-parent="#accordion">
              <div class="card-body">
                Bijna al onze artikelen mag je retourneren. Echter hebben wij voor een aantal artikelen een niet-retour-beleid, deze wordt vermeld op de productpagina. Voor de rest moeten de retouren voldoen aan onze retourvoorwaarden.
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h2" data-toggle="collapse" data-target="#q2" aria-expanded="true" aria-controls="q2">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Hoe retourneer ik mijn artikelen?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q2" class="collapse show" aria-labelledby="h2" data-parent="#accordion">
              <div class="card-body">
                Hiervoor kan je je pakket als retour aanmelden. Indien dit niet lukt, kan je contact opnemen met de klanteservice <i class="far fa-smile"></i>
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h3" data-toggle="collapse" data-target="#q3" aria-expanded="true" aria-controls="q3">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Moet ik mijn retour betalen?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q3" class="collapse show" aria-labelledby="h3" data-parent="#accordion">
              <div class="card-body">
                Nee hoor, deze kosten worden door ons gedekt.
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h4" data-toggle="collapse" data-target="#q4" aria-expanded="true" aria-controls="q4">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Wat is het retouradres?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q4" class="collapse show" aria-labelledby="h4" data-parent="#accordion">
              <div class="card-body">
                Geheim, oke nee. Het retouradres is gelijk aan het bedrijfsadres. Handig toch? Staat gewoon altijd rechtsonderin op je beeldscherm onder het kopje <b>Winkel informatie</b>
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h5" data-toggle="collapse" data-target="#q5" aria-expanded="true" aria-controls="q5">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Waar kan ik mijn retour afgeven?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q5" class="collapse show" aria-labelledby="h5" data-parent="#accordion">
              <div class="card-body">
                Je kunt je retourpakket afleveren bij een locatie van het postbedrijf. Als je een etiket van DPD krijgt, kan je deze bij een DPD punt afleveren. Of als je een PostNL etiket krijgt, kan je deze afleveren bij een PostNL locatie.
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h6" data-toggle="collapse" data-target="#q6" aria-expanded="true" aria-controls="q6">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Hoe snel is een retour verwerkt?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q6" class="collapse show" aria-labelledby="h6" data-parent="#accordion">
              <div class="card-body">
                Meestal is dat binnen 5 werkdagen nadat jij het verstuurd hebt. We houden je op de hoogte via mail. Zodra je retour is verwerkt, betalen we je terug op dezelfde manier als dat je hebt betaald.
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
