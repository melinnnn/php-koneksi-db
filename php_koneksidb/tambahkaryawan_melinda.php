<?php
include('koneksi_melinda.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $melinda_nik = $_POST['nik_melinda'];
    $melinda_nama = $_POST['nama_melinda'];
    $melinda_email = $_POST['email_melinda'];
    $melinda_gaji = $_POST['gaji_melinda'];
    $melinda_tglmsk = $_POST['tanggal_masuk_melinda'];
    $melinda_divisi = $_POST['divisi_id_melinda'];

    $melinda_sql = "INSERT INTO karyawan_melinda (nik_melinda, nama_melinda, email_melinda, gaji_melinda, tanggal_masuk_melinda, divisi_id_melinda) 
    VALUES ('$melinda_nik', '$melinda_nama', '$melinda_email', '$melinda_gaji', '$melinda_tglmsk', '$melinda_divisi')";
    $melinda_conn->query($melinda_sql);

    header("Location: datakaryawan_melinda.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #6a5acd;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 50px;
        }

        input[type="text"], input[type="email"], input[type="number"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #ffb6c1;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #ff7f94;
        }

        a {
            color: #ff69b4;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Data Karyawan</h2>
        <form method="post">
            <input type="text" name="nik_melinda" placeholder="NIK" required>
            <input type="text" name="nama_melinda" placeholder="Nama Karyawan" required>
            <input type="email" name="email_melinda" placeholder="Email" required>
            <input type="number" name="gaji_melinda" placeholder="Gaji" required>
            <input type="date" name="tanggal_masuk_melinda">
            <select name="divisi_id_melinda" required>
                <option value="">Divisi</option>
                <option value="d001">HR</option>
                <option value="d002">IT</option>
                <option value="d003">Finance</option>
                <option value="d004">Sales</option>
                <option value="d005">Logistics</option>
            </select>
            <input type="submit" name="submit" value="Tambah Data Karyawan">
        </form>
        <br>
        <center><a href="datakaryawan_melinda.php">Kembali</a></center>
    </div>
</body>
</html>
