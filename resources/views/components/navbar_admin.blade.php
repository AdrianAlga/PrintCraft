@push('style')
  <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
@endpush

<section id="navbar">
  <div class="container-fluid">
    <nav class="navbar fixed-top">
      <div class="container-fluid">
        <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel" data-bs-display="push">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Admin</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <div class="card">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('admin.index') }}"><i
                        class="bi bi-house-door"></i>
                      Beranda</a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('admin.product.index') }}"><i
                        class="bi bi-cast"></i>
                      Produk</a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('admin.order.index') }}"><i
                        class="bi bi-cart3"></i>
                      Pesanan</a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('admin.message') }}"><i
                        class="bi bi-chat-dots"></i>
                      Message</a>
                  </li>
                </div>
              </div>
              <div class="card mt-2">
                <div class="container">
                  <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('admin.notification') }}"><i
                        class="bi bi-bell"></i>
                      Notifikasi</a>
                  </li>
                </div>
              </div>
            </ul>
          </div>
        </div>
        <div class="btn-group">
          <button type="button" class="btn dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown"
            data-bs-display="static" aria-expanded="false">
            <div class="bg-primary rounded-circle me-2 d-flex align-items-center justify-content-center icn-akun">A
            </div>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a href="{{ route('logout') }}">
                <button class="dropdown-item logout" type="button">
                  Logout
                </button>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</section>
