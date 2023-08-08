@extends('layouts.main')

@push('style')
  {{-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> --}}
@endpush

@section('body')
  @include('components.navbar_admin')
  <section id="dashboard">
    <div class="container h-100 text-center">
      <div class="row h-100 align-content-center justify-content-center">
        <div class="col-12 py-3 image-container">
          <img src="{{ asset('images/logo.png') }}" alt="img" style="height : 150px">
        </div>
      </div>
    </div>
  </section>
@endsection
