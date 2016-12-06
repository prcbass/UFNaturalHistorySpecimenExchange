<h2><?php echo $title; ?></h2>
<section>
  <div class="container">
    <h3>Filter Array</h3>
    <div class="row>"
      <div class="column-sm-1">
        <table class="table table-hover table-striped table-condensed">
          <tr><th>Term</th><th>operator</th><th>Criteria</th></tr>
          <?php foreach ($filterArray as $filter_item): ?>        
            <tr>
              <td><?php echo $filter_item['specimenTerm']; ?></td>
              <td><?php echo $filter_item['operator']; ?></td>
              <td><?php echo $filter_item['criteria']; ?></td>    
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="row">
        <a class="btn btn-primary" href="/ci/index.php/specimen/search" role="button">Return to Speciem Search</a>
    </div>
   </div>  
</section>    
<div id="map">
    <script>
      function initMap() {
        var gville = {lat: 29.651634, lng: -82.324829};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: gville
        });
        <?php foreach($geopoints as $gp): ?>
            var marker = new google.maps.Marker({
            position: <?php echo str_replace("lon", "lng",$gp['I_GEOPOINT']); ?>,
            map: map
            });
        <?php endforeach; ?>
      }
    </script>
</div>