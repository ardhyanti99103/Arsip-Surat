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

        <!-- row -->
        <!-- <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text text-dark">
                    <span>Unggah surat yang telah terbit pada form ini untuk diarsipkan.</span>
                    <p>Catatan: Gunakan file berformat PDF</p>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">Form Tambah Arsip Surat</h4>
                    </div>
                    
                    <form role="form" method="POST" action="arsip_simpan.php" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="basic-form text-dark">
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label><strong>Nomor Surat</strong></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="Nomor Surat">
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
                                                    <option value="1">Undangan</option>
                                                    <option value="2">Pengumuman</option>
                                                    <option value="3">Nota Dinas</option>
                                                    <option value="4">Pemberitahuan</option>
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
                                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="form-grup row">
                                            <div class="col-md-3">
                                                <label><strong>File Surat (PDF)</strong></label>
                                            </div>
                                            <div class="col-md-9"> 
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file" name="file">
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> <!--end of card body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>     
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

<?php
include 'layout/footer.php';
?>