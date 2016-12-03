<?php
	//Connection to DB
	require_once('db_conf.php');

	//parse select count(*) statements
	$stid = oci_parse($conn,'select count(*) as Tup from CollectionEvent');
    oci_execute($stid);
    if (($row = oci_fetch_object($stid)) != false) { 
        echo "<p>Collection Event Tuple Count=" . $row->TUP . "</p>\n";
    }
    else {
        echo "<p>Could not fetch result object.</p>\n";
    }
    oci_free_statement($stid);

    $stid = oci_parse($conn,'select count(*) as Tup from Locality');
    oci_execute($stid);
    if (($row = oci_fetch_object($stid)) != false) { 
        echo "<p>Locality Tuple Count=" . $row->TUP . "</p>\n";
    }
    else {
        echo "<p>Could not fetch result object.</p>\n";
    }
    oci_free_statement($stid);

    $stid = oci_parse($conn,'select count(*) as Tup from PaleoContext');
    oci_execute($stid);
    if (($row = oci_fetch_object($stid)) != false) { 
        echo "<p>Paleo Context Tuple Count=" . $row->TUP . "</p>\n";
    }
    else {
        echo "<p>Could not fetch result object.</p>\n";
    }
    oci_free_statement($stid);

    $stid = oci_parse($conn,'select count(*) as Tup from Specimen');
    oci_execute($stid);
    if (($row = oci_fetch_object($stid)) != false) { 
        echo "<p>Specimen Tuple Count=" . $row->TUP . "</p>\n";
    }
    else {
        echo "<p>Could not fetch result object.</p>\n";
    }
    oci_free_statement($stid);

    $stid = oci_parse($conn,'select count(*) as Tup from TaxonDetermination');
    oci_execute($stid);
    if (($row = oci_fetch_object($stid)) != false) { 
        echo "<p>Taxon Determination Tuple Count=" . $row->TUP . "</p>\n";
    }
    else {
        echo "<p>Could not fetch result object.</p>\n";
    }   
    oci_free_statement($stid);         
         
    oci_close($conn);    
?>