<!--For the view, I pulled in Pico CSS, just so we have some nice baseline styling,-->
<!--and Alpine JS for some interactivity. JQuery is also used for the AJAX calls.-->

<!--For the light/dark theme button, I reused my existing one-->
<!--from my blog site - Hope you don't mind.-->

<x-layouts.app>
  <main>
    <h1>Forex Conversion & Reference</h1>

    <hr>

    <div id="features">
      <x-currency-converter />

      <hr>

      <x-reference-table />
    </div>

  </main>
</x-layouts>
