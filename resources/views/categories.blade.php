@extends('layouts.app')
@section('page', 'Categorieën')
@section('content')

<div class="container mt-5 mb-5">
  @include('flash::message')
  <div class="row">
    @forelse ($categories as $cat)
      <div class="col-lg-3 col-md-4 col-sm-6 col-10 offset-1 offset-lg-0 offset-md-0 offset-sm-0 mb-4">
        <div class="card w-100 h-100 border-0 underline-hover shadow-lg text-center pt-3" style="border-radius: 0rem">
          <a href="#">{{ $cat->name }}</a>
        </div>
      </div>
    @empty

    @endforelse
  </div>
</div>

@endsection
