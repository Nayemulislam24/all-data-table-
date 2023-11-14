<?php

// Database connection info 
$dbDetails = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db'   => 'asterisk'
);

// DB table to use 
$table = 'members';

// Table's primary key 
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'first_name', 'dt' => 1),
    array('db' => 'last_name',  'dt' => 2),
    array('db' => 'email',      'dt' => 3),
    array('db' => 'gender',     'dt' => 4),
    array('db' => 'country',    'dt' => 5),
    array(
        'db'        => 'created',
        'dt'        => 6,
        'formatter' => function ($d, $row) {
            return date('jS M Y', strtotime($d));
        }
    ),
    array(
        'db'        => 'status',
        'dt'        => 7,
        'formatter' => function ($d, $row) {
            return ($d == 1) ? 'Active' : 'Inactive';
        }
    ),
    array(
        'db'        => 'id',
        'dt'        =>8,
        'formatter' => function ($d, $row) {
            return ' 
                <a href="edit.php?id=' . $d . '">Edit</a>&nbsp; 
                <a href="delete.php?id=' . $d . '">Delete</a> 
            ';
        }
    )
);
// Include SQL query processing class 
require 'ssp.class.php';

// Output data as json format 
echo json_encode(
    SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
);
