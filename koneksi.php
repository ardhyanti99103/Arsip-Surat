<?php

    // variabel koneksi db  
    $host = "localhost"; 
    $usr = "root";      
    $pass = "";        
    $dbNama = "db_arsip2";  


    //fuction koneksi 
    $koneksi = mysqli_connect($host , $usr , $pass, $dbNama);
    
    //cek koneksi
    if (mysqli_connect_errno()) {
        echo "gagal terhubung :" . mysqli_connect_error() ;
    } else {
        // echo "terhubung ke db ";
    }

?>
