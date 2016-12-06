<?php $this->session->set_userdata('filterArray',$filterArray); ?>
<?php echo form_open('specimen/search'); ?>
<section id="smart-filter-options">
  <div class="container">
    <h3>Build Filter Array</h3>
    <div class="row">
      <div class="col-md-2"><?php echo validation_errors(); ?></div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <select class="form-control" name="operator">
          <option value="equal"> = </option>
          <option value="not"> != </option>
          <option value="tuple">in tuple</option>
          <option value="nottuple">not in tuple</option>
          <option value="like">contains</option>
          <option value="likeafter">starts with</option>
          <option value="likebefore">ends with</option>
        </select>
      </div>
      <div class="col-md-2">
        <select class="form-control custom select-term" name="specimenTerm">
            <?php foreach($filter_fields as $field): ?>
                  <option value="<?php echo $field?>"><?php echo $field?></option>
            <?php endforeach; ?>
          </select>
      </div>
      <div class="col-md-2">
        <input class="form-control" name="filterCriteria" />
      </div>
        <div class="btn-group">
          <input class="btn btn-group btn-primary" type="submit" name="submit" id="submit" value="Add Filter" />
          <input class="btn btn group btn-primary" type="submit" name="run_search" id="run_search" value="Search" />
          <input class="btn btn-group btn-danger" type="submit" name="reset_search" id="reset_search" value="Reset" />
        </div>
    
  </div>

<!-- BEGIN FILTER ARRAY -->
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
</section>
<!-- END FILTER ARRAY -->

