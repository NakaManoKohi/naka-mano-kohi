<div class="bg-yellow position-fixed sidenav">
    <ul class="list-unstyled mb-0">
      <li class="sidenav-nav">
        <a href="/" class="{{ Request::is('/') ? 'text-dark active' : 'text-brown' }}">
          <i class="fa fas fa-home fs-2"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="sidenav-nav">
        <a href="/blog" class="{{ Request::is('blog*') ? 'text-dark active' : 'text-brown' }}">
          <i class="fa-solid fa-newspaper fs-2"></i>
          <span>Blogs</span>
        </a>
      </li>
      <li class="sidenav-nav">
        <a href="/setting" class="{{ Request::is('setting*') ? 'text-dark active' : 'text-brown' }}">
          <i class="fa-solid fa-gear fs-2"></i>
          <span>Setting</span>
        </a>
      </li>
    </ul>
</div>