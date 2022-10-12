@extends('auth.templates.main')

@section('container')
<div class="d-flex h-100 col-12 position-absolute" style="z-index:-99">
	<div class="h-100 bg-brown bg-form-margin"></div>
	<div class="col-8">
		<div class="h-100 bg-brown col-5"></div>
	</div>
</div>
<div class="coffee-img position-absolute coffee-img-top"></div>
<div class="coffee-img position-absolute coffee-img-bottom"></div>

	<div class="w-100 d-flex align-items-center h-100">
		<div class="d-flex align-items-stretch col-8 container-form">
			<div class="img-column col-md-5 bg-brown d-flex justify-content-center align-items-center auth-box-shadow">
				<img class="mb-4 w-50" src="/images/Naka_Mano_Kohi_yellow.png" alt="kohi-logo">
			</div>
			<div class="form-column col-md-7 p-0 bg-yellow d-flex justify-content-center align-items-center auth-box-shadow">
				<form class="w-75" action="/login" method="post">
					<h1 class="h3 mb-3 fw-bold">Masuk Kohiverse</h1>
					@if(session()->has('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ session('success') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
					</div>
					@endif

					@if(session()->has('loginError'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{ session('loginError') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					  </div>
					@endif
					@csrf
					<div class="form-floating mb-3">
						<input type="email" class="form-control rounded-0 border-0" id="floatingInput" placeholder="name@example.com" name="email" autofocus required value="{{ old('email') }}">
						<label for="floatingInput">Email address</label>
						@error('email')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-floating">
						<input type="password" class="form-control mb-4 rounded-0 border-0" id="floatingPassword" placeholder="Password" name="password" required>
						<label for="floatingPassword">Password</label>
						@error('password')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<button class="w-50 button button-brown mb-3 fs-5" type="submit">Shot</button>
					<p class="fs-5">Buat Akun Kopi Mu! <a href="/register" class="text-primary text-decoration-none">Shot It</a></p>
					{{-- Make your own button effect --}}
					<p class="text-muted">&copy; Naka Mano Kohi 2022</p>
				</form>
			</div>
		</div>
	</div>
@endsection