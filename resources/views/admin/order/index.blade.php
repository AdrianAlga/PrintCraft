@extends('layouts.main')

@push('style')
  {{-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> --}}
@endpush

@section('body')
  @include('components.navbar_admin')
  @include('components.spasi')

  <!-- produk -->
  <section id="headerPesanan">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-md-12">
          <h3>Pesanan</h3>
          <p>Informasi Pesanan Pembelian Produk</p>
        </div>
      </div>
    </div>
  </section>

  <!-- alerts -->
  <div id="liveAlertPlaceholder"></div>

  <!-- End Alerts -->

  <section class="produk">
    <div class="container-fluid card shadow my-3">
      <div class="row">
        <div class="col-md-12 p-4">
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <th class="col-md-0">No.</th>
                  <th class="col-md-4">Tanggal Pemesanan</th>
                  <th class="col-md-4">Nama Pemesan</th>
                  <th class="col-md-4">Action</th>
                  <th class="col-md-4">Comfirm</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->name }}</td>
                    <td>
                      <a href="{{ route('admin.order.show', ['order' => $order->id]) }}"><span
                          class="badge text-white text-bg-info">Informasi</span></a>
                      <button class="p-0  border-0 bg-transparent">
                        <span class="badge text-bg-danger" data-bs-toggle="modal"
                          data-bs-target="#deleteModal-{{ $order->id }}">Delete</span>
                      </button>
                    </td>
                    <td>

                      <div class="dropdown">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          {{ $order->status }}
                        </button>
                        <ul class="dropdown-menu">
                          <li>
                            <a class="dropdown-item">
                              <form action="{{ route('status.update', ['order' => $order->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="status" value="success" class="d-none">
                                <button type="submit" class="btn d-inline">
                                  Konfimasi
                                </button>
                              </form>
                            </a>
                          </li>
                          <li>
                            <a class="dropdown-item">
                              <form action="{{ route('status.update', ['order' => $order->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="status" value="failed" class="d-none">
                                <button type="submit" class="btn d-inline">
                                  Tolak
                                </button>
                              </form>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="deleteModal-{{ $order->id }}" tabindex="-1"
                    aria-labelledby="deleteModal-{{ $order->id }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="deleteModal-{{ $order->id }}Label">Peringatan</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Apakah anda ingin menghapusnya {{ $order->name }}?</div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                          <form action="{{ route('admin.order.destroy', ['order' => $order->id]) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary px-4">Ya</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
