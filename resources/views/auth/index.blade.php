@extends('auth.templates.main')

@section('container')
		{{-- <div class="row h-100 w-100 position-absolute d-flex justify-content-center" style="z-index:-99">
	<div class="p-0 bg-primary">
<div class="col-lg-12 d-flex justify-content-center align-items-center bg-brown" style="box-shadow: 10px 10px #000; height: 387px">
			<img class="mb-4 w-50" src="/images/Naka_Mano_Kohi_yellow.png" alt="kohi-logo">
		</div
	</div>
	<div class="col-7 p-0 bg-secondary">
 <div class="col-lg-12 bg-yellow d-flex justify-content-center align-items-center" style="box-shadow: 0 10px #000">
			<form class="w-50">
				<h1 class="h3 mb-3 fw-bold">Masuk Kohiverse</h1>
				<div class="form-floating">
					<input type="email" class="form-control mb-4 rounded-0 border-0" id="floatingInput" placeholder="name@example.com">
					<label for="floatingInput">Email address</label>
				</div>
				<div class="form-floating">
					<input type="password" class="form-control mb-4 rounded-0 border-0" id="floatingPassword" placeholder="Password">
					<label for="floatingPassword">Password</label>
				</div>
				<button class="w-50 btn btn-lg btn-brown rounded-0 mb-3 text-white fs-5" type="submit">Shot</button>
				<p class="fs-5">Buat Akun Kopi Mu! <span class="text-primary">Shot It</span></p>
				Make your own button effect
				<p class="text-muted">&copy; Naka Mano Kohi 2022</p>
			</form>
		</div>
	</div>
</div>
 <div class="form-container d-flex align-items-center justify-content-center w-100 h-100">
	<div class="d-flex align-items-center form-container flex-row" style="height: 400px">
		<div class="bg-primary h-100">
			<img class="mb-4 w-50" src="/images/Naka_Mano_Kohi_yellow.png" alt="kohi-logo">
		</div>
		<div class="bg-info w-100 h-100 d-flex justify-content-center">
			<form class="w-75">
				<h1 class="h3 mb-3 fw-bold">Masuk Kohiverse</h1>
				<div class="form-floating">
					<input type="email" class="form-control mb-4 rounded-0 border-0" id="floatingInput" placeholder="name@example.com">
					<label for="floatingInput">Email address</label>
				</div>
				<div class="form-floating">
					<input type="password" class="form-control mb-4 rounded-0 border-0" id="floatingPassword" placeholder="Password">
					<label for="floatingPassword">Password</label>
				</div>
				<button class="w-50 btn btn-lg btn-brown rounded-0 mb-3 text-white fs-5" type="submit">Shot</button>
				<p class="fs-5">Buat Akun Kopi Mu! <span class="text-primary">Shot It</span></p>
				Make your own button effect
				<p class="text-muted">&copy; Naka Mano Kohi 2022</p>
			</form>
		</div>
	</div>
</div> --}}
<div class="h-100 w-100 d-flex align-items-center justify-content-center position-absolute" style="z-index:-99">
	<div class="row h-100 w-100">
		{{-- <div class="form-container" style="400px"> --}}
			<div class="col-5 p-0 bg-brown h-100 d-flex justify-content-center align-items-center">\

			</div>
			<div class="col-7 p-0 bg-secondary h-100 d-flex justify-content-center align-items-center">

			</div>
		{{-- </div> --}}
	</div>
</div>
<div class="h-100 d-flex align-items-center justify-content-center">
	<div class="row w-100 d-flex justify-content-center" style="height: 400px">
		<div class="form-container d-flex flex-row" style="width:700px">
			<div class="col-5 bg-brown h-100 d-flex justify-content-center align-items-center" style="margin-right: -2px; box-shadow:10px 10px #000">
				<img class="mb-4 w-50" src="/images/Naka_Mano_Kohi_yellow.png" alt="kohi-logo">
			</div>
			<div class="col-7 p-0 bg-yellow h-100 d-flex justify-content-center align-items-center" style="box-shadow: 10px 10px #000">
				<form class="w-75">
					<h1 class="h3 mb-3 fw-bold">Masuk Kohiverse</h1>
					<div class="form-floating">
						<input type="email" class="form-control mb-4 rounded-0 border-0" id="floatingInput" placeholder="name@example.com">
						<label for="floatingInput">Email address</label>
					</div>
					<div class="form-floating">
						<input type="password" class="form-control mb-4 rounded-0 border-0" id="floatingPassword" placeholder="Password">
						<label for="floatingPassword">Password</label>
					</div>
					<button class="w-50 btn btn btn-brown rounded-0 mb-3 text-white fs-6" type="submit">Shot</button>
					<p class="fs-5">Buat Akun Kopi Mu! <span class="text-primary">Shot It</span></p>
					Make your own button effect
					<p class="text-muted">&copy; Naka Mano Kohi 2022</p>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection