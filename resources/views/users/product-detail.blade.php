@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/checkout.css') }}">
@endpush

@section('body')
  <section>
    <div class="container-fluid fixed-bottom bg-color5">
      <div class="row justify-content-center text-center py-3 font-txt small"
        style="box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3)">
        <div class="col-6">
          <form action="{{ route('addCart') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="amount" value="1" class="amount-input">
            <button type="submit" class="btn border border-secondary btn- w-100">
              <i class="bi bi-plus-lg"></i>
              Keranjang
            </button>
            {{-- <button type="submit" class="btn btn-secondary">+Keranjang</button> --}}
          </form>
        </div>
        <div class="col-6">
          <form action="{{ route('addCart') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="checkout" value="true">
            <input type="hidden" name="amount" value="1" class="amount-input2">
            <button type="submit" class="btn border border-secondary btn- w-100">Pesan Sekarang</button>
            {{-- <button type="submit" class="btn btn-secondary">Check Out</button> --}}
          </form>
          {{-- <a href="{{ route('checkout') }}">
          </a> --}}
        </div>
      </div>
    </div>
  </section>
  
  <section id="product" class="pb-5">
    <div class="container font-txt mb-4">
      <div class="row my-3">
        <div class="col-md-12">
          <div class="container">
            <div class="row">
              <div class="col-6">
                <a href="{{ route('home') }}">
                  <h2><i class="bi bi-arrow-left text-dark"></i></h2>
                </a>
              </div>
              <div class="col-6 text-end">
                <button class="btn" data-bs-toggle="modal" data-bs-target="#cartModal" style="border: none; position: relative;">
                  <i class="bi bi-cart fs-3"></i>
                  <span class="text-center text-white fw-bold rounded-circle"
                    style="width: 20px; height: 20px; background: red; position: absolute; top: 0; left: 25px;">
                    <span class="m-1">
                      {{ $cart_count }}
                    </span>
                  </span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="container">
            <div class="row">
              <div class="col-12 text-center p-0">
                <div>
                  <img class="rounded-top-4" src="{{ asset('storage/' . $product->image) }}" alt="img" height="600px"
                    width="100%" />
                </div>
              </div>
            </div>
            <form action="">
              <div class="row shadow-sm p-3">
                <div class="col-12">
                  <h4 class="fw-bold">{{ $product->name }}</h4>
                </div>
                <div class="col-12">
                  <p class="fw-bold">Rp. {{ number_format($product->price, 0, ',', '.') }},-</p>
                </div>
                <div class="col-12 text-warning d-flex fs-6">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i>
                  <div class="text-dark ps-2"><span>4.6</span><span> (2,5k)</span></div>
                </div>
                <div class="col-6 py-3">
                  <p class="m-0 pb-2">Jumlah</p>
                  <div class="quantity-input">
                    <div class="quantity-btn minus">-</div>
                    <input name="amount" type="number" min="0" value="1" />
                    @error('amount')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    <div class="quantity-btn2 plus">+</div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="container">
            <div class="row border shadow-sm mb-3 py-4">
              <div class="col-12 fw-bold">
                <p>Rincian Produk</p>
              </div>
              <div class="col-12">
                <div class="container">
                  <div class="row">
                    <div class="col-12 p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col-1">
                              Stok
                            </th>
                            <th scope="col">
                              :
                            </th>
                            <th scope="col">
                              {{ $product->stock }}
                            </th>
                          </tr>
                          <tr>
                            <th scope="col-1">
                              Kategori
                            </th>
                            <th scope="col">
                              :
                            </th>
                            <th scope="col">
                              {{ $product->product_category }}
                            </th>
                          </tr>
                          <tr>
                            <th scope="col-1">
                              Harga
                            </th>
                            <th scope="col">
                              :
                            </th>
                            <th scope="col">
                              Rp. {{ number_format($product->price, 0, ',', '.') }}
                            </th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row border py-4 shadow-sm">
              <div class="col-12">
                <p class="fw-bold fw-bold">Catatan:</p>
                <p class="txt-rata txt-spasi text-secondary">
                  {!!$product->description!!}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal keranjang -->
      @include('components.cart_modal')
    </div>
  </section>
  @push('script')
    <script src="{{ asset('/js/orderquantity.js') }}"></script>
  @endpush
@endsection
