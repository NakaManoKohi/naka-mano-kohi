<div class="bg-yellow position-fixed sidenav pt-4">
  <div class="d-flex justify-content-center">
    <ul class="list-unstyled">
      <li class="mb-4">
        <a href="/" class="{{ Request::is('/') ? 'text-brown' : 'text-dark' }}">
          <i class="fa fas fa-home fs-2"></i>
        </a>
      </li>
      <li class="mb-4">
        <a href="/blog" class="{{ Request::is('blog*') ? 'text-brown' : 'text-dark' }}">
          <i class="fa-solid fa-newspaper fs-2"></i>
        </a>
      </li>
    </ul>
  </div>
</div>