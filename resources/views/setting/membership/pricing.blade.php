@extends('setting.templates.main')
@section('settingContent')
  <div class="d-flex flex-column h-100">
    <h4 class="border-bottom border-3 border-dark pb-1 mb-3">Membership</h4>
    <div class="flex-fill d-flex">
      <div class="col-4 pe-2">
        <div class="card card-body bg-brown h-100 d-flex flex-column overflow-hidden">
          <h2 class="text-white text-center mb-0">Bronze</h2>
          <div class="card-body text-white">
            <p>Benefits :</p>
            <ul>
              <li>Lorem</li>
              <li>Ipsum</li>
              <li>Dolore</li>
            </ul>
          </div>
          <button class="btn btn-primary">$50 / Month</button>
        </div>
      </div>
      <div class="col-4 px-1">
        <div class="card card-body bg-secondary-grey h-100 d-flex flex-column overflow-hidden">
          <h2 class="text-dark text-center mb-0">Silver</h2>
          <div class="card-body text-dark">
            <p>Benefits :</p>
            <ul>
              <li>Lorem</li>
              <li>Ipsum</li>
              <li>Dolore</li>
            </ul>
          </div>
          <button class="btn btn-primary">$100 / Month</button>
        </div>
      </div>
      <div class="col-4 ps-2">
        <div class="card card-body bg-yellow h-100 d-flex flex-column overflow-hidden">
          <h2 class="text-brown text-center mb-0">Gold</h2>
          <div class="card-body text-brown">
            <p>Benefits :</p>
            <ul>
              <li>Lorem</li>
              <li>Ipsum</li>
              <li>Dolore</li>
            </ul>
          </div>
          <button class="btn btn-primary">$200 / Month</button>
        </div>
      </div>
    </div>
  </div>
@endsection