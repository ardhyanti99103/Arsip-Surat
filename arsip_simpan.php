<?php 
include 'koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$no_surat       = $_POST['no_surat'];
$id_kategori    = $_POST['id_kategori'];
$judul          = $_POST['judul'];		
$tanggal        = date('Y/m/d h:i:sa'); 

$rand = rand();

$filename = $_FILES['file']['name'];
$jenis = pathinfo($filename, PATHINFO_EXTENSION);

if($jenis != "pdf") {
    header("location:index.php?alert=gagal");
}else{
    move_uploaded_file($_FILES['file']['tmp_name'], 'arsip/'.$rand.'_'.$filename);
    $nama_file = $rand.'_'.$filename;
     mysqli_query($koneksi, "insert into arsip_surat values (NULL,'$no_surat','$id_kategori','$judul','$nama_file','$tanggal')")or die(mysqli_error($koneksi));
	 header("location:index.php?alert=sukses");
	
}
