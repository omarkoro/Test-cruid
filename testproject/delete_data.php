<?php
header("Content-Type: application/json");
include 'connection.php';

// Get JSON body
$data = json_decode(file_get_contents("php://input"), true);

// Check if ID is provided
if (!$data || !isset($data["ID"])) {
    echo json_encode(["error" => "Missing ID in request."]);
    exit;
}

$sql = "DELETE FROM Customer WHERE ID = ?";
$params = [$data["ID"]];

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt) {
    echo json_encode(["message" => "Customer deleted successfully"]);
} else {
    echo json_encode(["error" => sqlsrv_errors()]);
}
?>