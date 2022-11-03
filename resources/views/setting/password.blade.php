@extends('setting.templates.main')
@section('settingContent')
@if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show col-8" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
  </div>
@endif
@if(session()->has('failed'))
  <div class="alert alert-danger alert-dismissible fade show col-8" role="alert">
      {{ session('failed') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
  </div>
@endif
<h1 class="mb-4">Change Password</h1>
<form action="/setting/password/{{ auth()->user()->username }}" method="post" class="col-8 d-flex flex-column gap-3 pe-2">
    @method('put')
    @csrf
    <input type="password" name="current_password" id="" class="border border-3 border-dark rounded bg-secondary-grey p-2 @error('current_password') is-invalid @enderror" placeholder="Current Password">
    @error('current_password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
    <input type="password" name="password" id="" class="border border-3 border-dark rounded bg-secondary-grey p-2 @error('password') is-invalid  @enderror" placeholder="Password">
    @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
    <input type="password" name="confirm_password" id="" class="border border-3 border-dark rounded bg-secondary-grey p-2" placeholder="Confirm Password">
    <button class="col-3 ms-auto button button-brown mb-3 fw-bold border border-3 border-dark rounded" type="submit">Update</button>
  </form>
@endsection