@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
@endpush

@section('body')
  @include('components.navbar')
  <section id="profile">
    <div class="container font-txt">
      <div class="row my-3">
        <div class="col-md-12">
          <div class="container">
            <div class="row">
              <div class="col-12 text-center">
                <h4 class="font-txt fw-bold ms-3 py-1">Data Diri Anda</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <div>
            <img src="{{ asset('storage/' . $user->image) }}" alt="img" class="rounded-circle" height="130px"
              width="130px" />
          </div>
        </div>
        <div class="col-12 text-center">
          <a href="{{ route('profile.edit') }}">
            <h4 class="px-3 badge bg-orange text-dark">Edit</h4>
          </a>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12">
          <div class="login-box">
            <div class="user-box">
              <input type="text" name="" value="{{ $user->name }}" disabled />
              <label>Nama Lengkap</label>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3 text-center">
        <div class="login-box">
          <div class="user-box d-flex pt-3">
            <label class="text-start JK">Jenis Kelamin</label>
          </div>
        </div>
        <div class="col-6">
          <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off"
            disabled @if ($user->gender && $user->gender == 'Laki-Laki') checked @endif>
          <label class="btn btn-outline-primary w-100 rounded-5" for="success-outlined"><i class="bi bi-gender-male"></i>
            Laki-Laki</label>
        </div>
        <div class="col-6">
          <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off" disabled
          @if ($user->gender && $user->gender == 'Perempuan') checked @endif>
          <label class="btn btn-outline-primary w-100 rounded-5" for="danger-outlined"><i
              class="bi bi-gender-female"></i>Perempuan</label>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12">
          <div class="login-box">
            <div class="user-box">
              <input type="email" name="" value="{{ $user->email }}" disabled />
              <label>Email</label>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12">
          <div class="login-box">
            <div class="user-box">
              <input type="number" name="" value="{{ $user->phone }}" disabled />
              <label>Phone</label>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12">
          <div class="login-box">
            <div class="user-box">
              <div class="mb-3 pt-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="" rows="5" disabled>{{ $user->description }}</textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3 justify-content-center">
        <div class="col-6 text-center pb-3 ">
          <a href="{{ route('logout') }}">
            <button class="btn btn-danger w-100">Logout</button>
          </a>
        </div>
      </div>
      <div>
        <div class="row" style="margin-top: 94px">
          <div class="col-md-12"></div>
        </div>
      </div>
    </div>
  </section>
@endsection
