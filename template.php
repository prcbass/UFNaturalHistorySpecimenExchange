<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="main.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
</head>
<body>

<!-- NAVBAR -->
<section id="navbar">
  <div id="navbar-options">
    <ul class="nav-options">
      <img class="nav-img" src="http://pledgie.com/assets/campaigns/23315/medium/database-logo.png?1390316899"/>
      <span class="nav-title">UF Specimen Research</span>
      <li><a href="#sign-in">Sign in</a></li>
      <li><a href="#sign-up">Sign Up</a></li>
      <li><a class="active" href="#home">Home</a></li>
    </ul>
  </div>
</section>
<!-- END NAVBAR -->

<!-- FILTER OPTIONS -->
<section id="filter-options">
  <div class="container">
    <h3>Build Query</h3>
    <div>
      <div class="row">
        <div class="col-md-2">
          <select class="form-control custom select-term">
            <option></option>
            <option>SELECT</option>
            <option>INSERT</option>
            <option>UPDATE</option>
            <option>[Add More]</option>
          </select>
        </div>

        <div class="col-md-2">
          <select class="form-control custom operator">
            <option></option>
            <option>[Add Operators]</option>
          </select>
        </div>

        <div class="col-md-4">
          <input class="add-filter" type="text" placeholder="Filter Criteria"/>
        </div>
        <div class="col-md-4">
          <span style="font-variant-position: super;"><input type="checkbox"> display in result</span>
          <a class="btn btn-primary right" href="">Add Filter</a>
        </div>
      </div>
      <br>
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
    </div>
  </div>
</section>
<!-- END FILTER OPTIONS -->

<!--ADDED FILTERS-->
<section>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <h5>Added Filters:</h5>
      </div>
      <div class="col-md-2">
        <a class="btn btn-success" href="">Run Query</a>
      </div>
      <div class="col-md-8">
        <a class="btn btn-primary right" href="">Load Query</a>
        <a class="btn btn-primary right" href="">Save Query</a>
      </div>
    </div>
    <div>
      <strong>[Built Query Shown Here]</strong>
    </div>
  </div>
</section>
<!-- END ADDED FILTERS -->

<!-- QUERY RESULTS -->
<section>
  <div class="container">
    <h3>Query Results</h3>
    <strong>[Put Tables Here]</strong>
  </div>
</section>
<!-- END QUERY RESULTS -->

<!-- LOAN REQUEST -->
<section>
  <div class="container">
    <br>
    <a class="btn btn-success" href="">Create Loan Request</a>
  </div>
</section>
<!-- END LOAN REQUESTS -->

<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
  $('select').select2();
  $(".select-term").select2({
    placeholder: "Select Term",
    allowClear: true
  });
  $(".operator").select2({
    placeholder: "Operator",
    allowClear: true
  });
</script>
</body>
</html>