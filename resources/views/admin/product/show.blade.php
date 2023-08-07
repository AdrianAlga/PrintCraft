@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/form_add.css') }}">
@endpush

@section('body')
  @include('components.navbar_admin')
  @include('components.spasi')

  <section id="header-informasi">
    <div class="container pt-3">
      <div class="row shadow card p-3">
        <div class="col-md-12 text-center">
          <div class="container h-100">
            <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h3>Informasi Produk</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="informasi">
    <div class="container">
      <div class="row card shadow p-4 mt-3">
        <div class="col-md-12">
          <h4 class="card-header">Informasi</h4>
          <div class="card-body">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-borderless table-responsive">
                    <thead>
                      <tr>
                        <th class="col-2">
                          Rincian Produk :
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Nama Produk</td>
                        <td>:</td>
                        <td>{{ $product->name }}</td>
                      </tr>
                      <tr>
                        <td>Harga Produk</td>
                        <td>:</td>
                        <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                      </tr>
                      <tr>
                        <td>Jumlah Stok</td>
                        <td>:</td>
                        <td>{{ $product->stock }}</td>
                      </tr>
                      <tr>
                        <td>Kategori Makanan</td>
                        <td>:</td>
                        <td>{{ $product->product_category }}</td>
                      </tr>
                      <tr>
                        <td>Kategori Menu</td>
                        <td>:</td>
                        <td>{{ $product->food_category }}</td>
                      </tr>
                      <tr>
                        <td>Catatan Produk</td>
                        <td>:</td>
                        <td>
                          {!! $product->description !!}
                        </td>
                      </tr>
                      <tr>
                        <td>Gambar : </td>
                        <td>:</td>
                        <td>
                          <img src="{{ asset('storage/'.$product->image) }}" alt="img" height="150px">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div>
            <button type="button" class="btn btn-primary"
              style="--bs-btn-padding-y: 0.25rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.75rem"><a
                href="{{ route('admin.product.index') }}">Back</a></button>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
