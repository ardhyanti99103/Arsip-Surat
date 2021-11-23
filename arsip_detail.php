<?php
include 'koneksi.php';
session_start();
include 'layout/header.php';
?>

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Aplikasi Arsip Surat</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""> Arsip</a></li>
                    <li class="breadcrumb-item active"><a href="">Arsip Surat</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-primary mb-4">Detail Surat </h4>
                        <?php 
                        $id = $_GET['id'];  
                        $arsip = mysqli_query($koneksi,"SELECT kategori.nama as namakat, kategori.id, arsip_surat.id,arsip_surat.no_surat, arsip_surat.judul, arsip_surat.id_kategori, arsip_surat.file , arsip_surat.tanggal   
                                FROM arsip_surat , kategori WHERE kategori.id = arsip_surat.id_kategori and arsip_surat.id='$id'");
                        while($p = mysqli_fetch_array($arsip)){
                        ?>
                        <div class="row mb-4">
                            <div class="col-3">
                                <h5 class="f-w-500">nomer Surat <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-9"><span><?php echo $p['no_surat']; ?></span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-3">
                                <h5 class="f-w-500">Kategori <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-9"><span><?php echo $p['namakat']; ?></span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-3">
                                <h5 class="f-w-500">Judul <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-9"><span><?php echo $p['judul']; ?></span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-3">
                                <h5 class="f-w-500">Waktu Unggah <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-9"><span><?php echo $p['tanggal']; ?></span>
                            </div>
                        </div>

                        <p style="">
                        <iframe src="arsip/<?php echo $p['file']; ?>" style="width: 100%; height:600px;"></iframe>
                        </p>

                        <div class="text-center mb-2">
                        <a href="index.php" class="btn btn-primary">Kembali</a>
                        <a href="../arsip_surat/arsip/<?php echo $p['file']; ?>" class="btn btn-warning" >Unduh</a>
                        <a href="arsip_edit.php?id=<?php echo $p['id']; ?>" class="btn btn-success">Edit/Ganti File</a>
                        </div>
                        <?php 
                        }
                        ?>
                    </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include 'layout/footer.php';
?>
