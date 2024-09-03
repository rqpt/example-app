<x-layouts.app>
  <main>
    <h1>Forex Conversion & Reference</h1>

    <section x-data="{
        amount: 0,
        quote: false,
    }">
      <h2>Convert</h2>

      <form action="/convert"
        method="POST">
        @csrf
        <fieldset>
          <label>
            Quote Currency
            <select name="quote"
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

          <label>
            Amount
            <input type="number"
              required
              x-model="amount"
              x-effect="$refs.amountValidHelper.textContent = amount < 0 || isNaN(parseInt(amount)) ? 'Please provide a positive number.' : 'Valid amount'; $el.setAttribute('aria-invalid', amount < 0 || isNaN(parseInt(amount)));"
              name="amount"
              :value="amount"
              placeholder="Number"
              min="0"
              aria-label="Number"
              aria-invalid="false"
              aria-describedby="amount-valid-helper">
            <small id="amount-valid-helper"
              x-ref="amountValidHelper"></small>
          </label>
        </fieldset>

        <button type="submit">
          Convert
        </button>
      </form>

      <!--Result-->
      <div id="result"></div>
    </section>

    <section>
      <h2>Reference Table</h2>
      <table>
        <thead>
          <tr>
            <th>Currency pair</th>
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
            const quoteCurrency = currency.pair.split('_')[1];
            $('select').append(
              `<option value="${currency.id}" @click="quote = true">${quoteCurrency}</option>`);
            $('table tbody').append('<tr><td>' + currency.pair + '</td><td>' + currency.rate +
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
            $('#result').html('<hr>' + response + '<hr>');
          },
          error: function(xhr, status, error) {
            console.error("Error calculating the currency value.");
          }
        })
      })
    });
  </script>
  </x-layouts>
