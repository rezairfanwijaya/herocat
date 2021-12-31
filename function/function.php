<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "herocat");
// jika database error
if (!$conn) {

  header('location:function/error.html');
  return false;
}



// read data
function tampil ($sql){
  global $conn;
  
  $query = mysqli_query($conn, $sql);
  $rows = [];
  while ($row = mysqli_fetch_assoc($query)){
    $rows [] = $row;
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
