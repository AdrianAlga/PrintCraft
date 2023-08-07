@extends('layouts.main')

@section('body')
  @include('components.navbar')
  <section id="product" class="pb-5">
    <div class="container font-txt mb-4">
      <div class="row my-3">
        <div class="col-md-12">
          <div class="container">
            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-8 text-center">
                <h4 class="font-txt fw-bold ms-3 py-1">Inbox</h4>
              </div>
              <div class="col-2"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          @foreach ($messages as $message)
            <div class="border border-end-0 border-start-0 border-top-0 mb-3">
              <button data-bs-toggle="modal" data-bs-target="#messageModal-{{ $message->id }}"
                class="bg-transparent w-100 border-0">
                <div class="row">
                  <div class="col-1">
                    <div>
                      <img src="{{ asset('images/logo.png') }}" alt="img" height="50px" width="50px"
                        class="rounded-circle" />
                    </div>
                  </div>
                  <div class="col-11">
                    <div class="container">
                      <div class="row">
                        <div class="col-12 text-start">
                          <h5 class="fw-bold">Warung Jawa</h5>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 text-start">{{ $message->message }}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="messageModal-{{ $message->id }}" tabindex="-1"
              aria-labelledby="messageModal-{{ $message->id }}Label" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <div class="container">
                      <div class="row">
                        <div class="col-12 text-center">
                          <h1 class="modal-title fs-5" id="messageModal-{{ $message->id }}Label">Notifikasi</h1>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-body">{{ $message->message }}</div>
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
    <div class="row fixed-bottom ps-3" style="margin-bottom: 100px">
      <div class="con-12">
        <div class="container-fluid">
          <div class="row">
            <div class="col-3 me-auto">
              <div>
                <img class="whatsapp" src="{{ asset('images/whatsapp.png') }}" alt="img" height="50px"
                  onclick="openWhatsApp()">
              </div>
            </div>
            <div class="col-3 text-end">
              <button class="btn p-0 " data-bs-toggle="modal" data-bs-target="#operator">
                <img src="{{ asset('images/operator.png') }}" alt="img" height="50px">
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Contact operator-->
    <form action="">
      <div class="modal fade" id="operator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-6"></div>
                  <div class="col-6">
                    <div class="d-flex align-items-center justify-content-end">
                      <p class="m-0 pe-2 txt-justify">Hello! lore</p>
                      <img src="{{ asset('images/user.png') }}" alt="img" height="50px"
                        class="rounded-circle bg-secondary align-self-start ">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="d-flex align-items-center">
                      <img src="{{ asset('images/operator.png') }}" alt="img" height="50px"
                        class="rounded-circle bg-secondary align-self-start ">
                      <p class="m-0 ps-2 txt-justify">Hello! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur
                        nostrum iusto consequuntur voluptatibus molestiae, nihil voluptates iure vitae quaerat aliquam
                        reiciendis dicta ipsum, tempora eum sequi totam at expedita temporibus?</p>
                    </div>
                  </div>
                  <div class="col-6"></div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="container">
                <div class="row">
                  <div class="col-10">
                    <input type="text" class="form-control w-100" id="operator">
                  </div>
                  <div class="col-2 text-center">
                    <button type="button" class="btn btn-primary">Kirim</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
@endsection
