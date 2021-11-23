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
            <div class="col-xl-6 col-xxl-12">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">Form Edit Arsip Surat</h4>
                    </div>
                    <?php 
                    $id = $_GET['id'];  
                    $arsip = mysqli_query($koneksi,"SELECT kategori.nama as namakat, kategori.id, arsip_surat.id,arsip_surat.no_surat, arsip_surat.judul, arsip_surat.id_kategori, arsip_surat.file , arsip_surat.tanggal   
                            FROM arsip_surat , kategori WHERE kategori.id = arsip_surat.id_kategori and arsip_surat.id='$id'");
                    while($p = mysqli_fetch_array($arsip)){
                    ?>

                    <form role="form" method="POST" action="arsip_update.php" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="basic-form text-dark">
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label><strong>Nomor Surat</strong></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                                <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?php echo $p['no_surat']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="form-grup row">
                                            <div class="col-md-3">
                                                <label><strong>Kategori</strong></label>
                                            </div>
                                            <div class="col-md-9">
                                                <select id="inputState" id="id_kategori" name="id_kategori" class="form-control">
                                                    <option value="">-- Pilih Kategori --</option>
                                                    <option value="1" <?php $p['id_kategori'] == '1' ? print "selected" : ""; ?>>Undangan</option>
                                                    <option value="2" <?php $p['id_kategori'] == '2' ? print "selected" : ""; ?>>Pengumuman</option>
                                                    <option value="3" <?php $p['id_kategori'] == '3' ? print "selected" : ""; ?>>Nota Dinas</option>
                                                    <option value="4" <?php $p['id_kategori'] == '4' ? print "selected" : ""; ?>>Pemberitahuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label><strong>Judul</strong></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $p['judul']; ?>" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="form-grup row">
                                            <div class="col-md-3">
                                                <label><strong>File Surat (PDF)</strong></label>
                                            </div>
                                            <div class="col-md-9"> 
                                                <input type="file" id="file" name="file">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> <!--end of card body -->
                        <div class="card-footer">
                            <a href="index.php" class="btn btn-primary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div> 
                            
                    </form>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>


    </div>
</div>

<?php
include 'layout/footer.php';
?>