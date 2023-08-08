@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/order.css') }}">
@endpush

@section('body')
  @include('components.navbar')
  <section id="order">
    <div class="container shadow-sm pb-5 rounded-bottom-5">
      <div class="row">
        <div class="col-12 text-center p-4">
          <h3 class="fw-bold">Status Order</h3>
        </div>
      </div>
      <div class="row mx-4 rounded-3 mb-3 border rounded-5">
        <div class="col-6 text-center p-0">
          <a href="{{ route('order') }}">
            <button class="btn bg-abu-abu rounded-start-5 rounded-end-0 border w-100 shadow-sm">Berlangsung</button>
          </a>
        </div>
        <div class="col-6 text-center px-0">
          <a href="{{ route('order.history') }}">
            <button class="btn bg-orange rounded-end-5 rounded-start-0 w-100 shadow-sm txt-color5">History</button>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="mt-4 pb-5">
    @foreach ($orders as $order)
      @php
        $products = [];
        $order->products_id = json_decode($order->products_id);
        $order->amounts = json_decode($order->amounts);
        $total = 0;
        foreach ($order->products_id as $index => $productId) {
            $products[$index] = \App\Models\Product::find($productId);
            $products[$index]['amount'] = $order->amounts[$index];
            $total += $products[$index]['price'] * $products[$index]['amount'];
        }
      @endphp
      <div class="container p-2 mb-5">
        <div class="bg-white p-3 rounded-3">
          @foreach ($products as $product)
            <div class="row mb-3 align-items-center">
              <div class="col-md-3">
                <div>
                  <img src="{{ asset('storage/' . $product->image) }}" alt="img" width="100%" height="320px"
                    class="rounded-4" />
                </div>
              </div>
              <div class="col-md-9">
                <div class="container">
                  <div class="rounded-4 px-3 border shadow-sm">
                    <div class="row">
                      <div class="col-12 fw-bold pt-3 border-bottom">
                        <p class="fw-bold fs-5 text-center">Rincian Produk</p>
                      </div>
                      <div class="col-12 py-3">
                        <div class="container">
                          <div class="row">
                            <div class="col-12 p-0">
                              <table class="table table-borderless">
                                <thead>
                                  <tr>
                                    <th scope="col-1">
                                      Nama
                                    </th>
                                    <th scope="col">
                                      :
                                    </th>
                                    <th scope="col">
                                      {{ $product->name }}
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
                                      Harga /porsi
                                    </th>
                                    <th scope="col">
                                      :
                                    </th>
                                    <th scope="col">
                                      Rp. {{ number_format($product->price, 0, ',', '.') }}
                                    </th>
                                  </tr>
                                  <tr>
                                    <th scope="col-1">
                                      Jumlah Pesanan
                                    </th>
                                    <th scope="col">
                                      :
                                    </th>
                                    <th scope="col">
                                      {{ $product->amount }}
                                    </th>
                                  </tr>
                                </thead>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

          <div class="row mt-3 border-top border-2 pt-3 text-center">
            <div class="col-md-6 fw-bold fs-5">
              <span class="px-3">Total Pesanan :</span>
              <span>Rp. </span><Span>{{ number_format($total, 0, ',', '.') }}</Span>
            </div>
            <div class="col-md-6">
              <span class="fw-bold">Status : </span>
              <span class="badge text-bg-info text-white">{{ $order->status }}</span>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </section>
@endsection
