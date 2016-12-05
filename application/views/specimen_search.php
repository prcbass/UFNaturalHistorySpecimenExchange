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
          <option value="likebefore">ends with</opton>
        </select>
      </div>
      <div class="col-md-2">
        <select class="form-control custom select-term" name="specimenTerm">
            <option></option>
            <option value="BASISOFRECORD">BasisOfRecord</option>
            <option value="CATALOGNUMBER">CatalogNumber</option>
            <option value="COLLECTIONCODE">CollectionCode</option>
            <option value="INSTITUTIONCODE">InstitutionCode</option>
            <option value="TYPESTATUS">TypeStatus</option>
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
    <?php if (isset($sql)) echo "<p>$sql</p>";  ?>
    <?php if (isset($searchresult) && count($searchresult) > 0): ?>
      <table class="table table-hover table-stripped table-bordered table-condensed">
        <thead>
          <tr>
            <th><?php echo implode('</th><th>', array_keys(current($searchresult))); ?></th>
          </tr>
        </thead>
        <tbody>
      <?php foreach ($searchresult as $row): array_map('htmlentities', $row); ?>
          <tr>
            <td><?php echo implode('</td><td>', $row); ?></td>
          </tr>
      <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</section>
<!-- END QUERY RESULTS -->

<!--
<section id="filter-options">
  <div class="container">
    <h3>Build Query</h3>
    <div>
        <div class="row">
            <div class="col-md-2">
                <label for "basisofrecordOperator">Operator</label>
                <select class="form-control" name="basisofrecordOperator">
                    <option value="equal"> = </option>
                    <option value="not"> != </option>
                    <option value="like">contains</option>
                    <option value="likeafter">starts with</option>
                    <option value="likebefore">ends with</opton>
                </select>
            </div>
            <div class="col-md-2">
                <label for="BASISOFRECORD">Basis Of Record</label>
                <input class="form-control" type="input" name="BASISOFRECORD" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for "calatlognumberOperator">Operator</label>
                <select class="form-control" name="calatlognumberOperator">
                    <option value="equal"> = </option>
                    <option value="not"> != </option>
                    <option value="like">contains</option>
                    <option value="likeafter">starts with</option>
                    <option value="likebefore">ends with</opton>
                </select>
            </div>
            <div class="col-md-2">
                <label for="CATALOGNUMBER">Catalog Number</label>
                <input class="form-control" type="input" name="CATALOGNUMBER" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for "collectioncodeOperator">Operator</label>
                <select class="form-control" name="collectioncodeOperator">
                    <option value="equal"> = </option>
                    <option value="not"> != </option>
                    <option value="like">contains</option>
                    <option value="likeafter">starts with</option>
                    <option value="likebefore">ends with</opton>
                </select>
            </div>
            <div class="col-md-2">
                <label for="COLLECTIONCODE">Collection Code</label>
                <input class="form-control" type="input" name="COLLECTIONCODE" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for "institutioncodeOperator">Operator</label>
                <select class="form-control" name="institutioncodeOperator">
                    <option value="equal"> = </option>
                    <option value="not"> != </option>
                    <option value="like">contains</option>
                    <option value="likeafter">starts with</option>
                    <option value="likebefore">ends with</opton>
                </select>
            </div>
            <div class="col-md-2">
                <label for="INSTITUTIONCODE">Institution Code</label>
                <input class="form-control" type="input" name="INSTITUTIONCODE" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for "typestatusOperator">Operator</label>
                <select class="form-control" name="typestatusOperator">
                    <option value="equal"> = </option>
                    <option value="not"> != </option>
                    <option value="like">contains</option>
                    <option value="likeafter">starts with</option>
                    <option value="likebefore">ends with</opton>
                </select>
            </div>
            <div class="col-md-2">
                <label for="TYPESTATUS">Type Status</label>
                <input class="form-control" type="input" name="TYPESTATUS" />
            </div>
        </div>
        <div class="row">
          <div class="col-md-2">
            <input class="btn btn-primary right" type="submit" name="submit" value="Search Palecontext" />
          </div>
        </div>
    </div>
  </div>
</section>  




<!-- FILTER OPTIONS -->
<!--
<section id="filter-options">
  <div class="container">
    <h3>Build Query</h3>
    <div>
      <div class="row">
        <div class="col-md-2">
          <label for="specimenTerm"></label>
          <select class="form-control custom select-term" name="specimenTerm">
            <option></option>
            <option>BasisOfRecord</option>
            <option>CatalogNumber</option>
            <option>CollectionCode</option>
            <option>CoordinateUncertintyInMeters</option>
            <option>InstitutionCode</option>
            <option>TypeStatus</option>
            <option>[Add More]</option>
          </select>
    
        
        </div>

        
          
        </div>
        <div class="col-md-2">
        <div class="row">
        <div class="col-md-4">
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Group By</span>
            <select class="add-filter" multiple="multiple">
              <option value="AL">Alabama</option>
              <option value="WY">Wyoming</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-4">
          <span style="font-variant-position: super;"><input type="checkbox"> display in result</span>
          <a class="btn btn-primary right" href="">Add Filter</a>
        </div>

        <div class="col-md-4">
          <input class="add-filter" type="text" placeholder="Filter Criteria"/>
        </div>
        
      </div>
      <br>
   
    </div>
  </div>
</section>
-->
<!-- END FILTER OPTIONS -->
