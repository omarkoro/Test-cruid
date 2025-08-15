<?php
header("Content-Type: application/json");
include 'connection.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data["ID"])) {
    echo json_encode(["error" => "Invalid or missing JSON body."]);
    exit;
}

$sql = "UPDATE Customer SET Fname = ?, Lname = ?, DOB = ?, Mobile = ?, Address = ? WHERE ID = ?";
$params = [
    $data["Fname"] ?? null,
    $data["Lname"] ?? null,
    $data["DOB"] ?? null,
    $data["Mobile"] ?? null,
    $data["Address"] ?? null,
    $data["ID"]
];

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt) {
    echo json_encode(["message" => "Customer updated successfully"]);
} else {
    echo json_encode(["error" => sqlsrv_errors()]);
}
?>