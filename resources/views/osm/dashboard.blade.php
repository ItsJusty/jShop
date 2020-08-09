@extends('layouts.osm')
@section('page', 'Dashboard')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    <div class="col">
      <div class="card shadow-lg border-radius-none">
        <div class="card-title text-center pt-4">
          <h4>Goedenavond</h4>
          <h5>{{ $employee->fullName() }}  - {{ $employee->role()->name }}</h5>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
