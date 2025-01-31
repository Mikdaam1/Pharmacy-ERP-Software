<?php
include("../auth/db.php");
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

 

// DB table to use
$table = 'COD_ACCOUNT_CLASS';
 
// Table's primary key
$primaryKey = 'ID';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'ID', 'dt' => 0 ),
    array( 'db' => 'CLASS_CODE',  'dt' => 1 ),
    array( 'db' => 'CLASS_NAME',   'dt' => 2 ),
    array(
        'db'        => 'ID',
        'dt'        => 3,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
    )
);

//include( 'ssp.class.php' );
require 'ssp.class.php';

echo json_encode(
    \SSP::simple( $_GET, $c, $table, $primaryKey, $columns )
);


