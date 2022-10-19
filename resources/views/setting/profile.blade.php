@extends('setting.templates.main')
@section('settingContent')
  <div class="d-flex flex-column gap-3">
    <h4 class="border-bottom border-3 border-dark pb-1">Profile</h4>
    <div class="col-12 d-flex justify-content-center pb-3">
      <img src="/images/lilgru.jpg" alt="profile.jpg" width="200" class="rounded-circle border border-3 border-dark">
    </div>
    <form class="col-12 d-flex flex-wrap gap-3">
      <input type="text" name="" id="" class="gap-halfed-width border border-3 border-dark rounded bg-secondary-grey p-2">
      <input type="text" name="" id="" class="gap-halfed-width border border-3 border-dark rounded bg-secondary-grey p-2">
      <input type="text" name="" id="" class="gap-halfed-width border border-3 border-dark rounded bg-secondary-grey p-2">
      <input type="text" name="" id="" class="gap-halfed-width border border-3 border-dark rounded bg-secondary-grey p-2">
      <textarea name="" id="" rows="5" class="col-12 border border-3 border-dark rounded bg-secondary-grey p-2"></textarea>
      <button class="col-3 ms-auto button button-brown mb-3 fw-bold border border-3 border-dark rounded" type="submit">Update</button>
    </form>
  </div>
@endsection
