<?php 


$connect = new mysqli("localhost","root","","db_e-voting");

if($connect){
}else{

    echo "Connection Failed";
    exit();	
}


$nik = '123456789';

$kk = '123456789';

$queryResult=$connect->query("SELECT * FROM tbl_pemilih INNER JOIN tbl_jadwal_pemilihan ON tbl_pemilih.rt_pemilih = tbl_jadwal_pemilihan.rt_pemilih WHERE noNik_pemilih='".$nik."' and noKK_pemilih='".$kk."' ");

$result=array();

while($fetchData=$queryResult->fetch_assoc()){

	$result[]=$fetchData;

}

echo json_encode($result);

 ?>