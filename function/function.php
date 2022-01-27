<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "herocat");

// jika database error
if (!$conn) {

  header('location:function/error.html');
  return false;
}



// read data
function tampil($sql)
{
  global $conn;

  $query = mysqli_query($conn, $sql);
  $rows = [];
  while ($row = mysqli_fetch_assoc($query)) {
    $rows[] = $row;
  }
  return $rows;
}


// Registrasi
function register($data)
{

  global $conn;

  // ambil data yg di input user
  $username = htmlspecialchars($data["username"]);
  $gmail = htmlspecialchars($data["gmail"]);
  $password = htmlspecialchars($data["password"]);

  // username harus lowercase dan tidak boleh ada tanda aneh
  $username = strtolower(stripslashes(str_replace("'", '', $username)));

  // username tidak boleh sama dengan orang lain
  $sql = "SELECT * FROM user where username = '$username'";

  // jika sama, sampaikan pesan error
  $query = mysqli_query($conn, $sql);
  if (mysqli_num_rows($query)) {
    echo '
    <div class="alert alert-danger alert-dismissible fade show sticky-top" role="alert">
    <strong>Mohon maaf!</strong> Username telah digunakan,gunakan username yang berbeda.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
    ';

    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // masukan data ke database
  $sqll =  "INSERT INTO user
                VALUES
                ('', '$username', '$password', '$gmail', 'user', current_timestamp())

    ";

  // melakukan query
  mysqli_query($conn, $sqll);

  return mysqli_affected_rows($conn);
}

// tambah data kucing
function addData($data)
{
  global $conn;
  $jenis = htmlspecialchars($data["jenis"]);
  $deskripsi = htmlspecialchars($data["deskripsi"]);
  $stok = htmlspecialchars($data["stok"]);
  $gambar = upload();
  // jika tidak upload gambar
  if (!$gambar){
    return false;
  }

  $sql = "INSERT INTO kucing 
          VALUES
          ('', '$jenis', '$deskripsi', $stok, '$gambar')
  ";

  mysqli_query($conn, $sql);
  return mysqli_affected_rows($conn);
  
}

// upload gambar
function upload()
{
  $nama_gambar = $_FILES["gambar"]["name"];
  $tmpfile = $_FILES["gambar"]["tmp_name"];
  $size_gambar = $_FILES["gambar"]["size"];


  // cek apakah ekstensi file adalah file gambar
  $ekstensivalid = ["jpg", "png", "jpeg"];
  $ekstensiuser = explode('.', $nama_gambar);
  $ekstensifinal = end($ekstensiuser);

 
  if (!in_array($ekstensifinal, $ekstensivalid)) {
    echo "
            <script>
                alert('Masukan ekstensi file jpg,png atau jpeg')
            </script>
       ";

    return false;
  }

  // cek apakah size gambar sesuai
  if ($size_gambar > 2000000) {
    echo "
        <script>
            alert('Ukuran file maksimal 2MB')
        </script>
        ";
    return false;
  }


  // ubah nama file yang akan di upload ke database
  $namagambarbaru = uniqid();
  $namagambarbaru .= '.';
  $namagambarbaru .= $ekstensifinal;

  // jika sudah benar semua maka upload

  move_uploaded_file($tmpfile, '../../assets/adopsi/'. $namagambarbaru);

  return $namagambarbaru;

}


// cari data for admin
function cari($keyword){
    
    $sql = "SELECT * FROM kucing WHERE 
        
        jenis_kucing LIKE '%$keyword%' OR
        stok LIKE '%$keyword%'
    ";
    
     return tampil($sql);
}

// cari data for user
function cariDataUser($keyword){
    
    $sql = "SELECT * FROM kucing WHERE 
        jenis_kucing LIKE '%$keyword%'
    ";
    
     return tampil($sql);
}

// hapus data
function hapus ($id){
  global $conn;

  mysqli_query($conn, "DELETE FROM kucing WHERE id_kucing = $id");

  return mysqli_affected_rows($conn);
}

// edit data kucing
function edit($data){
  global $conn;

  // ambil data yang diinput user
  $id = $data["id"];
  $jenis = htmlspecialchars($data["jenis"]);
  $deskripsi = htmlspecialchars($data["deskripsi"]);
  $stok = htmlspecialchars($data["stok"]);
  $gambar_lama = htmlspecialchars($data["gambar_lama"]);


  // cek apakah user unggah gambar baru
  if ($_FILES["gambar"]["error"] === 4){
    // jika tidak mengunggah gambar baru, pake gambar lama
    
    $gambar = $gambar_lama;
  }else{
    // ketika mengungah gambar baru
    $gambar = upload();
    if(!$gambar){
      return false;
    }
  }

  // masukan data ke database
  $sql = "UPDATE kucing SET
        jenis_kucing = '$jenis',
        deskripsi_kucing = '$deskripsi',
        stok = '$stok',
        gambar = '$gambar'
        WHERE id_kucing = $id
  ";

  mysqli_query($conn, $sql);
  return mysqli_affected_rows($conn);
}


// function upload artikel
function addArticles($data){
  global $conn;
  $judul = htmlspecialchars($data["judul"]);
 

  // jika isi artikel kosong
  if ($_POST["artikel"]===""){
    echo '
    <div class="alert alert-warning alert-dismissible fade show sticky-top" role="alert">
    <strong>Mohon maaf!</strong> Isi artikel tidak boleh kosong
  </div>
    ';
    return false;
  }else{
    $konten = $data["artikel"];
  }

  $gambar = uploadGambarArtikel();
  if (!$gambar){
    return false;
  }

  
  $sql = "INSERT INTO berita VALUES
        ('', '$judul', '$konten', '$gambar', current_timestamp())
  ";

  mysqli_query($conn, $sql);
  return mysqli_affected_rows($conn);
}


// upload gambar dari artikel
function uploadGambarArtikel()
{
  $nama_gambar = $_FILES["gambar"]["name"];
  $tmpfile = $_FILES["gambar"]["tmp_name"];
  $size_gambar = $_FILES["gambar"]["size"];


  // cek apakah ekstensi file adalah file gambar
  $ekstensivalid = ["jpg", "png", "jpeg"];
  $ekstensiuser = explode('.', $nama_gambar);
  $ekstensifinal = end($ekstensiuser);

 
  if (!in_array($ekstensifinal, $ekstensivalid)) {
    echo "
            <script>
                alert('Masukan ekstensi file jpg,png atau jpeg')
            </script>
       ";

    return false;
  }

  // cek apakah size gambar sesuai
  if ($size_gambar > 2000000) {
    echo "
        <script>
            alert('Ukuran file maksimal 2MB')
        </script>
        ";
    return false;
  }


  // ubah nama file yang akan di upload ke database
  $namagambarbaru = uniqid();
  $namagambarbaru .= '.';
  $namagambarbaru .= $ekstensifinal;

  // jika sudah benar semua maka upload

  move_uploaded_file($tmpfile, '../../assets/artikel/'. $namagambarbaru);

  return $namagambarbaru;

}

// function search arikel admin
function cariDataArtikel($key){
  
  $query = "SELECT * FROM berita WHERE judul LIKE '%$key%'";
  return tampil($query);

}

// hapus data artikel
function hapusArtikel($id){
  global $conn;

  mysqli_query($conn, "DELETE FROM berita WHERE id_berita=$id");

  return mysqli_affected_rows($conn);
}

// edit data artikel
function editArtikel($data){
  global $conn;

  $id = $data["id"];
  $gambarLama = $data["gambar_lama"];
  $judul = htmlspecialchars($data["judul"]);
  // jika isi artikel kosong
  if ($_POST["artikel"]===""){
    echo '
    <div class="alert alert-warning alert-dismissible fade show sticky-top" role="alert">
    <strong>Mohon maaf!</strong> Isi artikel tidak boleh kosong
    
  </div>
    ';
    return false;
  }else{
    $konten = $data["artikel"];
  }

  
  // apakah user upload gambar baru
  if ($_FILES["gambar"]["error"] === 4){
    $gambar = $gambarLama;
  }else{
    $gambar= uploadGambarArtikel();
    if (!$gambar){
      return false;
    }
  }

  // jika udah siap semua tinggal update ke db
  $sql = "UPDATE berita SET
      judul = '$judul',
      konten = '$konten',
      gambar = '$gambar',
      tanggal = current_timestamp()
      WHERE id_berita = $id
  ";

  mysqli_query($conn, $sql);

  return mysqli_affected_rows($conn);

}

// donasi
function donasi($data){
  global $conn;
  $id_user = $data["id_user"];
  $nama = $data["nama"];
  $telpon = $data["telpon"];
  $nominal = $data["nominal"];
  $norek = $data["norek"];

  // minimal donasi adalah 5000
  if ($nominal < 1000){
    echo '
    <div class="alert alert-warning alert-dismissible fade show sticky-top" role="alert">
    <strong>Mohon maaf!</strong> Minimal donasi adalah Rp 1.000
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
    ';
    return false;
  }

  // cek apakah memasukan metode donasi
  if (!isset($data["metode"])){
    echo '
    <div class="alert alert-warning alert-dismissible fade show sticky-top" role="alert">
    <strong>Mohon maaf!</strong> Pilih metode donasi terlebih dahulu
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
    ';
    return false;
  }else{
    $metode = $data["metode"];
  }

  // masukan data ke db
  $sql = "INSERT INTO donasi
            VALUES
          ('','$nama', '$telpon', $nominal, '$norek', '$id_user', '$metode', current_timestamp())
  ";

  mysqli_query($conn, $sql);

  return mysqli_affected_rows($conn);


}

// adopsi
function adopsi($data){
  global $conn;

  // ambil data dari user
  $id_user = $data["id_user"];
  $id_kucing = $data["id_kucing"];
  $nama = htmlspecialchars($data["nama"]);
  $telpon = htmlspecialchars($data["telpon"]);
  $alamat = htmlspecialchars($data["alamat"]);


  // input data ke db
  $sql = "INSERT INTO adopsi
            VALUES 
          ('', '$nama', '$telpon', '$alamat', '$id_kucing', '$id_user', current_timestamp())
  ";

  $sqlStok = " UPDATE kucing 
              SET stok = stok-1 WHERE id_kucing = $id_kucing
  ";

  mysqli_query($conn, $sql);
  mysqli_query($conn, $sqlStok);
  return mysqli_affected_rows($conn);
}

// cari data pengguna oleh admin
function cariPengguna($key){
  global $conn;
  $sql = "SELECT * FROM user 
          WHERE 
          username LIKE '%$key%' OR
          gmail LIKE '%$key%'
          
  ";

  return tampil($sql);

  
}