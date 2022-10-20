@extends('setting.templates.main')
@section('settingContent')
  <div class="d-flex flex-column gap-3 h-100">
    <h4 class="border-bottom border-3 border-dark pb-1">Notifications</h4>
    <div class="h-100">
      <div class="card d-flex flex-column border border-5 border-yellow bg-secondary-grey h-100 overflow-auto">
        <div class="col-12 bg-white p-3 setting-message border border-2 border-dark d-flex align-items-start">
          <img src="/images/lilgru.jpg" alt="profile.jpg" class="border border-3 border-dark rounded-circle me-3">
          <div class="d-flex flex-column me-auto">
            <p><span>Lil Gru</span> to <span>Uraracak</span></p>
            <p>Mesaage</p>
          </div>
          <div class="d-flex flex-column align-self-right text-end">
            <p>08/09/2022</p>
            <p>15:27</p>
            <p>Sent</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection