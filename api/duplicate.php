<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_e-voting";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT (SELECT COUNT(noNik_pemilih) FROM tbl_pemilih GROUP BY noNik_pemilih LIMIT 1) = (SELECT COUNT(noNik_pemilih) FROM tbl_pemilih WHERE noNik_pemilih = '12345678231')";
$result = $conn->query($sql);

if ($result->fetch_row()[0] == 1) {
    echo "data sama";
} else {
    echo "data berbeda";
}
