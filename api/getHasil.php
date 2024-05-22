<?php 


$connect = new mysqli("localhost","root","","db_e-voting");

if($connect){
}else{

    echo "Connection Failed";
    exit();	
}


// $nik = isset($_POST['nik']) ? $_POST['nik'] : '';

$queryResult=$connect->query("SELECT * FROM tbl_hasil_pemilihan WHERE hasil_pemilihan_rt='1'");
$result=array();

while($row=mysqli_fetch_assoc($queryResult)){

	$result[]=$row;

}

echo json_encode($result);

 ?>