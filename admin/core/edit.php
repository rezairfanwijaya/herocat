<?php 
require_once('../../partial/admin.php');
require_once('../../function/function.php');

// ambil kucing yang dipilih berdasar id
$id = $_GET["id"];
$query = mysqli_query($conn, "SELECT * FROM kucing WHERE id_kucing=$id");
$kucing = mysqli_fetch_assoc($query);

// proses penyimpanan
if (isset($_POST["simpan"])){
    if (edit($_POST) > 0){
        $berhasil = true;
    }else if (edit($_POST) < 0){
        $gagal = true;
    }
    
    
}
?>


<!-- <h3 class="px-5 my-4">Edit Data</h3> -->

<form class="p-5 shadow mt-5 mx-5 edit" action="" method="POST" enctype="multipart/form-data">

    <h4 class="text-center mb-5">Edit Data</h4>

    <!-- ambil id dan gambar lama -->
    <input type="hidden" name="id" value="<?=$kucing["id_kucing"]?>">
    <input type="hidden" name="gambar_lama" value="<?=$kucing["gambar"]?>">

    <!-- nama kucing -->
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Kucing</label>
        <input type="text" name="nama" id="nama" value="<?=$kucing["nama_kucing"]?>" class="form-control"
            autocomplete="off">
    </div>

    <!-- jenis kucing -->
    <div class="mb-3">
        <label for="jenis" class="form-label">Jenis Kucing</label>
        <input type="text" name="jenis" class="form-control" value="<?=$kucing["jenis_kucing"]?>" id="jenis"
            autocomplete="off">
    </div>

    <!-- stok kucing -->
    <div class="mb-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" value="<?=$kucing["stok"]?>" id="stok" autocomplete="off">
    </div>

    <!-- deskripsi kucing -->
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" autocomplete="off"><?=$kucing["deskripsi_kucing"]?></textarea>
    </div>

    <!-- gambar kucing yang lama -->
    <div class="mb-3">
        <img src="../../assets/adopsi/<?=$kucing["gambar"]?>" class="edit img-thumbnail">
    </div>

    <!-- gambar kucing yang baru -->
    <div class="mb-5">
        <label for="deskripsi" class="form-label">Gambar</label> <br>
        <input type="file" name="gambar">
    </div>



    <a href="produk.php" class="btn btn-secondary mx-2">
        Batal
    </a>

    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
</form>

<!-- notif berhasil -->
<?php if(isset($berhasil)) :?>
<script>
    swal({
        title: "Data Berhasil Diubah",
        icon: "success",
        button: "OK",
    })
    .then((berhasil)=>{
        location.href ='produk.php'
    })
</script>
<?php endif?>

<!-- notif gagal -->
<?php if(isset($gagal)) :?>
<script>
    swal({
        title: "Data Gagal Diubah",
        icon: "warning",
        button: "OK",
    });
</script>
<?php endif?>