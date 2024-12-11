<?php

$melinda_servername = "localhost";
$melinda_username = "root";
$melinda_password = "";
$melinda_dbname = "manajemen_data_karyawan_melinda";

$melinda_conn = new mysqli($melinda_servername, $melinda_username, $melinda_password, $melinda_dbname);
if (!$melinda_conn){
    die("koneksi gagal: " . mysqli_connect_error());
}
//echo "Koneksi berhasil";