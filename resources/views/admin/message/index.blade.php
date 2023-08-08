@extends('layouts.main')

@push('style')
  {{-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> --}}
@endpush

@section('body')
  @include('components.navbar_admin')
  @include('components.spasi')

  <!-- produk -->
  <section id="headerProduk">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-md-12">
          <h3>Pesan</h3>
          <p>Menambahkan pesan informasi kepada pelanggan</p>
        </div>
        <div class="col-md-4">
          <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#pesan">Buat
            Pesan</button>
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
                  <th class="col-md-6">Tanggal Kirim</th>
                  <th class="col-md-6">Pesan</th>
                  <th class="col-md-6">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($messages as $message)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $message->created_at }}</td>
                    <td>{{ $message->message }}</td>
                    <td style="white-space:nowrap">
                      <a href="#"><span class="badge text-bg-danger" data-bs-toggle="modal"
                          data-bs-target="#deleteModal-{{ $message->id }}">Delete</span></a>
                    </td>
                  </tr>
                  <!-- Hapus -->
                  <div class="modal fade" id="deleteModal-{{ $message->id }}" tabindex="-1"
                    aria-labelledby="deleteModal-{{ $message->id }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="deleteModal-{{ $message->id }}Label">Hapus?</h1>
                          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Apakah anda ingin menghapusnya {{ $message->message }}?</div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                          <form action="{{ route('admin.message.destroy', ['message' => $message->id]) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-secondary px-4">Ya</button>
                          </form>

                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </tbody>
            </table>
            <!-- Message -->
            <form action="{{ route('admin.message.store') }}" method="POST">
              @csrf
              <div class="modal fade" id="pesan" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="message" class="form-label">Buat Pesan Untuk User</label>
                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" rows="4">{{ old('message') }}</textarea>
                        @error('message')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-secondary">Kirim</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

   
  </section>
@endsection
