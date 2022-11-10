@extends('setting.templates.main')
@section('settingContent')
  <div class="d-flex flex-column h-100">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif
    <h4 class="border-bottom border-3 border-dark pb-1 mb-3">Membership</h4>
    <div class="flex-fill d-flex">
      <div class="col-4 pe-2">
        <div class="card card-body bg-brown h-100 d-flex flex-column overflow-hidden">
          <h2 class="text-white text-center mb-0">Bronze</h2>
          <div class="card-body text-white">
            <p>Benefits :</p>
            <ul>
              <li>Lorem</li>
            </ul>
          </div>
          {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#purchaseModal" id="bronzePurchase" data-id="{{ auth()->user()->username }}">25k / Month</button> --}}
          <a href="/setting/{{ auth()->user()->username }}/bronze" class="btn btn-primary" onclick="return confirm('Are You sure?')">25k/Month</a>
        </div>
      </div>
      <div class="col-4 px-1">
        <div class="card card-body bg-secondary-grey h-100 d-flex flex-column overflow-hidden">
          <h2 class="text-dark text-center mb-0">Silver</h2>
          <div class="card-body text-dark">
            <p>Benefits :</p>
            <ul>
              <li>Make a Blog</li>
            </ul>
          </div>
          {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#purchaseModal" id="silverPurchase" data-id="{{ auth()->user()->username }}">50k / Month</button> --}}
          <a href="/setting/{{ auth()->user()->username }}/silver" class="btn btn-primary" onclick="return confirm('Are You sure?')">50k/Month</a>
        </div>
      </div>
      <div class="col-4 ps-2">
        <div class="card card-body bg-yellow h-100 d-flex flex-column overflow-hidden">
          <h2 class="text-brown text-center mb-0">Gold</h2>
          <div class="card-body text-brown">
            <p>Benefits :</p>
            <ul>
              <li>Make an Event</li>
            </ul>
          </div>
          <a href="/setting/{{ auth()->user()->username }}/gold" class="btn btn-primary" onclick="return confirm('Are You sure?')">100k/Month</a>
          {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#purchaseModal" id="goldPurchase" data-id="{{ auth()->user()->username }}">100k / Month</button> --}}
        </div>
      </div>
    </div>
  </div>
  {{-- Modal --}}
  <div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="purchaseModalLable" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalTitle"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are You sure?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a class="text-decoration-none text-white btn btn-primary" id="confirm">Yes</a>
        </div>
      </div>
    </div>
  </div>
@endsection