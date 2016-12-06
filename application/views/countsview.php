<div class="container">
  <div class="row"><h1>Tuple Counts</h1></div>
  <div class="row">
    <div class="col-md-2">
      <table class="table table-hover table-striped table-condensed">
        <tr>
          <th>Collection Event</th>
          <th>Locality</th>
          <th>Paleo Context</th>
          <th>Specimen</th>
          <th>Taxon Determination</th>
          <th>Total</th>
        </tr>
        <tr>
          <td><?php echo $collecEvent ?></td>
          <td><?php echo $locality ?></td>
          <td><?php echo $paleo ?></td>
          <td><?php echo $specimen ?></td>
          <td><?php echo $taxonD ?></td>
          <td><?php echo '<strong>' . $totalCount . '</strong>' ?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
