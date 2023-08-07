@extends('layouts.main')

@push('style')
  {{-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> --}}
@endpush

@section('body')
  @include('components.navbar_admin')
  <section id="dashboard">
    <div class="container h-100 text-center">
      <div class="row h-100 align-content-center justify-content-center">
        <div class="col-md-12 text-white">
          <h1>Warung Jawa</h1>
        </div>
        <div class="py-3">
          <img src="{{ asset('images/logo.png') }}" alt="img" style="height : 250px">
        </div>
        <div class="col-md-12 text-white">
          <h2>Catering & Frozen</h2>
        </div>
      </div>
    </div>
  </section>
@endsection
