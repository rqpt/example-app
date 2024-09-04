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

  <form wire:submit.prevent="convert">
    <label>
      Quote Currency
      <select wire:model="code"
        name="code"
        aria-label="Select a currency to compare from..."
        required>
        <option disabled
          value="">
          Select a currency to compare from...
        </option>

        @foreach ($currencies as $currency)
          <option value="{{ $currency->code }}">
              {{ $currency->code }}
          </option>
        @endforeach

      </select>
    </label>

    <label for="amount">
      Amount
    </label>
    <fieldset role="group">
      <input wire:model="amount"
        id="amount"
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
    {!! $convertedResult !!}
  </div>
</section>
