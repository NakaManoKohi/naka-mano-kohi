@extends('setting.templates.main')
@section('settingContent')
<div class="d-flex flex-column gap-3">
  <h4 class="border-bottom border-3 border-dark pb-1">Profile</h4>
  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-8" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
  @endif
    <div class="d-flex">
      <form action="/setting/profile/{{ auth()->user()->username }}" method="post" class="col-8 d-flex flex-column gap-3 pe-2">
        @method('put')
        @csrf
        <input type="text" name="name" id="" class="border border-3 border-dark rounded bg-secondary-grey p-2" value="{{ auth()->user()->name }}">
        <input type="text" name="username" id="" class="border border-3 border-dark rounded bg-secondary-grey p-2"value="{{ auth()->user()->username }}">
        <input type="text" name="email" id="" class="border border-3 border-dark rounded bg-secondary-grey p-2" value="{{ auth()->user()->email }}">
        <input type="text" name="" id="" class="border border-3 border-dark rounded bg-secondary-grey p-2" placeholder="Input nama Bapak lo">
        <textarea name="" id="" rows="4" class="col-12 border border-3 border-dark rounded bg-secondary-grey p-2" placeholder="Ceritakan kekuranganmu disini..."></textarea>
        <button class="col-3 ms-auto button button-brown mb-3 fw-bold border border-3 border-dark rounded" type="submit">Update</button>
      </form>
      <div class="col-4 d-flex flex-column justify-content-start align-items-center pb-3 ps-2">
        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="profile.jpg" width="200" class="rounded-circle border border-3 border-dark" height="200">
        <form action="/setting/profile/updateProfileImage/{{ auth()->user()->username }}" method="post" enctype="multipart/form-data" class="d-flex flex-column p-3">
          @method('put')
          @csrf
          <label for="files" class="mb-2">Upload Image</label>
          <input id="files" type="file" name="image" class="@error('image') is-invalid @enderror">
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <button class="btn btn-primary mt-3" type="submit">Change</button>
        </form>
      </div>
    </div>
  </div>
@endsection
