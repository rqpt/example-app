<!--For the view, I pulled in Pico CSS, just so we have some nice baseline styling,-->
<!--and Alpine JS for some interactivity. JQuery is also used for the AJAX calls.-->

<!--For the light/dark theme button, I reused my existing one-->
<!--from my blog site - Hope you don't mind.-->

<x-layouts.app>
  <main>
    <h1>Forex Conversion & Reference</h1>

    <x-currency-converter />

    <x-reference-table />

  </main>
  <script>

    $(document).ready(function() {
        $.ajax({
            url: "/rates",
            method: "GET",
            success: function(currencies) {
                currencies.forEach(function(currency) {
                    $('select').append(
                        `<option value="${currency.code}">${currency.code}</option>`);
                    $('table tbody').append('<tr><td>USD_' + currency.code + '</td><td>' + currency.rate + '</td></tr>');
                });
            },
            error: function(xhr, status, error) {
                console.error("Error fetching data from /rates endpoint.");
            }
        });

        $('form').on('submit', function(e) {
            e.preventDefault();

            //$.ajaxSetup({
                //  headers: {
                    //  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //  }
                //});

            $.ajax({
                url: '/convert',
                method: 'POST',
                data: $('form').serialize(),
                success: function(response) {
                    $('#result').html('<hr>The converted value is <mark>' + response + '</mark>');
                },
                error: function(xhr, status, error) {
                    console.error("Error calculating the currency value.");
                }
            })
        })
    });

  </script>
</x-layouts>
