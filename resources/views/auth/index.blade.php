@extends('auth.templates.main')

@section('container')
<div class="h-100 w-100 d-flex align-items-center justify-content-center position-absolute" style="z-index:-99">
	<div class="row h-100 w-100">
		{{-- <div class="form-container" style="400px"> --}}
			<div class="left-side-decoration col-3 p-0 bg-brown h-100 d-flex justify-content-center align-items-center" style="box-shadow:0 10px rgba(0,0,0,0,0.3)">

			</div>
			<div class="col-9 p-0 bg-white h-100 d-flex justify-content-center align-items-center">

			</div>
		{{-- </div> --}}
	</div>
</div>
<div class="h-100 d-flex align-items-center justify-content-center">
	<div class="row w-100 d-flex justify-content-center" style="height: 500px">
		<div class="form-container d-flex flex-row w-75">
			<div class="img-column col-md-5 bg-brown h-100 d-flex justify-content-center align-items-center auth-box-shadow">
				<img class="mb-4 w-50" src="/images/Naka_Mano_Kohi_yellow.png" alt="kohi-logo">
			</div>
			<div class="form-column col-md-7 p-0 bg-yellow h-100 d-flex justify-content-center align-items-center auth-box-shadow">
				<form class="w-75" action="/login" method="post">
					@csrf
					<h1 class="h3 mb-3 fw-bold">Masuk Kohiverse</h1>
					<div class="form-floating">
						<input type="email" class="form-control mb-4 rounded-0 border-0" id="floatingInput" placeholder="name@example.com">
						<label for="floatingInput">Email address</label>
					</div>
					<div class="form-floating">
						<input type="password" class="form-control mb-4 rounded-0 border-0" id="floatingPassword" placeholder="Password">
						<label for="floatingPassword">Password</label>
					</div>
					<button class="w-50 button button-brown mb-3 fs-5" type="submit">Shot</button>
					<p class="fs-5">Buat Akun Kopi Mu! <a href="/register" class="text-primary text-decoration-none">Shot It</a></p>
					{{-- Make your own button effect --}}
					<p class="text-muted">&copy; Naka Mano Kohi 2022</p>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection