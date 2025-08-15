<?php
header("Content-Type: application/json");
include 'connection.php';

$sql = "SELECT * FROM Customer";
$stmt = sqlsrv_query($conn, $sql);

$data = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    // ✅ Fix: Only format DOB if not null
    if (!empty($row['DOB'])) {
        $row['DOB'] = $row['DOB']->format('Y-m-d');
    } else {
        $row['DOB'] = null;
    }
    $data[] = $row;
}

echo json_encode($data);
?>