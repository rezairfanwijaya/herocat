<?php
  require_once('../../partial/admin.php');
  require_once('../../function/function.php');
//   error_reporting(0);

    // ambil id 
    $id = $_GET["id"];

    // proses save edit
    if (isset($_POST["simpan"])){
        if (editArtikel($_POST) > 0){
            $success = true;
        }else{
            $failed = true;
        }
    }

    // tampilkan data dari db
    $sql = mysqli_query($conn, "SELECT * FROM berita WHERE id_berita= $id");
    $artikel = mysqli_fetch_assoc($sql);
?>

<div class="container">
    <form action="" method="POST" enctype="multipart/form-data" class="mb-5">
        <input name="id" type="hidden" value="<?=$artikel["id_berita"]?>">
        <input name="gambar_lama" type="hidden" value="<?=$artikel["gambar"]?>">

        <label for="judul">Judul Artikel</label>
        <input type="text" id="judul" name="judul" value="<?=$artikel["judul"]?>" class="form-control mb-4"
            autocomplete="off" required>
        <textarea name="artikel" id="mytextarea" autocomplete="off">
            <?=$artikel["konten"]?>
        </textarea>

        <img src="../../assets/artikel/<?=$artikel["gambar"]?>" class="my-3" width=400 ><br>

        <label for="gambar" class="">Pilih gambar sebagai header </label>
        <input type="file" name="gambar" class="form-control-file ">

        <button class="btn btn-danger mt-4 px-2">
            <a href="artikel.php" class="text-white text-decoration-none">Batal</a>
        </button>
        <button name="simpan" type="submit" class="btn btn-success mt-4 ml-2 px-4">Simpan</button>
    </form>
</div>

<!-- notif save data berhasil-->
<?php if (isset($success)) :?>
<script>
    swal({
        title: "Edit Artikel Berhasil",
        icon: "success",
        button: "OK",
    });
</script>
<?php endif ?>

<!-- notif save data gagal-->
<?php if (isset($failed)) :?>
<script>
    swal({
        title: "Edit Artikel Gagal",
        icon: "error",
        button: "OK",
    });
</script>
<?php endif ?>
