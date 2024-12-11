<?php 
session_start(); 
include('koneksi_melinda.php'); 
$melinda_users = mysqli_query($melinda_conn, "SELECT * FROM divisi_melinda"); 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Divisi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fef8f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff9f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            margin-top: 50px;
        }

        h1 {
            color: #ff7f7f;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #ffa7a7;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #fff5f5;
        }

        table tr:hover {
            background-color: #ffe3e3;
        }

        a {
            text-decoration: none;
            color: #ff7f7f;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin: 10px 0;
            background-color: #ffa7a7;
            color: white;
            border-radius: 5px;
            text-align: center;
        }

        .btn:hover {
            background-color: #ff7f7f;
        }

        .action-buttons a {
            margin: 0 5px;
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .action-buttons a:first-child {
            background-color: #ffd580;
        }

        .action-buttons a:first-child:hover {
            background-color: #ffc04c;
        }

        .action-buttons a.hapus {
            background-color: #ff7f7f;
        }

        .action-buttons a.hapus:hover {
            background-color: #e56767;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Divisi</h1>
        <a href="tambahdivisi_melinda.php" class="btn">Tambah Data Divisi</a>
        <table>         
            <tr>             
                <th>ID</th>             
                <th>Nama Divisi</th>             
                <th>Lokasi</th>                        
                <th>Aksi</th>         
            </tr>         
            <?php while ($melinda_user = $melinda_users->fetch_assoc()): ?>         
            <tr>             
                <td><?= $melinda_user['divisi_id_melinda'];?></td>             
                <td><?= $melinda_user['namadivisi_melinda']?></td>             
                <td><?= $melinda_user['lokasi_melinda']?></td>                
                <td class="action-buttons">
                    <a href="editdivisi_melinda.php?id=<?= $melinda_user['divisi_id_melinda']; ?>">Edit</a>
                    <a href="deletedivisi_melinda.php?id=<?= $melinda_user['divisi_id_melinda']; ?>" class="hapus" onclick="return confirm('Hapus Data?')">Hapus Data</a>
                </td>         
            </tr>         
            <?php endwhile; ?>     
        </table>
        <a href="home_melinda.php" class="btn">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
