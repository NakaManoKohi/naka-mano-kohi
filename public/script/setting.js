const content = document.querySelector(".setting-content");
(document.querySelector("#profile")).addEventListener("click", () => {content.innerHTML = `<setting-profile></setting-profile>`});
(document.querySelector("#notifications")).addEventListener("click", () => {content.innerHTML = `<setting-notifications></setting-notifications>`});