<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_e-voting";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $nik = isset($_POST['nik']) ? $_POST['nik'] : '';
    $rt = isset($_POST['rt']) ? $_POST['rt'] : '';
    $nik_pemilih = isset($_POST['nik_pemilih']) ? $_POST['nik_pemilih'] : '';


    $sql = "UPDATE tbl_hasil_pemilihan SET hasil_pemilihan_suara = hasil_pemilihan_suara + 1 WHERE nik_calon = '$nik';
            UPDATE tbl_hasil_pemilihan SET hasil_pemilihan_golput = hasil_pemilihan_golput - 1 WHERE hasil_pemilihan_rt = '$rt';
            UPDATE tbl_pemilih SET statusMemilih_pemilih = 1 WHERE noNik_pemilih = '$nik_pemilih'";
    
    // -- $sql = "UPDATE pegawai SET status_memilih = 1 WHERE id='$id'";
    
    if ($conn->multi_query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
?>