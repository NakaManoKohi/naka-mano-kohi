// Modal Suspend user Jquery
const suspendUserButton = document.querySelectorAll('#suspendUser');
const activateUserButton = document.querySelectorAll('#activateUser');
const deleteBlog = document.querySelectorAll('#deleteBlog');
const deleteEvent = document.querySelectorAll('#deleteEvent');

const modalLabel = document.getElementById('modalTitle');
const confirmButtonModal = document.getElementById('confirm');
const formDelBlog = document.deleteBlog;
const formDelEvent = document.deleteEvent;


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
    });

    deleteEvent.forEach(delEvent => {
        delEvent.addEventListener('click', ()=>{
            let slug = delEvent.getAttribute('data-id');
            modalLabel.innerText = 'Delete Event';
            formDelEvent.action = `/dashboard/event/${slug}`;
        });
    });

    deleteBlog.forEach(delBlog => {
        delBlog.addEventListener('click', ()=>{
            let slug = delBlog.getAttribute('data-id');
            modalLabel.innerText = 'Delete Blog';
            formDelBlog.action = `/dashboard/blog/${slug}`;
        });
    });
})

// Slug maker
const title = document.querySelector('#title');
const slug = document.querySelector('#slug');

title.addEventListener('change', function(){
    fetch('/dashboard/blog/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
});

// Image Preview
function previewImg(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    const ofReader = new FileReader();
    ofReader.readAsDataURL(image.files[0]);

    ofReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }