@extends('layouts.app')
@section('page', 'Klantenservice Garantie en reparatie')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body">
          <h1>Garantie en reparatie</h1>
          <p>Voor alle vragen over de gevoelige emotionele artikelen</p>
          <hr/>
          <div class="accordion" id="accordion">
            <h5 class="mb-2">
              <button class="btn btn-nw text-left text-white w-100" id="h1" data-toggle="collapse" data-target="#q1" aria-expanded="true" aria-controls="q1">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Mijn artikel is beschadigd of kapot
                  </div>
                </div>
              </button>
            </h5>
            <div id="q1" class="collapse show" aria-labelledby="h1" data-parent="#accordion">
              <div class="card-body">
                Vervelend, je kan je artikelen retourneren volgens de retourvoorwaarden. Is je artikel door ons bevestigd dat de schade door eigen fout komt, zullen deze kosten niet worden vergoed.
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
