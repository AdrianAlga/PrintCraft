@extends('layouts.main')

@push('style')
  {{-- <link rel="stylesheet" href="{{ asset('/css/admin.css') }}"> --}}
@endpush

@section('body')
  @include('components.navbar_admin')
  @include('components.spasi')

  <!-- produk -->
  <section id="headerProduk">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-md-12">
          <h3>Produk</h3>
          <p>menambah, mengedit, atau menghapus produk</p>
        </div>
        <div class="col-md-4">
          <a href="{{ route('admin.product.create') }}"><button type="button" class="btn">Buat
              Produk</button></a>
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
            <table class="table table-dark border-2 border table-bordered text-center">
              <thead>
                <tr>
                  <th class="col-md-0">No.</th>
                  <th class="col-md-4">Nama Produk</th>
                  <th class="col-md-4">Harga</th>
                  <th class="col-md-4">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->name }}</td>
                    <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>
                      <a href="{{ route('admin.product.show', ["product" => $product->id]) }}"><span class="badge text-bg-info text-white">Informasi</span></a>
                      <a href="{{ route('admin.product.edit', ["product" => $product->id]) }}"><span class="badge text-bg-warning text-white">Edit Produk</span></a>
                      <a href="#"><span class="badge text-bg-danger" data-bs-toggle="modal"
                          data-bs-target="#deleteModal-{{ $product->id }}">Delete</span></a>
                    </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="deleteModal-{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModal-{{ $product->id }}Label"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="deleteModal-{{ $product->id }}Label">Peringatan</h1>
                          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Apakah anda ingin menghapusnya {{ $product->name }}?</div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                          <form action="{{ route('admin.product.destroy', ['product' => $product->id]) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-secondary px-3">Ya</button>
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
