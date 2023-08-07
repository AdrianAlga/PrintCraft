<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 class="fs-5 txt-orange font-txt">Keranjang Belanja <i class="bi bi-cart4"></i></h1>
            </div>
          </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container p-0">
          @php
            $total = 0;
          @endphp
          @foreach ($carts as $cart)
            @php
              $total += $cart->product->price * $cart->amount;
            @endphp
            <div class="row border py-3 my-1">
              <div class="col-4">
                <div>
                  <img src="{{ asset('storage/' . $cart->product->image) }}" alt="img" height="80px"
                    width="100%" />
                </div>
              </div>
              <div class="col-8">
                <div class="container h-100">
                  <div class="row align-items-center h-100">
                    <div class="col-12 fw-bold fs-6">
                      <h5>{{ $cart->product->name }}</h5>
                      <h6>Rp. {{ number_format($cart->product->price, 0, ',', '.') }}</h6>
                      <p>Jumlah: {{ $cart->amount }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      <div class="modal-footer">
        <div class="container p-0">
          <div class="row">
            <div class="col-8">
              <div class="container p-0">
                <div class="row">
                  <div class="col-4 fw-bold">
                    <p>Total</p>
                  </div>
                  <div class="col-8 fw-bold">
                    <p>Rp. {{ number_format($total, 0, ',', '.') }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-4 text-end">
              <a href="{{ route('checkout') }}">
                <button type="button" class="btn btn-sm bg-orange text-white">Check Out</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
