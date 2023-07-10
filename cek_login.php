<?php

// aktifkan session
session_start();

// panggil koneksi database
include "koneksi.php";

@$pass = md5($_POST['password']);
@$username = mysqli_escape_string($koneksi, $_POST['username']);
@$password = mysqli_escape_string($koneksi, $_POST['password']);


$login = mysqli_query($koneksi, "SELECT * FROM tb_user where username = '$username'
and password = '$password' and status = 'Aktif'");

$data = mysqli_fetch_array($login);

// Uji jika username dan password ditambahkan/sesuai
if ($data) {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama_pengguna'] = $data['nama_pengguna'];

    // Arahkan ke halaman admin
    header('location:admin.php');
} else {
    echo "<script>
    alert('Maaf, Login Gagal, Pastikan Username dan Password anda Benar...!');
    document.location='index.php';</script>";
}
?>