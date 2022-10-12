@extends('auth.templates.main')

@section('container')
	<div class="w-100 d-flex align-items-center h-100" id="form-wrapper">
		<div class="container-form d-flex flex-row col-9">
			<div class="img-column col-5 bg-brown d-flex justify-content-center align-items-center auth-box-shadow">
				<img class="mb-4 w-50" src="/images/Naka_Mano_Kohi_yellow.png" alt="kohi-logo">
			</div>
			<div class="form-column col-7 p-0 bg-yellow d-flex justify-content-center align-items-center p-3 auth-box-shadow">
				<form class="w-75" action="/register" method="post">
					@csrf
					<h1 class="mb-3 fw-bold">Buat Akun</h1>
					<div class="form-floating mb-3">
						<input type="text" class="form-control rounded-0 border-0 @error('name') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="name" value="{{ old('name') }}" autofocus required>
						<label for="floatingInput">Name</label>
						@error('email')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-floating mb-3">
						<input type="text" class="form-control rounded-0 border-0 @error('username') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="username" value="{{ old('username') }}" required>
						<label for="floatingInput">Username</label>
						@error('username')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-floating mb-3">
						<input type="email" class="form-control rounded-0 border-0 @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}" required>
						<label for="floatingInput">Email</label>
						@error('email')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-floating mb-3 ">
						<input type="password" class="form-control rounded-0 border-0 @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required>
						<label for="floatingPassword">Password</label>
						@error('password')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<button class="w-50 button button-brown mb-3 fs-5" type="submit">Shot</button>
					<p class="fs-5">Akun nya udah ada? <a href="/login" class="text-primary text-decoration-none">Tamping</a></p>
					{{-- Make your own button effect --}}
					<p class="text-muted m-0">&copy; Naka Mano Kohi 2022</p>
				</form>
			</div>
		</div>
	</div>
@endsection