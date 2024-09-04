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

      @foreach ($currencies as $currency)
        <tr>
          <td>USD_{{ $currency->code }}</td>
          <td>{{ $currency->rate }}</td>
        </tr>
      @endforeach

    </tbody>
  </table>
</section>
