<?php 


$connect = new mysqli("localhost","root","","db_e-voting");

if($connect){
}else{

    echo "Connection Failed";
    exit();	
}


// $username = isset($_POST['username']) ? $_POST['username'] : '';

// $password = isset($_POST['password']) ? $_POST['password'] : '';

$queryResult=$connect->query("SELECT * FROM tbl_pemilih INNER JOIN tbl_jadwal_pemilihan ON tbl_pemilih.rt_pemilih = tbl_jadwal_pemilihan.rt_pemilih ");



$result=array();

while($fetchData=$queryResult->fetch_assoc()){

	$result[]=$fetchData;

}

echo json_encode($result);

 ?>