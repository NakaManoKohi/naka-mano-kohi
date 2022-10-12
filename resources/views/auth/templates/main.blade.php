<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Naka Mano Kohi | {{ $title }}</title>
    <!-- Custom styles for this template -->
    <link rel="icon" type="image/png" href="images/Naka_Mano_Kohi_yellow.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/override.css">
    <link rel="stylesheet" href="/css/auth.css">
    
  </head>
  <body class="text-center overflow-hidden bg-tertiary-grey">
    <div class="d-flex h-100 col-12 position-absolute" style="z-index:-99">
      <div class="h-100 bg-brown bg-form-margin"></div>
      <div class="col-9">
        <div class="h-100 bg-brown col-5 bg-form"></div>
      </div>
    </div>
    <div class="coffee-img position-absolute coffee-img-top"></div>
    <div class="coffee-img position-absolute coffee-img-bottom"></div>
    @yield('container')
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
