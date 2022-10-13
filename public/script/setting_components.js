class SettingProfile extends HTMLElement {
  constructor() {
    super();
    this.create();
  }

  create() {
    this.innerHTML = `
    <div class="d-flex flex-column gap-3">
      <h4 class="border-bottom border-3 border-dark pb-1">Profile</h4>
      <div class="col-12 d-flex justify-content-center pb-3">
        <img src="images/lilgru.jpg" alt="profile.jpg" width="200" class="rounded-circle border border-3 border-dark">
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
    `;
  }
}

class SettingNotifications extends HTMLElement {
  constructor() {
    super();
    this.create();
  }

  create() {
    this.innerHTML = `
    <div class="d-flex flex-column gap-3 h-100">
      <h4 class="border-bottom border-3 border-dark pb-1">Notifications</h4>
      <div class="h-100">
        <div class="card d-flex flex-column border border-5 border-yellow bg-secondary-grey h-100 overflow-auto">
          <div class="col-12 bg-white p-3 setting-message border border-2 border-dark d-flex align-items-start">
            <img src="images/lilgru.jpg" alt="profile.jpg" class="border border-3 border-dark rounded-circle me-3">
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
    `;
  }
}

customElements.define('setting-profile', SettingProfile);
customElements.define('setting-notifications', SettingNotifications);