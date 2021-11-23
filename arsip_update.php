<?php 
include 'koneksi.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

$id             = $_POST['id'];
$no_surat       = $_POST['no_surat'];
$id_kategori    = $_POST['id_kategori'];
$judul          = $_POST['judul'];

$rand = rand();

$filename = $_FILES['file']['name'];

if($filename == ""){

    mysqli_query($koneksi, "update arsip_surat set no_surat='$no_surat', id_kategori='$id_kategori', judul='$judul' where id='$id'")or die(mysqli_error($koneksi));

    header("location:index.php?alert=update");

}else{

    $jenis = pathinfo($filename, PATHINFO_EXTENSION);

    if($jenis != "pdf") {
        header("location:index.php?alert=gagal");
    }else{
        // hapus file lama
        $lama = mysqli_query($koneksi,"select * from arsip_surat where id='$id'");
        $l = mysqli_fetch_assoc($lama);
        $nama_file_lama = $l['file'];
        unlink("arsip/".$nama_file_lama);

        // upload file baru
        move_uploaded_file($_FILES['file']['tmp_name'], 'arsip/'.$rand.'_'.$filename);
        $nama_file = $rand.'_'.$filename;
        mysqli_query($koneksi, "update arsip_surat set no_surat='$no_surat', id_kategori='$id_kategori', judul='$judul', file='$nama_file' where id='$id'")or die(mysqli_error($koneksi));
        header("location:index.php?alert=update");
    }
}

