<?php
## database connection
$mysqli = new mysqli("localhost", "root", "", "asterisk");

## Check connection
if ($mysqli->connect_errno) {
    echo json_encode("Failed to connect to MySQL");
    exit();
}
$params = $columns = $totalRecords = $data = array();
$params = $_REQUEST;
$columns = array(
    0 => 'nombre',
    1 => 'dni',
    2 => 'ciudad',
    3 => 'direccion',
    4 => 'telefono',
    5 => 'afiliado'
);
$where = $sqlTot = $sqlRec = "";
if (!empty($params['search']['value'])) {
    $where .= " WHERE ";
    $where .= " ( nombre LIKE '%" . $params['search']['value'] . "%' ";
    $where .= " OR dni LIKE '%" . $params['search']['value'] . "%' ";
    $where .= " OR ciudad LIKE '%" . $params['search']['value'] . "%' ";
    $where .= " OR direccion LIKE '%" . $params['search']['value'] . "%' ";
    $where .= " OR telefono LIKE '%" . $params['search']['value'] . "%' ";
    $where .= " OR afiliado LIKE '%" . $params['search']['value'] . "%' )";
}

$sql = "SELECT * FROM dncrp_employee_document ";
$sqlTot .= $sql;
$sqlRec .= $sql;

if (isset($where) && $where != '') {
    $sqlTot .= $where;
    $sqlRec .= $where;
}


$sqlRec .=  " ORDER BY " . $columns[$params['order'][0]['column']] . "   " . $params['order'][0]['dir'] . "  LIMIT " . $params['start'] . " ," . $params['length'] . " ";

$queryTot = mysqli_query($connection, $sqlTot) or die("database error:" . mysqli_error($connection));


$totalRecords = mysqli_num_rows($queryTot);

$queryRecords = mysqli_query($connection, $sqlRec) or die("error to fetch employees data");

while ($row = mysqli_fetch_row($queryRecords)) {
    $row[5] = $row[6];
    $row[7] = '<img id="mostrar" src="img/details_open.png" title="ver información"><img src="img/edit.png">';
    $data[] =  $row;
}

$json_data = array(
    "draw"            => intval($params['draw']),
    "recordsTotal"    => intval($totalRecords),
    "recordsFiltered" => intval($totalRecords),
    "data"            => $data
);

echo json_encode($json_data);
