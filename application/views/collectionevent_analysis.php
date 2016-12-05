<?php echo form_open('collectionevent/calcTemporalDist'); ?> 
 <section id="collectionevent-analysis-input">
 	<div class="container">
 		<h3>Welcome to collection event analysis page!</h3>
 		<div class = "row">
 			<div class="col-md-2"><?php echo validation_errors(); ?></div> 
      <div class="col-md-2"><?php if (isset($formLogicError)) echo "<p>$formLogicError</p>"; ?></div>
 		</div>
 		<div class = "row">
 			<div class="col-md-2">
 				<label for="step-select">Choose collection event year analysis step size</label>
		        <select class="form-control" id="step-select" name="year-step-size">
		        	<option value="1"> 1 </option>
		        	<option value="2"> 2 </option>
		        	<option value="3"> 3 </option>
		        	<option value="4"> 4 </option>
		        	<option value="5"> 5 </option>
		        	<option value="6"> 6 </option>
		        	<option value="7"> 7 </opton>
		        	<option value="8"> 8 </opton>
		        	<option value="9"> 9 </opton>
		        	<option value="10"> 10 </opton>
		        </select>
      		</div>
      		<div class = "col-md-2">
      			<input class = "form-control" placeholder = 'Enter beginning of date range' name = "dateRange1">
      			<input class = "form-control" placeholder = 'Enter end of date range' name = "dateRange2">
      		</div>
      		<div class = "btn-group">
      			<input class="btn btn-group btn-primary" type="submit" name="submit" id="submit" value="Analyze Data" />
      		</div>
 		</div>
 	</div>
 </section>

 <section>
 	<div class = "container">
    <h3>Computed Query</h3>
    <?php if (isset($sqlQuery)) echo "<p>$sqlQuery</p>";  ?>
 	</div>
 </section>

 <section>
  <div class = "container">
    <h3>Analysis Results</h3>
    <?php if (isset($noResults)) echo "<p>$noResults</p>";  ?>
    <?php if (isset($queryResults) && count($queryResults) > 0): ?>
    <table class="table table-hover table-stripped table-bordered table-condensed">
      <thead>
        <tr>
          <th><?php echo implode('</th><th>', array_keys(current($queryResults))); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($queryResults as $row): array_map('htmlentities', $row); ?>
        <tr>
          <td><?php echo implode('</td><td>', $row); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>
  </div>
 </section>