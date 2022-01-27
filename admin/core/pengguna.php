<?php 
require_once('../../partial/admin.php');
require_once('../../function/function.php');

// hapus user
if (isset($_POST["hapus-user"])){
    $id = $_POST["id_user"];
    mysqli_query($conn, "DELETE from user WHERE id_user = $id");
    $succes= true;
}

// cek apakah data ada
$data = mysqli_query($conn, "SELECT * FROM user where level = 'user' ");
if (mysqli_num_rows($data)>0){
    $ada = true;
}else{
    $kosong = true;
}

// memunculkan data 
$user = tampil("SELECT * FROM user WHERE level NOT LIKE '%admin%' ORDER BY id_user DESC");
$no = 1;

// total user
$totalUser = tampil("SELECT COUNT(id_user)-1 as total FROM user")[0];

// cari pengguna
if (isset($_POST["btn-cari"])){
    $key = $_POST["keyword"];
    if (cariPengguna($key)){
        $user = cariPengguna($key);
    }else{
        $noMatch = true;
    }
}
?>



<div class="container">

    <!-- jika data kosong -->
    <?php if (isset($kosong)) : ?>
    <h3 class="text-center">Belum Ada Data</h3>
    <?php endif ?>
    <!-- jika data kosong -->

    <!-- jika ada data -->
    <?php if (isset($ada)) :?>

    <!-- cari user -->
    <div class="sub-header mt-5 mb-3 container d-flex justify-content-end">
        <!-- cari -->
        <form action="" method="POST">
            <div>
                <input type="text" name="keyword" placeholder="Masukan nama atau email" autocomplete="off">
            </div>
            <div>
                <button name="btn-cari" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <!-- cari -->
    </div>
    <!-- cari user -->

    <div class="table-responsive">
        <table class="table table-bordered text-center my-3">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gmail</th>
                <th>Tanggal Bergabung</th>
                <th>Hapus</th>
            </tr>

            <?php foreach($user as $u):?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$u["username"]?></td>
                <td><?=$u["gmail"]?></td>
                <td><?=date('d F Y', strtotime($u["tanggal"]))?></td>
                <td>
                    <!-- tombol hapus -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal<?=$u["id_user"]?>" data-bs-placement="bottom">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
                <div class="modal fade" id="deleteModal<?=$u["id_user"]?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin ?</h5>
                            </div>
                            <div class="modal-body">
                                <p>Tindakan ini akan menghapus akun pengguna secara permanen !</p>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_user" value="<?=$u["id_user"]?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tidak</button>
                                    <button type="submit" name="hapus-user" class="btn btn-danger">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
    <?php endif?>
</div>
<!-- jika ada data -->


<!-- notif jika data search tidak cocok -->
<?php if (isset($noMatch)) :?>
<script>
    swal({
        title: "Data Tidak Ditemukan",
        text: "Periksa kata kunci anda!",
        icon: "warning",
        button: "OK",
    });
</script>
<?php endif ?>

<!-- notif hapus user berhasil-->
<?php if (isset($succes)) :?>
<script>
    swal({
        title: "Pengguna berhasil dihapus",
        icon: "success",
        button: "OK",
    });
</script>
<?php endif ?>