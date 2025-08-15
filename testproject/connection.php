<?php
$serverName = "Omer\SQLEXPRESS"; // or your SQL Server name
$connectionOptions = array(
    "Database" => "testcruid",    // Your SQL Server DB name
    "Uid" => "Koro",     // Your SQL Server username
    "PWD" => "123456",     // Your SQL Server password
    "CharacterSet" => "UTF-8"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn) {
    echo "✅ You are connected to SQL Server.";
} else {
    echo "❌ Connection failed.";
    die(print_r(sqlsrv_errors(), true));
}
?>