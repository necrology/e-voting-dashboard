<?php 

$connect = new mysqli("localhost","root","","db_e-voting");

if($connect){
}else{

	echo "Connection Failed";
        exit();	
}

?>