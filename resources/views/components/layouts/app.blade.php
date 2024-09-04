<!DOCTYPE html>
<html lang="en"
  x-ref="root"
  x-data="{ lightMode: window.matchMedia('(prefers-color-scheme: light)').matches }">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0">

    <!-- pico css for some base styling -->
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.jade.min.css">

    @vite('resources/app.css')

    <title>Teruza</title>
  </head>
  <body>
    <x-theme-toggle />

    {{ $slot }}

  </body>
</html>
