@extends('setting.templates.main')
@section('settingContent')
  <div class="d-flex flex-column gap-3">
    <h4 class="border-bottom border-3 border-dark pb-1">Profile</h4>
    <div class="d-flex">
      <form class="col-8 d-flex flex-column gap-3 pe-2">
        <input type="text" name="name" id="" class="border border-3 border-dark rounded bg-secondary-grey p-2" value="{{ auth()->user()->name }}">
        <input type="text" name="username" id="" class="border border-3 border-dark rounded bg-secondary-grey p-2"value="{{ auth()->user()->username }}">
        <input type="text" name="email" id="" class="border border-3 border-dark rounded bg-secondary-grey p-2" value="{{ auth()->user()->email }}">
        <input type="text" name="" id="" class="border border-3 border-dark rounded bg-secondary-grey p-2" placeholder="Input nama Bapak lo">
        <textarea name="" id="" rows="5" class="col-12 border border-3 border-dark rounded bg-secondary-grey p-2" placeholder="Ceritakan kekuranganmu disini..."></textarea>
        <button class="col-3 ms-auto button button-brown mb-3 fw-bold border border-3 border-dark rounded" type="submit">Update</button>
      </form>
      <div class="col-4 d-flex justify-content-center pb-3 ps-2">
        <img src="/images/lilgru.jpg" alt="profile.jpg" width="200" class="rounded-circle border border-3 border-dark h-fit">
      </div>
    </div>
  </div>
@endsection
