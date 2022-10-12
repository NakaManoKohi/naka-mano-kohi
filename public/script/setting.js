const content = document.querySelector(".setting-content");
const profile = document.querySelector("#profile");
const notifications = document.querySelector("#notifications");

profile.addEventListener("click", () => {content.innerHTML = `<setting-profile></setting-profile>`; active(profile);});
notifications.addEventListener("click", () => {content.innerHTML = `<setting-notifications></setting-notifications>`;active(notifications);});

function active(element) {
  (document.querySelector('.active')).classList.remove('active');
  element.classList.add('active');
}