<?php 


$connect = new mysqli("localhost","root","","db_e-voting");

if($connect){
}else{

    echo "Connection Failed";
    exit();	
}


$nik = isset($_POST['nik']) ? $_POST['nik'] : '';

$queryResult=$connect->query("SELECT * FROM tbl_pemilih WHERE noNik_pemilih='".$nik."'");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){

	$result[]=$fetchData;

}

echo json_encode($result);

 ?>