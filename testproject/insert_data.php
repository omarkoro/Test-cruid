<?php
header("Content-Type: application/json");
include 'connection.php';

// Read the JSON body
$data = json_decode(file_get_contents("php://input"), true);

// Check if JSON is missing or invalid
if (!$data || !isset($data["Fname"])) {
    echo json_encode(["error" => "Invalid or missing JSON body."]);
    exit;
}

// SQL INSERT
$sql = "INSERT INTO Customer (Fname, Lname, DOB, Mobile, Address) VALUES (?, ?, ?, ?, ?)";
$params = [
    $data["Fname"] ?? null,
    $data["Lname"] ?? null,
    $data["DOB"] ?? null,
    $data["Mobile"] ?? null,
    $data["Address"] ?? null
];

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt) {
    echo json_encode(["message" => "Customer inserted successfully"]);
} else {
    echo json_encode(["error" => sqlsrv_errors()]);
}
?>