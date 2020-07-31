@extends('layouts.app')
@section('page', 'Klantenservice Betalen')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-body">
          <h1>Betalen</h1>
          <p>Voor alle vragen over rinkelende digitale muntjes</p>
          <hr/>
          <div class="accordion" id="accordion">
            <h5 class="mb-2">
              <button class="btn btn-geekr text-left text-white w-100" id="h1" data-toggle="collapse" data-target="#q1" aria-expanded="true" aria-controls="q1">
                <div class="row">
                  <div class="col-1 d-none d-sm-block">
                    <i class="fa fa-caret-down"></i>
                  </div>
                  <div class="col-11 faq-text">
                    Hoe kan ik betalen?
                  </div>
                </div>
              </button>
            </h5>
            <div id="q1" class="collapse show" aria-labelledby="h1" data-parent="#accordion">
              <div class="card-body">
                Je kan op dit moment op 2 manieren betalen, <br/>
                <b>Ideal:<b> via de vertrouwde omgeving van je bank<br/>
                <b>Bankoverschrijving:</b> nadat wij het geld hebben ontvangen zullen wij de bestelling versturen
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
