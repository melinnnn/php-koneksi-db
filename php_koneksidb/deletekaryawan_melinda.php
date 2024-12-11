<?php
session_start();
include 'koneksi_melinda.php';

$melinda_nik = $_GET['id'];
$melinda_sql = "DELETE FROM karyawan_melinda WHERE nik_melinda=$melinda_nik";
if ($melinda_conn->query($melinda_sql) === TRUE) {
    $_SESSION['message'] = "Data Karyawan Berhasil Dihapus.";
} else {
    $_SESSION['message'] = "Error: " . $melinda_sql . "<br>" . $melinda_conn->error;
}
header("Location: datakaryawan_melinda.php");
exit();