const content = document.querySelector(".setting-content");
const profile = document.querySelector("#profile");
const notifications = document.querySelector("#notifications");
const membership = document.querySelector("#membership");
const password = document.querySelector("#password");

profile.addEventListener("click", () => {content.innerHTML = `<setting-profile></setting-profile>`; active(profile);});
notifications.addEventListener("click", () => {content.innerHTML = `<setting-notifications></setting-notifications>`;active(notifications);});
membership.addEventListener("click", () => {content.innerHTML = `<setting-membership></setting-membership>`; active(membership);});
password.addEventListener("click", () => {content.innerHTML = `<setting-password></setting-password>`;active(password);});

function active(element) {
  (document.querySelector('.active')).classList.remove('active');
  element.classList.add('active');
}