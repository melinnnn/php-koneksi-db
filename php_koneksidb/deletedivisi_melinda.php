<?php
session_start();
include 'koneksi_melinda.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['message'] = "ID divisi tidak valid.";
    header("Location: divisi_melinda.php");
    exit();
}

$melinda_id = $_GET['id'];

$melinda_sql = $melinda_conn->prepare("DELETE FROM divisi_melinda WHERE divisi_id_melinda = ?");
$melinda_sql->bind_param("s", $melinda_id); 

if ($melinda_sql->execute()) {
    $_SESSION['message'] = "Divisi berhasil dihapus.";
} else {
    if ($melinda_conn->errno == 1451) {
        $_SESSION['message'] = "Tidak dapat menghapus divisi karena data ini sedang digunakan.";
    } else {
        $_SESSION['message'] = "Error: " . $melinda_sql->error;
    }
}

header("Location: divisi_melinda.php");
exit();
?>
