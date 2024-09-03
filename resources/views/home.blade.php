<!--For the view, I pulled in Pico CSS, just so we have some nice baseline styling,-->
<!--and Alpine JS for some interactivity. JQuery is also used for the AJAX calls.-->

<!--For the light/dark theme button, I reused my existing one-->
<!--from my blog site - Hope you don't mind.-->

<x-layouts.app>
  <main>
    <h1>Forex Conversion & Reference</h1>

    <hr>

    <section x-data="{
        amount: 0,
        amountInvalid: (amount) => amount < 0 || isNaN(parseInt(amount)),
        invalidMessage: 'Positive amounts only...and no letters! 😡',
        validMessage: 'Valid amount! 😄',
    }">
      <hgroup>
        <h2>Convert</h2>
        <p>How many USD for a specified currency.</p>
      </hgroup>

      <form action="/convert"
        method="POST">
        @csrf
        <label>
          Quote Currency
          <select name="code"
            aria-label="Select a currency to compare from..."
            required>
            <option selected
              disabled
              value="">
              Select a currency to compare from...
            </option>

            <!--The options here will be populated by the ajax call-->

          </select>

        </label>

        <label for="amount">
          Amount
        </label>
        <fieldset role="group">
          <input id="amount"
            type="number"
            step="0.01"
            required
            x-model="amount"
            x-effect="$refs.validationHelper.textContent = amountInvalid(amount) ? invalidMessage : validMessage; $el.setAttribute('aria-invalid', amountInvalid(amount));"
            name="amount"
            :value="amount"
            placeholder="Number"
            min="0"
            aria-label="Number"
            aria-invalid="false"
            aria-describedby="validation-helper">
          <input type="submit"
            value="Convert" />
        </fieldset>
        <small id="validation-helper"
          x-ref="validationHelper"></small>
      </form>

      <!--Result-->
      <div>
        <strong id="result"></strong>
      </div>
    </section>

    <hr>

    <section>
      <hgroup>
        <h2>Reference Table</h2>
        <p>Current exchange rate to USD</p>
      </hgroup>
      <table>
        <thead>
          <tr>
            <th>Currency Code</th>
            <th>Rate</th>
          </tr>
        </thead>
        <tbody>

          <!--The table body here will be populated by the ajax call-->

        </tbody>
      </table>
    </section>
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
            $('table tbody').append('<tr><td>USD_' + currency.code + '</td><td>' + currency.rate +
              '</td></tr>');
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
            $('#result').html('<hr>' + response);
          },
          error: function(xhr, status, error) {
            console.error("Error calculating the currency value.");
          }
        })
      })
    });
  </script>
  </x-layouts>
