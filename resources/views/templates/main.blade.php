<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Naka Mano Kohi | {{ $title }}</title>
  <link rel="icon" type="image/png" href="/images/Naka_Mano_Kohi_yellow.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/override.css">
  <link rel="stylesheet" href="/css/trix.css">
  <link rel="stylesheet" href="/assets/fontAwesome/css/all.css">
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
  <script src="/script/script.js"></script>
  <script src="/script/trix.js"></script>
</body>
</html> 