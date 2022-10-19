<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Naka Mano Kohi | {{ $title }}</title>
  <link rel="icon" type="image/png" href="/images/Naka_Mano_Kohi_yellow.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  {{-- <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css"> --}}
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/override.css">
  <link rel="stylesheet" href="/assets/fontAwesome/css/all.css">
</head>
<body>

  @include('components.nav')
  
  <div class="col-12 d-flex">
    @include('components.sidenav')
    <div class="content position-fixed overflow-auto bg-tertiary-grey">
      <div class="col-12 d-flex p-3 content-container">
        <main class="col-12 d-flex card border-0 bg-primary-grey">
          <div class="card-header bg-brown text-white">
            <h3>Setting</h3>
          </div>
          <div class="card-body d-flex align-items-stretch p-0">
            <nav class="col-3 d-flex flex-column bg-secondary-grey h-100 overflow-auto setting-nav border-end border-5 border-dark">
              <a class="setting-nav-item" data="general"><h4 class="fw-normal text-white">General</h4></a>
              @auth
                <a class="setting-nav-item" data="profile"><h4 class="fw-normal text-white">Profile</h4></a>
                <a class="setting-nav-item" data="notifications"><h4 class="fw-normal text-white">Notifications</h4></a>
                <a class="setting-nav-item" data="membership"><h4 class="fw-normal text-white">Membership</h4></a>
                <a class="setting-nav-item" data="password"><h4 class="fw-normal text-white">Password</h4></a>
              @endauth
            </nav>
            <section class="col-9 p-3 setting-content">
              @yield('settingContent')
            </section>
          </div>
        </main>
        {{-- <script src="script/setting_components.js"></script>
        @auth
          <script>const user = "{{ json_encode(auth()->user()->getAttributes()) }}";</script>
          <script src="script/setting.js"></script>
        @else
          <script src="script/setting.js">new Setting([]);</script>
        @endauth --}}
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
</body>
</html> 