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
    <div class="alert alert-warning alert-dismissible fade show sticky-top" role="alert">
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
                ('', '$username', '$password', '$gmail', 'user')

    ";

  // melakukan query
  mysqli_query($conn, $sqll);

  return mysqli_affected_rows($conn);
}

// tambah data kucing
function addData($data)
{
  global $conn;
  $nama = htmlspecialchars($data["nama"]);
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
          ('', '$nama', '$jenis', '$deskripsi', $stok, '$gambar')
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
        nama_kucing LIKE '%$keyword%' OR
        jenis_kucing LIKE '%$keyword%' OR
        stok LIKE '%$keyword%'
    ";
    
     return tampil($sql);
}

// cari data for user
function cariDataUser($keyword){
    
    $sql = "SELECT * FROM kucing WHERE 
        nama_kucing LIKE '%$keyword%'
    ";
    
     return tampil($sql);
}

// hapus data
function hapus ($id){
  global $conn;

  mysqli_query($conn, "DELETE FROM kucing WHERE id_kucing = $id");

  return mysqli_affected_rows($conn);
}

// edit data
function edit($data){
  global $conn;

  // ambil data yang diinput user
  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
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
        nama_kucing = '$nama',
        jenis_kucing = '$jenis',
        deskripsi_kucing = '$deskripsi',
        stok = '$stok',
        gambar = '$gambar'
        WHERE id_kucing = $id
  ";

  mysqli_query($conn, $sql);
  return mysqli_affected_rows($conn);
}

// function reload page
function relaod(){
  header("Refresh:0");
}