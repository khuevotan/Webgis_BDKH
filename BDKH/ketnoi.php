<?php
    $host = "localhost";
    $dbname = "BDKH";
    $port = "5432";
    $user = "postgres";
    $password = "khuevotan";
    $conn = pg_connect("host = $host dbname= $dbname port= $port user = $user password = $password") 
    or die ("Could not connect to Server");
    
    if (!$conn) {
        echo die("Không thể kết nối");
    }
 
?>