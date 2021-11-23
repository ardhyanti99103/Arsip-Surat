<?php 
include 'koneksi.php';
$id = $_GET['id'];

// hapus file lama
$lama = mysqli_query($koneksi,"select * from arsip_surat where id='$id'");
$l = mysqli_fetch_assoc($lama);
$nama_file_lama = $l['file'];
unlink("arsip/".$nama_file_lama);

mysqli_query($koneksi, "delete from arsip_surat where id='$id'");
header("location:index.php?alert=delete");
