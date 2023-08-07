@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
  <style>
    .trix-button-group--file-tools {
      display: none !important;
    }
  </style>
@endpush

@section('body')
  @include('components.navbar_admin')
  @include('components.spasi')

  <section id="header-tambahProduk">
    <div class="container-fluid card shadow-lg">
      <div class="row mt-3">
        <div class="col-2">
          <a href="{{ route('admin.product.index') }}"><button type="button" class="btn btn-primary"><i
                class="bi bi-arrow-left-circle"></i></button></a>
        </div>
        <div class="col-12 text-center">
          <h3>Tambah Produk</h3>
          <p>Tambahkan Produk pada colom dibawah</p>
        </div>
      </div>
    </div>
  </section>

  <section id="addProduk">
    <div class="container-fluid">
      <div class="row m-4 justify-content-center">
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="login-box">
              <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4 class="mb-4 text-center">Produk</h4>
                <div class="user-box mt-2">
                  <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror"
                    value="{{ old('name') }}" />
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  <label for="name" class="text-black">Nama Produk</label>
                </div>
                <div class="user-box mt-2">
                  <input type="number" name="price" id="price" class="@error('price') is-invalid @enderror"
                    value="{{ old('price') }}" min="0" />
                  @error('price')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  <label for="price" class="text-black">Harga Produk</label>
                </div>
                <div class="user-box mt-2">
                  <input type="number" name="stock" id="stock" class="@error('stock') is-invalid @enderror"
                    min="0" value="{{ old('stock') }}" />
                  @error('stock')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  <label for="stock" class="text-black">Jumlah Stok</label>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col-6 px-0">
                      <label for="product_category" class="pb-2">kategori Produk :</label>
                      <select name="product_category"
                        class="form-select form-select-sm @error('product_category') is-invalid @enderror"
                        aria-label="Default select example" id="product_category">
                        <option hidden>Categori Produk</option>
                        <option value="catering" {{ old('product_category') == 'catering' ? 'selected' : '' }}>Catering
                        </option>
                        <option value="frozen" {{ old('product_category') == 'frozen' ? 'selected' : '' }}>Frozen
                        </option>
                      </select>
                      @error('product_category')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-6">
                      <label for="food_category" class="pb-2">kategori Menu :</label>
                      <select name="food_category"
                        class="form-select form-select-sm @error('food_category') is-invalid @enderror"
                        aria-label="Default select example" id="food_category">
                        <option Hidden>Kategori Makanan</option>
                        <option value="ayam" {{ old('food_category') == 'ayam' ? 'selected' : '' }}>Ayam</option>
                        <option value="sapi" {{ old('food_category') == 'sapi' ? 'selected' : '' }}>Sapi</option>
                        <option value="risol" {{ old('food_category') == 'risol' ? 'selected' : '' }}>Risol</option>
                        <option value="sosis" {{ old('food_category') == 'sosis' ? 'selected' : '' }}>Sosis</option>
                      </select>
                      @error('food_category')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="my-3">
                  <label for="image" class="form-label">Masukkan foto produk</label>
                  <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                    id="image" />
                  @error('image')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Catatan Produk</label>
                  {{-- <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4" >{{ old("description") }}</textarea> --}}
                  <input id="x" type="hidden" name="description">
                  <trix-editor input="x"></trix-editor>
                  @error('description')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="row text-center my-4">
                  <div class="col-md-12">
                    <div class="login-box">
                      <button type="submit" class="card">
                        Tambah
                        <span></span>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
