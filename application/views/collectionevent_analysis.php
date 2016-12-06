<?php echo form_open('collectionevent/calcTemporalDist'); ?> 
 <section id="collectionevent-analysis-input">
 	<div class="container">
 		<h3>Welcome to collection event analysis page!</h3>
 		<div class="row">
 			<div class="col-md-2"><?php echo validation_errors(); ?></div> 
 		</div>
    <div class="row">
      <div class="col-md-2"><?php if (isset($formLogicError)) echo "<p>$formLogicError</p>"; ?></div>
    </div>
 		<div class="row">
      		<div class="col-md-2">
      			<input class = "form-control" placeholder = 'Enter first decade' name = "dateRange1">
      			<input class = "form-control" placeholder = 'Enter second decade' name = "dateRange2">
      		</div>
      		<div class = "btn-group">
      			<input class="btn btn-group btn-primary" type="submit" name="submit" id="submit" value="Analyze Data" />
      		</div>
 		</div>
 	</div>
 </section>

 <section>
 	<div class="container">
    <h3>Computed Query</h3>
    <?php if (isset($sql1Query)) echo "<pre>$sql1Query</pre>";  ?>
    <br>
    <?php if (isset($sql2Query)) echo "<pre>$sql2Query</pre>";  ?>
    <br>
    <?php if (isset($sql3Query)) echo "<pre>$sql3Query</pre>";  ?>
 	</div>
 </section>

 <section>
  <div class="container">
    <h3>Analysis Results</h3>
    <?php if (isset($noResults)) echo "<p>$noResults</p>";  ?>
    <?php if (isset($query1Results) && count($query1Results) > 0): ?>
    <table class="table table-hover table-stripped table-bordered table-condensed">
      <thead>
        <tr>
          <th><?php echo implode('</th><th>', array_keys(current($query1Results))); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($query1Results as $row): array_map('htmlentities', $row); ?>
        <tr>
          <td><?php echo implode('</td><td>', $row); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>
  </div>
 </section>
 <?php echo form_close(); ?> 

 <section>
  <div class="container">
    <h3>Analysis Heat Map</h3> 
    <?php if (isset($latLongDateRange1)) echo "<h3>$latLongDateRange1</h3>";  ?>
  </div>
 </section>

<div id="mapone"></div>
<br>

<section>
  <div class="container">
    <?php if (isset($latLongDateRange2)) echo "<h3>$latLongDateRange2</h3>";  ?>
  </div>
</section>
<div id="maptwo"></div>

  <script>
    var map1, heatmap1, map2, heatmap2;

    function initHeatMap() {
      var gville = {lat: 29.651634, lng: -82.324829};
      map1 = new google.maps.Map(document.getElementById('mapone'), {
        zoom: 4,
        center: gville
      });

      heatmap1 = new google.maps.visualization.HeatmapLayer({
        data: getPoints1(),
        map: map1
      });

      map2 = new google.maps.Map(document.getElementById('maptwo'), {
        zoom: 4,
        center: gville
      });

      heatmap2 = new google.maps.visualization.HeatmapLayer({
        data: getPoints2(),
        map: map2
      });
    }

    function getPoints1() {
      var pointArr = [];

      <?php if (isset($latLon1) && count($latLon1) > 0): ?>
      <?php foreach($latLon1 as $latLng): ?>
        pointArr.push(new google.maps.LatLng(
          <?php echo $latLng['LATITUDE']?>,
          <?php echo $latLng['LONGITUDE']?>
          )
        )
      <?php endforeach; ?>
      <?php endif; ?>

      return pointArr;
    }

    function getPoints2() {
      var pointArr = [];

      <?php if (isset($latLon2) && count($latLon2) > 0): ?>
      <?php foreach($latLon2 as $latLng): ?>
        pointArr.push(new google.maps.LatLng(
          <?php echo $latLng['LATITUDE']?>,
          <?php echo $latLng['LONGITUDE']?>
          )
        )
      <?php endforeach; ?>
      <?php endif; ?>

      return pointArr;
    }
  </script>