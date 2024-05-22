<?php
 
// Creating connection
	$conn = new mysqli("localhost", "id17258138_maul12345", "UKesJUA*myPBvOx1", "id17258138_evoting_db");
 
if ($conn->connect_error) {
 
	die("Connection failed: " . $conn->connect_error);
} 
 
	// Creating SQL command to fetch all records from Student_Data Table.
	$sql = "SELECT COUNT(*) FROM tbl_pemilih WHERE statusMemilih_pemilih='0'";
	 
	$result = $conn->query($sql);
 
	$row = mysqli_fetch_array($result);

	$total = $row[0];

	echo "Total Rows: ". $total;
	
$conn->close();

?>