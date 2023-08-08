@extends('layouts.main')

@push('style')
  {{-- <link rel="stylesheet" href="{{ asset('/css/users.css') }}"> --}}
@endpush

@section('body')
  <section id="Payment" style="height: 100vh">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="row shadow p-3 justify-content-center">
            <div class="col-md-3">
              <div class="row text-center">
                <div class="col-12">
                  <p>Tanggal Pembelian</p>
                </div>
                <div class="col-12">
                  <p>{{ $order->created_at }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="row text-center">
                <div class="col-12">
                  <p>Nomor Pesanan</p>
                </div>
                <div class="col-12">
                  <p>98397393{{ $order->id }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 text-center">
              <div class="row text-center">
                <div class="col-12">
                  <p>Metode Pembayaran</p>
                </div>
                <div class="col-12">
                  <p>
                    @if ($order->payment == 1)
                      BCA
                    @elseif ($order->payment == 2)
                      BNI
                    @elseif ($order->payment == 3)
                      BRI
                    @elseif ($order->payment == 4)
                      Mandiri
                    @endif
                  </p>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div>
                @if ($order->payment == 1)
                  <img src="{{ asset('images/payment1.png') }}" alt="img" class="img-fluid" />
                @elseif ($order->payment == 2)
                  <img src="{{ asset('images/payment2.png') }}" alt="img" class="img-fluid" />
                @elseif ($order->payment == 3)
                  <img src="{{ asset('images/payment3.png') }}" alt="img" class="img-fluid" />
                @elseif ($order->payment == 4)
                  <img src="{{ asset('images/payment4.png') }}" alt="img" class="img-fluid" />
                @endif
              </div>
            </div>
          </div>
          <div class="row shadow p-4 mt-3">
            <div class="col-md-12">
              <h4 class="card-header">Detail</h4>
              <div class="card-body">
                <div class="col-2 col-md-6">
                  <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td>Jumlah Deposit</td>
                        <td>:</td>
                        <td>Rp. {{ number_format($order->total, 0, ',', '.') }}</td>
                      </tr>
                      <tr>
                        <td>Nomor Rekening</td>
                        <td>:</td>
                        <td>2208 1996 1403</td>
                      </tr>
                      <tr>
                        <td>Nama penerima</td>
                        <td>:</td>
                        <td>Warung Jawa</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer text-body-secondary">
                <div class="row">
                  <div class="col-md-6">
                    <strong>Total Pembayaran</strong>
                  </div>
                  <div class="col-md-6 text-end">
                    <strong>Rp. {{ number_format($order->total, 0, ',', '.') }}</strong>
                  </div>
                </div>
              </div>
            </div>
            <a href="{{ route('success-payment') }}" class="btn btn-info mt-4">Lanjut</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  @push('script')
    <script src="{{ asset('/js/script.js') }}"></script>
  @endpush
@endsection
