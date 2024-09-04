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

        <!--The options here will be populated by an ajax call-->
        <!--Please refer to resources/js/app.js-->

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
