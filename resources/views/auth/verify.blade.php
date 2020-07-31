@extends('layouts.app')
@section('page', 'Verifieer je e-mail')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifieer je e-mail adres') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Er is een nieuwe mail onderweg!') }}
                        </div>
                    @endif

                    {{ __('Voordat je gebruik maakt van onze leuke diensten, willen we zeker weten of je e-mailadres werkt..') }}
                    {{ __('Klik daarom op de knop in je mail die je hebt gekregen, of vraag eerst een nieuwe aan.') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klik hier voor een nieuwe mail') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
