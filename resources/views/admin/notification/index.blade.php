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
          <h3>Notification</h3>
          <p>Notifikasi costumer, balas pesan dibawah!</p>
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
                  <th class="col-md-3">Tanggal Pesan</th>
                  <th class="col-md-3">Nama</th>
                  <th class="col-md-3">Email</th>
                  <th class="col-md-3">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                      @foreach ($chats as $chat)
                        @if ($chat->sender->id == $user->id)
                          {{ $chat->created_at }}
                          @break
                        @endif
                      @endforeach
                    </td>
                    {{-- <td>2023/07/25</td> --}}
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      <button class="p-0 bg-transparent border-0" data-bs-toggle="modal"
                        data-bs-target="#userDetailModal-{{ $user->id }}"><span
                          class="badge text-bg-info">Informasi</span></button>
                      <button class="p-0 bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#messageModal-{{ $user->id }}"><span
                          class="badge text-bg-info px-3">Pesan</span></button>
                      {{-- <a href="#"><span class="badge text-bg-danger" data-bs-toggle="modal"
                          data-bs-target="#exampleModal">Delete</span></a> --}}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            @foreach ($users as $user)
              <!-- Hapus -->
              {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus?</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Apakah anda ingin menghapusnya?</div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                      <button type="button" class="btn btn-primary">Ya</button>
                    </div>
                  </div>
                </div>
              </div> --}}
              <!-- Modal Contact operator-->
              <div class="modal fade" id="messageModal-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        @foreach ($chats as $chat)
                          @if ($chat->sender->id == $user->id && $chat->recipient->id == auth()->user()->id)
                          {{-- @if ($chat->sender->id != auth()->user()->id) --}}
                            <div class="row">
                              <div class="col-6">
                                <div class="d-flex align-items-center">
                                  <img src="{{ asset('storage/' . $chat->sender->image) }}" alt="img" height="50px"
                                    class="rounded-circle bg-secondary align-self-start ">
                                  <p class="m-0 ps-2 txt-justify">{{ $chat->message }}</p>
                                </div>
                              </div>
                              <div class="col-6"></div>
                            </div>
                          @elseif($chat->sender->id == auth()->user()->id && $chat->recipient->id == $user->id)
                            <div class="row">
                              <div class="col-6"></div>
                              <div class="col-6">
                                <div class="d-flex align-items-center justify-content-end">
                                  <p class="m-0 pe-2 txt-justify">
                                    {{ $chat->message }}
                                  </p>
                                  <img src="{{ asset('storage/' . $chat->sender->image) }}" alt="img" height="50px"
                                    class="rounded-circle bg-secondary align-self-start ">
                                </div>
                              </div>
                            </div>
                          @endif
                        @endforeach
                      </div>
                    </div>
                    <div class="modal-footer">
                      <div class="container">
                        <form action="{{ route('admin.send.chat') }}" method="post">
                          @csrf
                          <input type="hidden" name="recipient_id" value="{{ $user->id }}">
                          <div class="row">
                            <div class="col-10">
                              <input name="message" type="text"
                                class="form-control w-100 @error('message') is-invalid @enderror" id="operator">
                              @error('message')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="col-2 text-center">
                              <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- modal informasi --}}
              <!-- Modal -->
              <div class="modal fade" id="userDetailModal-{{ $user->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi User</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <div class="row">
                          <div class="col-12">
                            <table class="table table-borderless">
                              <thead>
                                <tr>
                                  <th class="col-4"></th>
                                  <th class="col-1"></th>
                                  <th class="col-7"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Nama</td>
                                  <td class="text-center">:</td>
                                  <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                  <td>Jenis Kelamin</td>
                                  <td class="text-center">:</td>
                                  <td>
                                    @if ($user->gender)
                                      {{ $user->gender }}
                                    @else
                                      -
                                    @endif
                                  </td>
                                </tr>
                                <tr>
                                  <td>Email</td>
                                  <td class="text-center">:</td>
                                  <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                  <td>Phone</td>
                                  <td class="text-center">:</td>
                                  <td>
                                    @if ($user->phone)
                                      {{ $user->phone }}
                                    @else
                                      -
                                    @endif
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection
