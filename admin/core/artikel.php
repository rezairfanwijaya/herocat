<?php 
    require_once('../../partial/admin.php');
    require_once('../../function/function.php');
    

    // menampilkan jumlah seluruh artikel di database
    $query = mysqli_query($conn, "SELECT COUNT(id_berita) as total FROM berita");
    $result = mysqli_fetch_assoc($query);

?>

<!-- total artikel publish -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Artikel Terbit</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $result["total"]?> Artikel</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>

                </div>
            </div>
        </div>
    </div>
</div>