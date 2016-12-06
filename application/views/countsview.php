<div class="container">
  <div class="row"><h1>Tuple Counts</h1></div>
  <div class="row">
    <div class="col-md-2">
      <table class="table table-hover table-striped table-condensed">
        <tr>
          <th>Specimen</th>
          <th>Taxon Determination</th>
          <th>Collection Event</th>
          <th>Locality</th>
          <th>Paleo Context</th>
          <th>Total</th>
        </tr>
        <tr>
          <td><?php echo number_format($specimen) ?></td>
          <td><?php echo number_format($taxonD) ?></td>
          <td><?php echo number_format($collecEvent) ?></td>
          <td><?php echo number_format($locality) ?></td>
          <td><?php echo number_format($paleo) ?></td>
          <td><?php echo '<strong>' . number_format($totalCount) . '</strong>' ?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
