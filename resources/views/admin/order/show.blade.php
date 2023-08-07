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
                <h3>Informasi Pemesanan</h3>
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
          <div class="card-body">
            <div class="col-md-12">
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th class="col-3" colspan="2">Pembeli :</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Nama Pemesan</td>
                    <td>:</td>
                    <td>{{ $order->name }}</td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td>:</td>
                    <td>{{ $order->phone }}</td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $order->address }}</td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th class="col-3" colspan="2">Rincian Produk :</th>
                  </tr>
                </thead>
                @foreach ($products as $product)
                  <tbody class="border">
                    <tr>
                      <td>Nama Makanan</td>
                      <td>:</td>
                      <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                      <td>Kategori</td>
                      <td>:</td>
                      <td>{{ $product->product_category }}</td>
                    </tr>
                    <tr>
                      <td>Jenis Makanan</td>
                      <td>:</td>
                      <td>{{ $product->food_category }}</td>
                    </tr>
                    <tr>
                      <td>Harga/Porsi</td>
                      <td>:</td>
                      <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                      <td>Jumlah Pesanan</td>
                      <td>:</td>
                      <td>{{ $product->amount }}</td>
                    </tr>
                    <tr>
                      <td>Total</td>
                      <td>:</td>
                      <td>Rp. {{ number_format($product->price * $product->amount, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                      <td>Gambar</td>
                      <td>:</td>
                      <td><img src="{{ asset('storage/' . $product->image) }}" alt="img" height="150px"></td>
                    </tr>
                  </tbody>
                @endforeach
              </table>
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th class="col-3" colspan="2">Pembayaran :</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Total Pembayaran</td>
                    <td>:</td>
                    <td>Rp. {{ number_format($order->total, 0, ',', '.') }}</td>
                  </tr>
                  <tr>
                    <td>Metode Pembayaran</td>
                    <td>:</td>
                    <td>
                      @if ($order->payment == 1)
                        BCA
                      @elseif ($order->payment == 2)
                        BNI
                      @elseif ($order->payment == 3)
                        BRI
                      @elseif ($order->payment == 4)
                        Mandiri
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Pembelian</td>
                    <td>:</td>
                    <td>{{ $order->created_at }}</td>
                  </tr>
                  <tr>
                    <td>Nomor Pesanan</td>
                    <td>:</td>
                    <td>8965432{{ $order->id }}</td>
                  </tr>
                  <tr>
                    <td>Bukti Pembayaran</td>
                    <td>:</td>
                    <td>
                      @if ($order->pay_image)
                        <img src="{{ asset('storage/' . $order->pay_image) }}" alt="img" height="300px">
                      @else
                        Belum Melakukan pembayaran
                      @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div>
            <a href="{{ route('admin.order.index') }}">
              <button type="button" class="btn btn-primary"
                style="--bs-btn-padding-y: 0.25rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.75rem">Back</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
