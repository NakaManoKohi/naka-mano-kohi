class Setting {
  constructor(data) {
    data = data.replace(/&quot;/g, `"`)
    data = JSON.parse(data);
    console.log(data);
    const container = document.querySelector(".setting-content");
    const hash = window.location.hash;
    const general = document.querySelector("[data='general']");
    const profile = document.querySelector("[data='profile']");
    const notifications = document.querySelector("[data='notifications']");
    const membership = document.querySelector("[data='membership']");
    const password = document.querySelector("[data='password']");
    this.event([general, profile, notifications, membership, password]);
    if(hash.includes('#profile')) {
      this.content(container, 'setting-profile', profile, data);
    } else if(hash.includes('#notifications')) {
      this.content(container, 'setting-notifications', notifications);
    } else if(hash.includes('#membership')) {
      this.content(container, 'setting-membership', membership);
    } else if(hash.includes('#password')) {
      this.content(container, 'setting-password', password);
    } else {
      this.content(container, 'setting-general', general);
    }
  }

  event(navItems) {
    navItems.forEach(item => {
      item.addEventListener('click', () => {
        window.location.hash=`#${item.getAttribute('data')}`;
        window.location.reload();
      })
    });
  }

  content(container, element, elementNav, data = null) {
    let el = document.createElement(`${element}`);
    el.data = data;
    container.appendChild(el);
    this.active(elementNav);
  }

  active(elementNav) {
    elementNav.classList.add('active');
  }
}
new Setting(user)