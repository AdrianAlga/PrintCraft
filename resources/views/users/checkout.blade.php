@extends('layouts.main')

@section('body')
  <div id="etalase">
    <div class="container-fluid">
      <div class="row my-3">
        <div class="col-6">
          <a href="{{ route('home') }}">
            <h2><i class="bi bi-arrow-left text-dark"></i></h2>
          </a>
        </div>
      </div>
      <div class="row shadow border rounded-3 p-5 justify-content-around">
        <div class="col-md-12 text-center mb-5">
          <h1>CHECKOUT</h1>
        </div>
        <div class="col-md-7">
          <table class="table align-middle text-center border">
            <thead class="align-content-center">
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Jumlah Porsi</th>
                <th scope="col">Harga</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @php
                $total = 0;
              @endphp
              @foreach ($carts as $cart)
                <tr>
                  <td class="col-2"><img src="{{ asset('storage/' . $cart->product->image) }}" alt="img"
                      height="50px" /></td>
                  <td class="col-5">{{ $cart->product->name }}</td>
                  <td class="col-5">{{ $cart->amount }}</td>
                  <td class="col-3" style="white-space: nowrap">Rp. {{ number_format($cart->amount * $cart->product->price, 0, ',', '.') }}</td>
                  <td class="col-1">
                    <form action="{{ route('destroyCart', ['cart' => $cart->id]) }}" method="post">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn-close text-dark"
                        style="font-size: 10px"aria-label="Close"></button>
                    </form>
                  </td>
                </tr>
                @php
                  $total += $cart->amount * $cart->product->price;
                @endphp
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td class="fw-bold">Total</td>
                <td colspan="4" class="fw-bold text-end">Rp. {{ number_format($total, 0, ',', '.') }}</td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="col-md-5 border shadow p-3">
          <h3 class="mb-5 text-center">Informasi Pembeli:</h3>
          <div class="user-checkout">
            <form action="{{ route('order.product') }}" method="POST">
              @csrf
              <input type="hidden" name="total" value="{{ $total }}">
            @foreach ($carts as $cart)
                <input type="hidden" name="carts[]" value="{{ $cart->id }}">
                <input type="hidden" name="amounts[]" value="{{ $cart->amount }}">
                <input type="hidden" name="products_id[]" value="{{ $cart->product->id }}">
              @endforeach
              <div class="form-group">
                <label for="namaLengkap">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" id="namaLengkap" aria-describedby="namaHelp" required />
              </div>
              <div class="form-group">
                <label for="namaLengkap">Telepon</label>
                <input type="number" name="phone" class="form-control" id="noHP" aria-describedby="noHPHelp" required />
              </div>
              <div class="form-group">
                <label for="alamatLengkap">Alamat Lengkap</label>
                <textarea class="form-control" name="address" id="alamatLengkap" rows="3" required></textarea>
              </div>
              <div class="col-md my-3">
                <p>Pilih Pembayaran</p>
              </div>
              <div class="col-md-12 pb-4">
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button bg-white" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Virtual
                        Account</button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                      data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row">
                          <div class="col-6 col-md-10 p-3">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="payment" value="1" id="payment1" required/>
                              <label class="form-check-label" for="payment1">
                                <div><img src="{{ asset('/images/payment1.png') }}" alt="dm"
                                    class="img-fluid border-bottom border-3" style="height: 50px" /></div>
                              </label>
                            </div>
                          </div>
                          <div class="col-6 col-md-10 p-3">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="payment" value="2" id="payment2" required/>
                              <label class="form-check-label" for="payment2">
                                <div><img src="{{ asset('/images/payment2.png') }}" alt="dm"
                                    class="img-fluid border-bottom border-3" style="height: 50px" /></div>
                              </label>
                            </div>
                          </div>
                          <div class="col-6 col-md-10 p-3">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="payment" value="3" id="payment3" required/>
                              <label class="form-check-label" for="payment3">
                                <div><img src="{{ asset('/images/payment3.png') }}" alt="dm"
                                    class="img-fluid border-bottom border-3" style="height: 50px" /></div>
                              </label>
                            </div>
                          </div>
                          <div class="col-6 col-md-10 p-3">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="payment" value="4" id="payment4" required/>
                              <label class="form-check-label" for="payment4">
                                <div><img src="{{ asset('/images/payment4.png') }}" alt="dm"
                                    class="img-fluid border-bottom border-3" style="height: 50px" /></div>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="row pb-3">
                  <button type="submit" class="btn btn-info fw-bold text-white">Checkout</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('script')
    <script src="{{ asset('/js/script.js') }}"></script>
  @endpush
@endsection
