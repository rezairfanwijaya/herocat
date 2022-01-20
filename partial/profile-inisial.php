<?php 
 $id = $_SESSION["id"];
 $query = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id");
 $user = mysqli_fetch_assoc($query);
 $nama = $user["username"];