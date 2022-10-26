const blogCard = document.querySelectorAll('.blog-card-small');
const highlight = document.querySelectorAll('.blog-card-highlight');
if(blogCard != null) {
  blogCard.forEach(blog => {
    getSetData(blog);
  });
}
if(highlight != null) {
  highlight.forEach(blog => {
    getSetData(blog);
  });
}

function getSetData(card) {
  let data = card.getAttribute('data');
  if(data != null) {
    card.style.backgroundImage = `linear-gradient(to right, var(--bs-white), transparent), url('${data}')`;
    card.style.backgroundSize = `cover`;
  }
}