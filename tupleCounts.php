<?php
	//Connection to DB
	require_once('db_conf.php');

	//parse select count(*) statements
	$collecEvent = oci_parse($conn,'select count(*) as c_tuples from CollectionEvent');
	$locality = oci_parse($conn,'select count(*) as l_tuples from Locality');
	$paleo = oci_parse($conn,'select count(*)  as p_tuples from PaleoContext');
	$specimen = oci_parse($conn,'select count(*) as s_tuples from Specimen');
	$taxonD = oci_parse($conn,'select count(*) as t_tuples from TaxonDetermination');

	//execute the parsed queries
	oci_execute($collecEvent);
	oci_execute($locality);
	oci_execute($paleo);
	oci_execute($specimen);
	oci_execute($taxonD);

	//fetch results
	if (($row = oci_fetch_object($collecEvent)) != false) { 
        echo "<p>Collection Event Tuple Count=" . $row->c_tuples . "</p>\n";
    }
    else {
        echo "<p>Could not fetch result object.</p>\n";
    }

    if (($row = oci_fetch_object($locality)) != false) { 
        echo "<p>Collection Event Tuple Count=" . $row->l_tuples . "</p>\n";
    }
    else {
        echo "<p>Could not fetch result object.</p>\n";
    }

 	if (($row = oci_fetch_object($paleo)) != false) { 
        echo "<p>Collection Event Tuple Count=" . $row->p_tuples . "</p>\n";
    }
    else {
        echo "<p>Could not fetch result object.</p>\n";
    }

	if (($row = oci_fetch_object($specimen)) != false) { 
        echo "<p>Collection Event Tuple Count=" . $row->s_tuples . "</p>\n";
    }
    else {
        echo "<p>Could not fetch result object.</p>\n";
    }

	if (($row = oci_fetch_object($taxonD)) != false) { 
        echo "<p>Collection Event Tuple Count=" . $row->t_tuples . "</p>\n";
    }
    else {
        echo "<p>Could not fetch result object.</p>\n";
    }   

    oci_free_statement($collecEvent);
    oci_free_statement($locality);
    oci_free_statement($paleo);
    oci_free_statement($specimen);
    oci_free_statement($taxonD);
    oci_close($conn);    
?>