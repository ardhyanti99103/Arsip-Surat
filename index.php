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
                    <h4>Aplikasi Arsip Surat</h4>
                    <ol class="breadcrumb">
                        Berikut ini adalah surat-surat yang telah terbit dan diarsipkan <br>
                        Klik "Lihat" pada kolom aksi untuk menampilkan surat
                    </ol>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""> Arsip</a></li>
                    <li class="breadcrumb-item active"><a href="">Arsip Surat</a></li>
                </ol>
            </div>
        </div>
        <span>
        <?php include 'alert.php'; ?>
        </span>

        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-2">
                            <h4 class="card-title">Cari Surat</h4>
                        </div>
                        <div class="col-10">

                        <form action="index.php" method="get">
                            <div class="input-group mb-3 mb">
                                <input type="text" class="form-control" name="cari">
                                <div class="input-group-append">
                                <input type="submit" class="btn btn-primary" value="Cari">
                                </div>
                            </div>
                        </form>
                        <?php 
                            if(isset($_GET['cari'])){
                                $cari = $_GET['cari'];
                            }
                            ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th><span class="text-muted">Nomor Surat</span></th>
                                        <th><span class="text-muted">Kategori</span></th>
                                        <th><span class="text-muted">Judul</span></th>
                                        <th><span class="text-muted">Waktu Pengarsipan</span></th>
                                        <th><span class="text-muted">Aksi</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                include 'koneksi.php';
                                if(isset($_GET['cari'])){
                                    $cari = $_GET['cari'];
                                    $arsip = mysqli_query($koneksi,"SELECT kategori.nama as namakat, kategori.id, arsip_surat.id,arsip_surat.no_surat, arsip_surat.judul, arsip_surat.id_kategori, arsip_surat.file , arsip_surat.tanggal   
                                    FROM arsip_surat , kategori WHERE kategori.id = arsip_surat.id_kategori and arsip_surat.judul like '%".$cari."%'");
                                }else{
                                    $arsip = mysqli_query($koneksi,"SELECT kategori.nama as namakat, kategori.id, arsip_surat.id,arsip_surat.no_surat, arsip_surat.judul, arsip_surat.id_kategori, arsip_surat.file , arsip_surat.tanggal   
                                    FROM arsip_surat , kategori WHERE kategori.id = arsip_surat.id_kategori");
                                }
                                while($p = mysqli_fetch_array($arsip)){
                                ?>
                                    <tr>
                                        <td><span class="text-muted"><?php echo $p['no_surat'] ?></span></td>
                                        <td><span class="text-muted"><?php echo $p['namakat'] ?></span></td>
                                        <td><span class="text-muted"><?php echo $p['judul'] ?></span></td>
                                        <td><span class="text-muted"><?php echo $p['tanggal'] ?></span></td>
                                        <td>
                                            <!-- <a href="arsip_delete.php?id=<?php echo $p['id']; ?>"  onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini ?')" class="btn btn-danger btn-xs">Hapus</a> -->
                                            <div class="modal fade" id="exampleModal_<?php echo $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">PERINGATAN!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus data ini? <br>file dan semua yang berhubungan akan dihapus secara permanen.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                                            <a href="arsip_delete.php?id=<?php echo $p['id']; ?>" class="btn btn-primary"><i class="fa fa-check"></i> &nbsp; Ya, hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal_<?php echo $p['id']; ?>"> Hapus
                                            </button>
                                            <a href="../arsip_surat/arsip/<?php echo $p['file']; ?>" class="btn btn-warning btn-xs">Unduh</a>
                                            <a href="arsip_detail.php?id=<?php echo $p['id']; ?>" class="btn btn-success btn-xs">Lihat</a>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="arsip_tambah.php" type="button" class="btn btn-primary">
                        Arsipkan Surat
                        <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</div>


<?php include 'layout/footer.php'; ?>