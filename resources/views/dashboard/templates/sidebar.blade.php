<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} {{ Request::is('dashboard/search*') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <i class="fa-solid fa-table-columns"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/blog*') ? 'active' : '' }}" href="/dashboard/blog">
            <i class="fa-solid fa-newspaper"></i> Blogs
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/event*') ? 'active' : '' }}" href="/dashboard/event">
            <i class="fa-solid fa-calendar-days"></i>
            Events
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user">
            <i class="fa-solid fa-user"></i>
            Users
            </a>
          </li>
      </ul>
  </nav>