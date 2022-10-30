// Modal Suspend user Jquery
const suspendUserButton = document.querySelectorAll('#suspendUser');
// const suspendUserUsername = suspendUserButton.getAttribute('data-id');

const activateUserButton = document.querySelectorAll('#activateUser');
// const activateUserUsername = activateUserButton.getAttribute('data-id');

const modalLabel = document.getElementById('modalTitle');

const confirmButtonModal = document.getElementById('confirm');


// $(suspendUserButton).on("click", ()=>{
// })

$(document).ready(() => {
    suspendUserButton.forEach(suspendButton => {
        suspendButton.addEventListener('click', ()=>{
            let userUsername = suspendButton.getAttribute('data-id');
            modalLabel.innerText = 'Suspend User'
            confirmButtonModal.setAttribute('href', '/dashboard/user/' + userUsername + '/suspend');
        });
    });

    activateUserButton.forEach(activateButton => {
        activateButton.addEventListener('click', ()=>{
            let userUsername = activateButton.getAttribute('data-id');
            modalLabel.innerText = 'Activate User'
            confirmButtonModal.setAttribute('href', '/dashboard/user/' + userUsername + '/activate');
        });
        // console.log(activateButton);
    });
})

const title = document.querySelector('#title');
const slug = document.querySelector('#slug');

title.addEventListener('change', function(){
    fetch('/dashboard/blog/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
})

const caption = document.querySelector('#caption');

caption.addEventListener('change', function(){
    fetch('/post/checkSlug?caption=' + caption.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
})