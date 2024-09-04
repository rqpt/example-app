<!--For the view, I pulled in Pico CSS, just so we have some nice baseline styling,-->
<!--and Alpine JS for some interactivity. Livewire is used for the AJAX calls.-->

<!--For the light/dark theme button, I reused my existing one-->
<!--from my blog site - Hope you don't mind.-->

<?php

use function Livewire\Volt\{state, rules};
use App\Models\Currency;

state(['currencies' => Currency::all()])->locked();
state([
    'code' => '',
    'amount' => 0,
    'convertedResult' => ''
]);

rules([
    'code' => ['required', 'string', 'size:3', 'exists:App\Models\Currency,code'],
    'amount' => ['required', 'numeric', 'gte:0'],
]);

$convert = function () {
    $validated = $this->validate();

    $exchange = Currency::whereCode($validated['code'])->first();

    $convertedAmount = $exchange->convert($validated['amount']);

    $this->convertedResult = "<hr><strong>The converted value is <mark>{$convertedAmount}</mark></strong>";
};

?>

<x-layouts.app>
  <main>
    <h1>Forex Conversion & Reference</h1>

    <hr>

    @volt
      <div>
        <x-currency-converter :$currencies :$convertedResult />

        <hr>

        <x-reference-table :$currencies />
      </div>
    @endvolt
  </main>
</x-layouts>
