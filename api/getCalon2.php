<?php 


$connect = new mysqli("localhost","root","","db_e-voting");

if($connect){
}else{

    echo "Connection Failed";
    exit();	
}


$nik = isset($_POST['nik']) ? $_POST['nik'] : '';

$rt = isset($_POST['rt']) ? $_POST['rt'] : '';

$queryResult=$connect->query("SELECT * FROM tbl_calonketuart INNER JOIN tbl_pemilih ON tbl_calonketuart.rt = tbl_pemilih.rt_pemilih WHERE rt = '".$rt."' AND noNik_pemilih = '".$nik."'");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){

	$result[]=$fetchData;

}

echo json_encode($result);

 ?>