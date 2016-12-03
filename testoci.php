<?php
    /*
      Here is simple script to demonstrate how to connect to an Oracle DB from PHP.
      This is the type of code that we will use on the MVC models of our application.
      Python/Django was eliminated because it requires a minimum of Oracle Server 11.2 
      and CISE is running 11.1.
      Cake was eliminated because the latest version is closely married with an ORM,
      which means we would not write our queries in SQL and thusly not satisfy the project
      requirements.

      So, unless someone has a better idea, I vote CodeIgniter as the MVC framework,
      as it is light weight, simple, and may be used without an ORM.

      Sebastian and I already have dev VMs up and running and can help anyone setting up theirs as needed.$_COOKIE

      -Warren
    */
    
    // Be sure to create your own db_conf.php that includes $conn = oci_connect('YOUR_USERNAME', 'PASSWORD', 'oracle.cise.ufl.edu/orcl');
    // .gitignore has been set to ignore db_conf.php so we can avoid stepping on each other's credentials
    require_once('db_conf.php');
    echo "<h3>Server orcale.cise.ufl.edu information:</h3><p> " . oci_server_version($conn) . "</p>\n";
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

    // parse a new query 
    $stid = oci_parse($conn, 'select count(*) as tupleCount from SPECIMEN');
    // execute the new query
    oci_execute($stid);
    // example of how to loop through results returned as objects
    if (($row = oci_fetch_object($stid)) != false) { 
        echo "<p>Count=" . $row->TUPLECOUNT . "</p>\n";
    }
    else {
        echo "<p>Count not fetch result object.</p>\n";
    }
    echo "<h3>First 10 Records</h3>";

    // Let's get the first 10 rows from our iDigBioFlat table, return the results as an array, and display the results in a table.
    $stid = oci_parse($conn, 'select * from SPECIMEN where ROWNUM <= 10');
    oci_execute($stid);
    echo "<table border=\"1\">\n";
    while (($row = oci_fetch_array($stid, OCI_NUM+OCI_RETURN_NULLS)) != false) {
        echo "<tr>\n";
        foreach ($row as $rowItem) {
            echo "\t<td>" .($rowItem !== null ? htmlentities($rowItem, ENT_QUOTES) : "NULL")."</td>\n";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";

    oci_free_statement($stid);
    oci_close($conn);
?>