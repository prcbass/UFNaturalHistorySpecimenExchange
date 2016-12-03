<?php
    // Be sure to create your own db_conf.php that includes $conn = oci_connect('YOUR_USERNAME', 'PASSWORD', 'oracle.cise.ufl.edu/orcl');
    // .gitignore has been set to ignore db_conf.php so we can avoid stepping on each other's credentials
    require_once('db_conf.php');
    echo "<h3>Server oracle.cise.ufl.edu information:</h3><p> " . oci_server_version($conn) . "</p>\n";
    echo "<p>OCI Client Version: " . oci_client_version() . "</p>\n";
    echo "</p>This user account has access to the following tables:</p>\n";
    
    // create a variable to hold the parsed query and connection string
    $stid = oci_parse($conn, 'select table_name from user_tables');
    
    // execute the parsed query
    oci_execute($stid);

    // Example of how to loop through query results fetched as an array
    echo "<table>\n";
    while (($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        echo "<tr>\n";
        foreach ($row as $item) {
            echo "  <td>".($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;")."</td>\n";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";

    //42520 records should be updated 

    $selectGeo = 'select RAWTOHEX(LocalityID) as ID, I_GEOPOINT from Locality where I_GEOPOINT != \'0\'';
    $getGeo = oci_parse($conn, $selectGeo);
    oci_execute($getGeo);

    $latLonMapping = array();
    $count = 0;

    while(($row = oci_fetch_object($getGeo)) != false){
        echo "WORKING ON ROW " . $count . "\n";

        $updateGeo = oci_parse($conn, 'update Locality set Latitude = ' 
            . json_decode($row->I_GEOPOINT)->lat . ', Longitude = ' . json_decode($row->I_GEOPOINT)->lon 
            . ' where LocalityID = \''. $row->ID . '\'');

        $result = oci_execute($updateGeo);
        if(!$result){
            echo "FOUND ERROR WHILE UPDATING: " . oci_error($getGeo) . "\n";
            return;
        }
        else{
            $count++;
        }
    }

    echo "NUMBER OF RECORDS UPDATED AS PART OF THIS SCRIPT\n";
    echo $count . "\n";


    oci_free_statement($getGeo);
    oci_free_statement($updateGeo);
    oci_free_statement($stid);
    oci_close($conn);
?>