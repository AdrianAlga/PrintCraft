@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@push('script')
  <script src="{{ asset('js/script.js') }}"></script>
@endpush

@section('body')
  @include('components.navbar')
  <section id="home">
    <div class="container">
      <section>
        <div class="container-fluid p-0">
          <div class="row py-3">
            <div class="col-10 pe-0">
              <form class="d-flex" role="search">
                <button class="btn position-absolute" type="submit"><i class="bi bi-search"></i></button>
                <input class="form-control me-2 ps-5 rounded-3" type="search" placeholder="Search" />
              </form>
            </div>
            <div class="col-2 text-start">
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
          <!-- Navbar Produck Category -->
          <div class="row shadow-sm mx-4 rounded-3 mb-3">
            <div class="col-6 text-center px-0">
              <button class="rounded-3 h-100 w-100 py-3 border-0 product-category-button">
                <img src="{{ asset('/images/design.png') }}" alt="icon" height="30px" />
                <span class="fw-bold">Desain</span>
              </button>
            </div>
            <div class="col-6 text-center px-0">
              <button class="rounded-3 h-100 w-100 py-3 border-0 product-category-button">
                <img src="{{ asset('/images/cetak.png') }}" alt="icon" height="30px" />
                <span class="fw-bold">Cetak</span>
              </button>
            </div>
          </div>
          
          <div class="row">
            <div class="col-12">
              <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="4000">
                    <img src="{{ asset('/images/slide1.jpeg') }}" class="d-block w-100" alt="img" height="300px" />
                  </div>
                  <div class="carousel-item" data-bs-interval="4000">
                    <img src="{{ asset('/images/slide2.jpeg') }}" class="d-block w-100" alt="img" height="300px" />
                  </div>
                  <div class="carousel-item" data-bs-interval="4000">
                    <img src="{{ asset('/images/slide3.jpeg') }}" class="d-block w-100" alt="img" height="300px" />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Navbar Catering  -->
          <div class="food-category-list ">
            <div class="row text-center font-txt text-white" style="font-size: 13px">
              <div class="col-6 my-3 px-1 ">
                <div class="bg-white shadow-sm py-2 rounded-3 food-category-button catering-category-button bg-orange" style="cursor: pointer">
                  <img src="{{ asset('/images/chicken-leg.png') }}" alt="img" height="25px" />
                  <span class="text-abu">Ayam</span>
                </div>
                </a>
              </div>
              <div class="col-6 my-3 px-1">
                <div class="bg-white shadow-sm py-2 rounded-3 food-category-button catering-category-button" style="cursor: pointer">
                  <img src="{{ asset('/images/steak.png') }}" alt="img" height="25px" />
                  <span class="txt-abu">Sapi</span>
                </div>
                </a>
              </div>
            </div>
          </div>

          <!-- Navbar Frozen -->
          <div class="food-category-list hide-content">
            <div class="row text-center font-txt text-white" style="font-size: 13px">
              <div class="col-6 my-3 px-1">
                <div class="bg-white shadow-sm py-2 rounded-3 food-category-button frozen-category-button bg-orange" style="cursor: pointer">
                  <img src="{{ asset('/images/risol.png') }}" alt="img" height="25px" />
                  <span class="text-abu">Risol</span>
                </div>
              </div>
              <div class="col-6 my-3 px-1">
                <div class="bg-white shadow-sm py-2 rounded-3 food-category-button frozen-category-button" style="cursor: pointer">
                  <img src="{{ asset('/images/sosis.png') }}" alt="img" height="25px" />
                  <span class="txt-abu">Sosis</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="food-category-content">
        <div class="catering-content">
          <div class="row">
            @foreach ($products as $product)
              @if ($product['product_category'] == 'catering' && $product['food_category'] == 'ayam')
                <div class="col-md-3 col-6 p-0 box">
                  <a href="{{ route('product.detail', ['product' => $product->id]) }}">
                    <div class="m-1 shadow-sm rounded-4 card">
                      <div class="text-center">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="img" height="400px"
                          width="100%" class="rounded-top-4" />
                      </div>
                      <div class="py-3 px-2 text-center">
                        <h4 class="m-0 fw-bold">{{ $product->name }}</h4>
                      </div>
                    </div>
                  </a>
                </div>
              @endif
            @endforeach
          </div>
        </div>
        <div class="catering-content hide-content">
          <div class="row">
            @foreach ($products as $product)
              @if ($product['product_category'] == 'catering' && $product['food_category'] == 'sapi')
                <div class="col-md-3 col-6 p-0 box">
                  <a href="{{ route('product.detail', ['product' => $product->id]) }}">
                    <div class="m-1 shadow-sm rounded-4 card">
                      <div class="text-center">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="img" height="400px"
                          width="100%" class="rounded-top-4" />
                      </div>
                      <div class="py-3 px-2 text-center">
                        <h4 class="m-0 fw-bold">{{ $product->name }}</h4>
                      </div>
                    </div>
                  </a>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>

      <div class="food-category-content hide-content">
        <div class="frozen-content">
          <div class="row">
            @foreach ($products as $product)
              @if ($product['product_category'] == 'frozen' && $product['food_category'] == 'risol')
                <div class="col-md-3 col-6 p-0 box">
                  <a href="{{ route('product.detail', ['product' => $product->id]) }}">
                    <div class="m-1 shadow-sm rounded-4 card">
                      <div class="text-center">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="img" height="400px"
                          width="100%" class="rounded-top-4" />
                      </div>
                      <div class="py-3 px-2 text-center">
                        <h4 class="m-0 fw-bold">{{ $product->name }}</h4>
                      </div>
                    </div>
                  </a>
                </div>
              @endif
            @endforeach
          </div>
        </div>
        <div class="frozen-content hide-content">
          <div class="row">
            @foreach ($products as $product)
              @if ($product['product_category'] == 'frozen' && $product['food_category'] == 'sosis')
                <div class="col-md-3 col-6 p-0 box">
                  <a href="{{ route('product.detail', ['product' => $product->id]) }}">
                    <div class="m-1 shadow-sm rounded-4 card">
                      <div class="text-center">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="img" height="400px"
                          width="100%" class="rounded-top-4" />
                      </div>
                      <div class="py-3 px-2 text-center">
                        <h4 class="m-0 fw-bold">{{ $product->name }}</h4>
                      </div>
                    </div>
                  </a>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>

      <div>
        <div class="row" style="margin-top: 115px">
          <div class="col-md-12"></div>
        </div>
      </div>
      <!-- Modal keranjang -->
      @include('components.cart_modal')
    </div>
  </section>
@endsection
