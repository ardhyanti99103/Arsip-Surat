<?php 
if(isset($_GET['alert'])){
    if($_GET['alert'] == "gagal"){
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> File surat gagal diupload. Tipe file harus PDF.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }elseif($_GET['alert'] == "update"){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>sukses!</strong> Data berhasil diubah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }elseif($_GET['alert'] == "delete"){
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>sukses!</strong> Data berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
    else{
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>sukses!</strong> Data berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
}
?>