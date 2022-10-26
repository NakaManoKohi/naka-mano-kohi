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
  <style>
    .blog-card>.blog-card-small, .blog-card-highlight{
      background-image: linear-gradient(to right, var(--bs-white), transparent), url('https://source.unsplash.com/800x600/?coffee');
      background-size: cover;
    }
  </style>
</head>
<body>

  @include('components.nav')
  
  <div class="col-12 d-flex">
    @include('components.sidenav')
    <div class="content position-fixed overflow-auto bg-tertiary-grey">
      @yield('content')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
</body>
</html> 