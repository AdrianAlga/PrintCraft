@extends('layouts.main')

@push('style')
    <link rel="stylesheet" href="{{ asset('/css/succes.css') }}">
@endpush

@section('body')
  <section id="succes">
    <div class="container h-100">
      <div class="row h-100 align-items-center text-center">
        <div class="col-12">
          <div class="container-fluid">
            <div class="row justify-content-center">
              <div class="col-12 py-5">
                <div><img src="/images/iconsucces.png" alt="icon" /></div>
              </div>
              <div class="col-12">
                <h3>Pesanan Anda Telah Sukses</h3>
              </div>
              <div class="col-12">
                <p>Terima Kasih</p>
              </div>
              <div class="col-10 col-md-6 py-5">
                <a href="{{ route('home') }}">
                  <button class="btn bg-white txt-orange w-100 rounded-4">Kembali</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
