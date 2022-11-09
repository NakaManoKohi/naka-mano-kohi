// Constant Variables
const suspendUserButton = document.querySelectorAll('#suspendUser');
const activateUserButton = document.querySelectorAll('#activateUser');

const suspendBlogButton = document.querySelectorAll('#suspendBlog');
const activateBlogButton = document.querySelectorAll('#activateBlog');

const suspendEventButton = document.querySelectorAll('#suspendEvent');
const activateEventButton = document.querySelectorAll('#activateEvent');

const suspendPostButton = document.querySelectorAll('#suspendPost');
const activatePostButton = document.querySelectorAll('#activatePost');

const deleteBlog = document.querySelectorAll('#deleteBlog');
const deleteEvent = document.querySelectorAll('#deleteEvent');
const deletePost = document.querySelectorAll('#deletePost');

const modalLabel = document.getElementById('modalTitle');
const confirmButtonModal = document.getElementById('confirm');
const formDelBlog = document.deleteBlog;
const formDelEvent = document.deleteEvent;
const formDelPost = document.deletePost;



// $(suspendUserButton).on("click", ()=>{
// })

$(document).ready(() => {
    // Suspend User
    suspendUserButton.forEach(suspendButton => {
        suspendButton.addEventListener('click', ()=>{
            let userUsername = suspendButton.getAttribute('data-id');
            modalLabel.innerText = 'Suspend User';
            confirmButtonModal.setAttribute('href', '/dashboard/user/' + userUsername + '/suspend');
        });
    });

    // Activate User
    activateUserButton.forEach(activateButton => {
        activateButton.addEventListener('click', ()=>{
            let userUsername = activateButton.getAttribute('data-id');
            modalLabel.innerText = 'Activate User';
            confirmButtonModal.setAttribute('href', '/dashboard/user/' + userUsername + '/activate');
        });
    });

    // Suspend Blog
    suspendBlogButton.forEach(suspendButton => {
        suspendButton.addEventListener('click', ()=>{
            let blogSlug = suspendButton.getAttribute('data-id');
            modalLabel.innerText = 'Suspend Blog';
            confirmButtonModal.setAttribute('href', '/dashboard/blog/' + blogSlug + '/suspend');
        });
    });

    // Activate Blog
    activateBlogButton.forEach(activateButton => {
        activateButton.addEventListener('click', ()=>{
            let blogSlug = activateButton.getAttribute('data-id');
            modalLabel.innerText = 'Activate Blog';
            confirmButtonModal.setAttribute('href', '/dashboard/blog/' + blogSlug + '/activate');
        });
    });

    // Suspend Event
    suspendEventButton.forEach(suspendButton => {
        suspendButton.addEventListener('click', ()=>{
            let eventSlug = suspendButton.getAttribute('data-id');
            modalLabel.innerText = 'Suspend Event';
            confirmButtonModal.setAttribute('href', '/dashboard/event/' + eventSlug + '/suspend');
        });
    });

    // Activate Event
    activateEventButton.forEach(activateButton => {
        activateButton.addEventListener('click', ()=>{
            let eventSlug = activateButton.getAttribute('data-id');
            modalLabel.innerText = 'Activate Event';
            confirmButtonModal.setAttribute('href', '/dashboard/event/' + eventSlug + '/activate');
        });
    });

    // Suspend Post
    suspendPostButton.forEach(suspendButton => {
        suspendButton.addEventListener('click', ()=>{
            let postId = suspendButton.getAttribute('data-id');
            modalLabel.innerText = 'Suspend Post';
            confirmButtonModal.setAttribute('href', '/dashboard/post/' + postId + '/suspend');
        });
    });

    // Activate Post
    activatePostButton.forEach(activateButton => {
        activateButton.addEventListener('click', ()=>{
            let postId = activateButton.getAttribute('data-id');
            modalLabel.innerText = 'Activate Post';
            confirmButtonModal.setAttribute('href', '/dashboard/post/' + postId + '/activate');
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

    deletePost.forEach(delPost => {
        delPost.addEventListener('click', ()=>{
            let id = delPost.getAttribute('data-id');
            modalLabel.innerText = 'Delete Post';
            formDelPost.action = `/dashboard/post/${id}`;
        });
    });
})

// Slug maker (blog)
const title = document.querySelector('#title');
const slug = document.querySelector('#slug');

title.addEventListener('change', function(){
    fetch('/dashboard/blog/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
});

// Slug maker (event)
// const eventTitle = document.querySelector('#eventTitle');
// const eventSlug = document.querySelector('#eventSlug');

// eventTitle.addEventListener('change', function(){
//     console.log(eventTitle.value);
//     fetch('/dashboard/event/checkSlug?eventTitle=' + eventTitle.value)
//     .then(response => response.json())
//     .then(data => eventSlug.value = data.slug)
// });

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