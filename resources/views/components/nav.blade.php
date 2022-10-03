<nav class="navbar navbar-expand-lg navbar-light bg-primary px-3 px-sm-4 px-md-5 mb-4">
  <div class="container-fluid d-flex justify-content-between align-items-center text-white">
    <a role="button" class="navbar-brand text-white d-flex align-items-center text-decoration-none" onclick="window.location.href = '#'; location.reload();">
      <img src="file:///D:/IDCamp%202022/Front-End%20Web/Pemula%20-%20Menengah/dist/asset/images/ex_bd.png" alt="logo ex" class="logo" height="50">
      <h2 class="h2 ms-4">Ex-BD</h2>
    </a>
    <button class="navbar-toggler bg-white color-edge" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a role="button" class="nav-link text-white text-decoration-none" onclick="window.location.href = '#about'; location.reload();">About</a>
        </li>
        <li class="nav-item">
          <a role="button" class="nav-link text-white text-decoration-none" onclick="window.location.href = '#profile';location.reload();">Profile</a>
        </li>
      </ul>
      <div class="d-flex col-lg-6 col-sm-9 col-12">
        <div class="pe-2 col-8 col-sm-9 align-items-center d-flex">
          <input type="text" class="col-12 search rounded" placeholder="Title, Genre, ...">
        </div>
        <input type="submit" class="col-4 col-sm-3 search-submit btn bg-white text-dark me-auto" value="Search">
      </div>
    </div>
  </div>
</nav>