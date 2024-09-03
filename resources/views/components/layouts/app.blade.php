<!DOCTYPE html>
<html lang="en"
  x-ref="root"
  x-data="{ lightMode: window.matchMedia('(prefers-color-scheme: light)').matches }">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
      content="{{ csrf_token() }}">

    <!-- DOMPurify for XSS protection -->
    <!--Could not get this working for some reason-->
    <!--<script type="text/javascript" src="src/purify.js"></script>-->

    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
      crossorigin="anonymous"></script>

    <!-- pico css for some base styling -->
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.jade.min.css">

    <!-- alpine for some simple js -->
    <script defer
      src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite('resources/css/app.css')
      
    <title>Teruza</title>
  </head>
  <body>
    <x-theme-toggle />

    {{ $slot }}

  </body>
</html>
