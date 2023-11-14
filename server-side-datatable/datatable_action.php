<?php 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'asterisk' 
); 
 
// DB table to use 
$table = 'students'; 
 
// Table's primary key 
$primaryKey = 'id'; 
 
## $row single row return from database. 
## The `db` parameter represents the column name in the database.  
## The `dt` parameter represents the DataTables column identifier. 
$columns = array(
    0 => "id",
    1 => "name",
    2 => "roll",
);

$columns = array( 
    array('db' => 'id', 'dt' => 0), 
    array('db' => 'name',  'dt' => 1), 
    array( 'db' => 'roll', 'dt' => 2, 
        // 'formatter' => function( $d, $row) { 
        //     return ($d == 1) ? 'Active' : 'Inactive'; 
        // } 
    ) 
); 







 
## Include SQL query processing class 
require 'ssp.class.php'; 
 
## Output data as json format 
echo json_encode( 
    SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns) 
);