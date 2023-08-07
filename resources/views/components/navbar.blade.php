@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/navbar.css') }}">
@endpush

<section id="navbar" class="fixed-bottom">
  {{-- fitur --}}
  <div class="container-fluid">
    <div class="row text-center bg-abu-abu pt-2 font-txt small" style="box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3)">
      <div class="col-3">
        <a href="{{ route('home') }}">
          <i class="bi bi-house-door fs-2"></i>
          <p>Home</p>
        </a>
      </div>
      <div class="col-3">
        <a href="{{ route('inbox') }}">
          <i class="bi bi-envelope fs-2"></i>
          <p>Inbox</p>
        </a>
      </div>
      <div class="col-3">
        <a href="{{ route('order') }}">
          <i class="bi bi-calendar2-week fs-2"></i>
          <p>Order</p>
        </a>
      </div>
      <div class="col-3">
        <a href="{{ route('profile') }}">
          <i class="bi bi-person-circle fs-2"></i>
          <p>Profile</p>
        </a>
      </div>
    </div>
  </div>
</section>
