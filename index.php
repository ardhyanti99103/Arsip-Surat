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
        <span>
            <?php 
            if(isset($_GET['alert'])){
                if($_GET['alert'] == "gagal"){
                    ?>
                    <div class="alert alert-danger">File surat gagal diupload. Tipe file harus PDF.</div>
                    <?php
                }elseif($_GET['alert'] == "update"){
                    ?>
                    <div class="alert alert-success">Data berhasil diubah</div>
                    <?php
                }elseif($_GET['alert'] == "delete"){
                    ?>
                    <div class="alert alert-success">Data berhasil dihapus</div>
                    <?php
                }
                else{
                    ?>
                    <div class="alert alert-success">Data berhasil disimpan</div>
                    <?php
                }
            }
            ?>
        </span>

        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Arsip Surat</h4>
                        <a href="arsip_tambah.php" type="button" class="btn btn-primary">
                        Tambah Arsip Surat 
                        <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nomor Surat</th>
                                        <th>Kategori</th>
                                        <th>Judul</th>
                                        <th>Waktu Pengarsipan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                include 'koneksi.php';
                                // $arsip = mysqli_query($koneksi,"SELECT arsip_surat.id,arsip_surat.no_surat, arsip_surat.judul, arsip_surat.id_kategori, arsip_surat.file , arsip_surat.tanggal ,kategori.nama as namakat, kategori.id    
                                // FROM arsip_surat , kategori WHERE arsip_surat.id_kategori = kategori.id");
                                $arsip = mysqli_query($koneksi,"SELECT kategori.nama as namakat, kategori.id, arsip_surat.id,arsip_surat.no_surat, arsip_surat.judul, arsip_surat.id_kategori, arsip_surat.file , arsip_surat.tanggal   
                                FROM arsip_surat , kategori WHERE kategori.id = arsip_surat.id_kategori");
                                while($p = mysqli_fetch_array($arsip)){
                                ?>
                                    <tr>
                                        <td><?php echo $p['no_surat'] ?></td>
                                        <td><?php echo $p['namakat'] ?></td>
                                        <td><?php echo $p['judul'] ?></td>
                                        <td><?php echo $p['tanggal'] ?></td>
                                        <td>
                                            <a href="arsip_delete.php?id=<?php echo $p['id']; ?>"  onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini ?')" class="btn btn-danger btn-xs">Hapus</a>
                                            <a href="arsip/<?php echo $p['file']; ?>" class="btn btn-warning btn-xs">Unduh</a>
                                            <a href="arsip_detail.php?id=<?php echo $p['id']; ?>" class="btn btn-success btn-xs">Lihat</a>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nomor Surat</th>
                                        <th>Kategori</th>
                                        <th>Judul</th>
                                        <th>Waktu Pengarsipan</th>
                                        <th>Aksi</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</div>


<?php include 'layout/footer.php'; ?>