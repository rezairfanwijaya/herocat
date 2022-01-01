<?php
require_once('../partial/admin.php');
require_once ('../function/function.php');

if (isset($_POST["simpan"])){
    
}


?>

<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Produk
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                        <span style="font-size: 20px;">
                            <i class="fas fa-times-circle"></i>
                        </span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kucing</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis Kucing</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Kucing</label>
                            <textarea name="dekskripsi" autocomplete="off" id="deskripsi" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" autocomplete="off">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>