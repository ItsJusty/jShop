@extends('layouts.app')
@section('page', 'Klantenservice Cadeaukaart')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body">
          <h1>Cadeaukaart</h1>
          <p>Voor alle vragen over het leukste cadeau</p>
          <hr/>
          <div class="accordion" id="accordion">
            <h5 class="mb-2">
              <button class="btn btn-nw text-left text-white w-100" id="h1" data-toggle="collapse" data-target="#q1" aria-expanded="true" aria-controls="q1">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Waar koop ik een cadeaukaart?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q1" class="collapse show" aria-labelledby="h1" data-parent="#accordion">
              <div class="card-body">
                Op dit moment is het nog niet mogelijk om een cadeaukaart te kopen, hier komt later meer informatie over :)
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-nw text-left text-white w-100" id="h2" data-toggle="collapse" data-target="#q2" aria-expanded="true" aria-controls="q2">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Hoe wissel ik een cadeaukaart in?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q2" class="collapse show" aria-labelledby="h2" data-parent="#accordion">
              <div class="card-body">
                Omdat we nog niet helemaal vol-ontwikkeld zijn, zijn nog niet alles opties beschikbaar. De cadeaukaart kan je gemakkelijk inwisselen bij de pagina waar je ook je kortingscodes invult bij je bestelling. Handig toch ?
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-nw text-left text-white w-100" id="h3" data-toggle="collapse" data-target="#q3" aria-expanded="true" aria-controls="q3">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Moet ik mijn cadeaukaart in 1 keer besteden?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q3" class="collapse show" aria-labelledby="h3" data-parent="#accordion">
              <div class="card-body">
                Nee hoor, dat is niet nodig. Je cadeaukaart blijft een tegoed houden en is geldig tot 3 jaar naar uitgifte
              </div>
            </div>

            <h5 class="mb-2">
              <button class="btn btn-nw text-left text-white w-100" id="h4" data-toggle="collapse" data-target="#q4" aria-expanded="true" aria-controls="q4">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Ik ben mijn cadeaukaart kwijt
                  </div>
                </div>
              </button>
            </h5>
            <div id="q4" class="collapse show" aria-labelledby="h4" data-parent="#accordion">
              <div class="card-body">
                We zouden je graag willen helpen met zoeken, maar daar hebben wij ook niet alle tijd voor. Wij zijn daarom ook niet verantwoordelijk voor diefstal of verlies van je cadeaukaart.
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
