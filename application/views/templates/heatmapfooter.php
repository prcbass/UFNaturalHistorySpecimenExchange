
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
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDN2DW_TbwI3gNVPUeo8Pp4DMjnCSBCdYA&libraries=visualization&callback=initHeatMap">
</script>
</body>
</html>