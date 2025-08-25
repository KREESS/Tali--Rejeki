
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
          <h5 class="mb-1 fw-bold text-danger">Lupa Password</h5>
          <p class="text-muted mb-3">Masukkan email. Jika terdaftar, kami kirim tautan untuk set password baru.</p>

          @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
          @endif

          <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                     value="{{ old('email') }}" placeholder="nama@domain.com" required autofocus>
              @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-danger w-100 fw-bold">Kirim Tautan</button>
          </form>

          <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none">Kembali ke login</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
