<?php
include('koneksi_melinda.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $melinda_id= $_POST['divisi_id_melinda'];
    $melinda_nama = $_POST['namadivisi_melinda'];
    $melinda_lokasi = $_POST['lokasi_melinda'];


    $melinda_sql = "INSERT INTO divisi_melinda (divisi_id_melinda, namadivisi_melinda,  lokasi_melinda)
    VALUES ('$melinda_id', '$melinda_nama', '$melinda_lokasi')";
    $melinda_conn->query($melinda_sql);

    header("Location: divisi_melinda.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fef8f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff9f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            margin-top: 50px;
        }

        h2 {
            color: #ff7f7f;
            text-align: center;
        }

        input[type="text"], select, input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="text"], select {
            background-color: #fff5f5;
            color: #555;
        }

        input[type="submit"] {
            background-color: #ffa7a7;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ff7f7f;
        }

        a {
            display: block;
            text-align: center;
            color: #ff7f7f;
            text-decoration: none;
            margin-top: 20px;
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
        <input type="text" name="divisi_id_melinda" placeholder="ID Divisi" required><br>
        <select name="namadivisi_melinda" id="">
        <option value="Semua Divisi">Divisi</option>
        <option value="HR">HR</option>
        <option value="IT">IT</option>
        <option value="Finance">Finance</option>
        <option value="Sales">Sales</option>
        <option value="Logistics">Logistics</option>
    </select>
    <br>
        <input type="text" name="lokasi_melinda" placeholder="Lokasi" required><br>
        <input type="submit" name="submit" value="Tambah Data Divisi">
    </form>
    <br><br>
    <a href="home_melinda.php" class="a">Kembali</a>
</center>
</div>
</body>
</html>