<!-- QUERY RESULTS -->
<section>
  <div class="container">
    <h3>Query Results</h3>    
    <?php if (isset($searchresult) && count($searchresult) > 0): ?>
      <div class="section">
        <div class="row">
          <pre><?php echo $sql; ?></pre>
          <p class="body"><?php echo $resultcount; ?> specimens found.</p>
        </div>
        <div class="row">
          <div class="col-md-2">
            <a class="btn btn-primary" href="/ci/index.php/googlemap" role="button">Plot on Google Map</a>
            <br />
            <?php if (isset($links))  echo $links; ?>
          </div>
        </div>
      </div>
      <table id="resultgrid" class="table table-hover table-stripped table-bordered table-condensed">
        <thead>
          <tr>
            <th>CoreID</th>
            <th>BasisOfRecord</th>
            <th>CatalogNumber</th>
            <th>CollectionCode</th>
            <th>CoordinateUncertintyInMeters</th>
            <th>InstitutionCode</th>
            <th>TypeStatus</th>
            <th>VernacularName</th>
            <th>CommonNames</th>
            <th>Kingdom</th>
            <th>Phylum</th>
            <th>Class</th>
            <th>Order</th>
            <th>Family</th>
            <th>Genus</th>
            <th>Species</th>
            <th>Subspecies</th>
            <th>CollectedBy</th>
            <th>MonthCollected</th>
            <th>DateCollected</th>
            <th>YearCollected</th>
            <th>CollectionDate</th>
            <th>FieldNumber</th>
            <th>Continent</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>I_Geopoint</th>
            <th>VerbatimLocality</th>
            <th>Infraspecificepithet</th>
            <th>Waterbody</th>
            <th>Municipality</th>
            <th>Country</th>
            <th>State</th>
            <th>MaximumDepth</th>
            <th>MinimumDepth</th>
            <th>MaximumElevation</th>
            <th>MinimumElevation</th>
            <th>EarliestEon</th>
            <th>LatestEon</th>
            <th>Bed</th>
            <th>EarliestPeriod</th>
            <th>LatestPeriod</th>
            <th>GeologicaContextGroup</th>
            <th>EarliestEpoch</th>
            <th>LatestEpoch</th>
            <th>Member</th>
            <th>EarliestAge</th>
            <th>LatestAge</th>
            <th>Formation</th>
            <th>LowestBioStratigraphicZone</th>
            <th>EarliestEra</th>
            <th>LatestEra</th>
            <th>LithostratigraphicTerms</th>
          </tr>
        </thead>
        <tbody>
      <?php foreach ($searchresult as $row): ?>
          <tr>
            <td><?php echo htmlentities($row['COREID']); ?></td>
            <td><?php echo htmlentities($row['BASISOFRECORD']); ?></td>
            <td><?php echo htmlentities($row['CATALOGNUMBER']); ?></td>
            <td><?php echo htmlentities($row['COLLECTIONCODE']); ?></td>
            <td><?php echo htmlentities($row['COORDINATEUNCERTAINTYINMETERS']); ?></td>
            <td><?php echo htmlentities($row['INSTITUTIONCODE']); ?></td>
            <td><?php echo htmlentities($row['TYPESTATUS']); ?></td>
            <td><?php echo htmlentities($row['VERNACULARNAME']); ?></td>
            <td><?php echo htmlentities($row['I_COMMONNAMES']); ?></td>
            <td><?php echo htmlentities($row['T_KINGDOM']); ?></td>
            <td><?php echo htmlentities($row['T_PHYLUM']); ?></td>
            <td><?php echo htmlentities($row['T_CLASS']); ?></td>
            <td><?php echo htmlentities($row['T_ORDER']); ?></td>
            <td><?php echo htmlentities($row['T_FAMILY']); ?></td>
            <td><?php echo htmlentities($row['T_GENUS']); ?></td>
            <td><?php echo htmlentities($row['T_SPECIES']); ?></td>
            <td><?php echo htmlentities($row['T_SUBSPECIES']); ?></td>
            <td><?php echo htmlentities($row['COLLECTEDBY']); ?></td>
            <td><?php echo htmlentities($row['MONTHCOLLECTED']); ?></td>
            <td><?php echo htmlentities($row['DATECOLLECTED']); ?></td>
            <td><?php echo htmlentities($row['YEARCOLLECTED']); ?></td>
            <td><?php echo htmlentities($row['COLLECTIONDATE']); ?></td>
            <td><?php echo htmlentities($row['FIELDNUMBER']); ?></td>
            <td><?php echo htmlentities($row['CONTINENT']); ?></td>
            <td><?php echo htmlentities($row['LATITUDE']); ?></td>
            <td><?php echo htmlentities($row['LONGITUDE']); ?></td>
            <td><?php echo htmlentities($row['I_GEOPOINT']); ?></td>
            <td><?php echo htmlentities($row['VERBATIMLOCALITY']); ?></td>
            <td><?php echo htmlentities($row['INFRASPECIFICEPITHET']); ?></td>
            <td><?php echo htmlentities($row['WATERBODY']); ?></td>
            <td><?php echo htmlentities($row['MUNICIPALITY']); ?></td>
            <td><?php echo htmlentities($row['COUNTRY']); ?></td>
            <td><?php echo htmlentities($row['STATE']); ?></td>
            <td><?php echo htmlentities($row['MAXIMUMDEPTH']); ?></td>
            <td><?php echo htmlentities($row['MINIMUMDEPTH']); ?></td>
            <td><?php echo htmlentities($row['MAXIMUMELEVATION']); ?></td>
            <td><?php echo htmlentities($row['MINIMUMELEVATION']); ?></td>
            <td><?php echo htmlentities($row['EARLIESTEON']); ?></td>
            <td><?php echo htmlentities($row['LATESTEON']); ?></td>
            <td><?php echo htmlentities($row['BED']); ?></td>
            <td><?php echo htmlentities($row['EARLIESTPERIOD']); ?></td>
            <td><?php echo htmlentities($row['LATESTPERIOD']); ?></td>
            <td><?php echo htmlentities($row['GEOLOGICALCONTEXTGROUP']); ?></td>
            <td><?php echo htmlentities($row['EARLIESTEPOCH']); ?></td>
            <td><?php echo htmlentities($row['LATESTEPOCH']); ?></td>
            <td><?php echo htmlentities($row['MEMBER']); ?></td>
            <td><?php echo htmlentities($row['EARLIESTAGE']); ?></td>
            <td><?php echo htmlentities($row['LATESTAGE']); ?></td>
            <td><?php echo htmlentities($row['FORMATION']); ?></td>
            <td><?php echo htmlentities($row['LOWESTBIOSTRATIGRAPHICZONE']); ?></td>
            <td><?php echo htmlentities($row['EARLIESTERA']); ?></td>
            <td><?php echo htmlentities($row['LATESTERA']); ?></td>
            <td><?php echo htmlentities($row['LITHOSTRATIGRAPHICTERMS']); ?></td>
          </tr>
      <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</section>
<!-- END QUERY RESULTS -->


