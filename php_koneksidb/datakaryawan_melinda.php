<?php 
session_start();
include('koneksi_melinda.php'); 

$melinda_divisi = isset($_POST['divisi']) ? $_POST['divisi'] : 'Semua Divisi';
$melinda_tglmasuk1 = isset($_POST['tglmsk']) ? $_POST['tglmsk'] : '';
$melinda_tglmasuk2 = isset($_POST['tgl']) ? $_POST['tgl'] : '';

// Base query
$melinda_sql = "SELECT k.*, d.namadivisi_melinda 
                FROM karyawan_melinda k
                INNER JOIN divisi_melinda d 
                ON k.divisi_id_melinda = d.divisi_id_melinda";

// Adding filters
if ($melinda_divisi != 'Semua Divisi' || (!empty($melinda_tglmasuk1) && !empty($melinda_tglmasuk2))) {
    $melinda_sql .= " WHERE";

    if ($melinda_divisi != 'Semua Divisi') {
        $melinda_sql .= " d.namadivisi_melinda = '$melinda_divisi'";
    }

    if (!empty($melinda_tglmasuk1) && !empty($melinda_tglmasuk2)) {
        if ($melinda_divisi != 'Semua Divisi') {
            $melinda_sql .= " AND";
        }
        $melinda_sql .= " k.tanggal_masuk_melinda BETWEEN '$melinda_tglmasuk1' AND '$melinda_tglmasuk2'";
    }
}

$melinda_users = $melinda_conn->query($melinda_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; 
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding-top: 20px;
            color: #6a5acd; 
        }

        a {
            color: #ff69b4; 
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            border-radius: 10px;
        }

        .form-container {
            margin-bottom: 20px;
        }

        .form-container input,
        .form-container select {
            padding: 10px;
            margin: 5px 0;
            width: 220px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container input[type="date"] {
            width: 200px;
        }

        .form-container input[type="submit"] {
            width: 120px;
            background-color: #ffb6c1; 
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .form-container input[type="submit"]:hover {
            background-color: #ff7f94; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #b0e0e6; 
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f0f8ff; 
        }

        .action-buttons {
            text-align: center;
        }

        .action-buttons a {
            color: #6a5acd; 
            text-decoration: none;
            margin: 0 5px;
        }

        .action-buttons a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Data Karyawan</h1>

        <a href="tambahkaryawan_melinda.php">Tambah Data Karyawan</a>

        <form action="" method="post" class="form-container">
            <label for="divisi">Divisi:</label>
            <select name="divisi" id="divisi">
                <option value="Semua Divisi">Semua Divisi</option>
                <option value="HR" <?php if($melinda_divisi == 'HR') echo 'selected'; ?>>HR</option>
                <option value="IT" <?php if($melinda_divisi == 'IT') echo 'selected'; ?>>IT</option>
                <option value="Finance" <?php if($melinda_divisi == 'Finance') echo 'selected'; ?>>Finance</option>
                <option value="Sales" <?php if($melinda_divisi == 'Sales') echo 'selected'; ?>>Sales</option>
                <option value="Logistics" <?php if($melinda_divisi == 'Logistics') echo 'selected'; ?>>Logistics</option>
            </select>

            <label for="tglmsk">Tanggal Masuk:</label>
            <input type="date" name="tglmsk" value="<?= $melinda_tglmasuk1 ?>">

            <label for="tgl">Sampai:</label>
            <input type="date" name="tgl" value="<?= $melinda_tglmasuk2 ?>">

            <input type="submit" name="cari" value="Cari">
        </form>

        <table>         
            <tr>             
                <th>NIK</th>             
                <th>Nama</th>             
                <th>Email</th>             
                <th>Gaji</th>             
                <th>Tanggal Masuk</th> 
                <th>Divisi</th>            
                <th>Aksi</th>         
            </tr>         
            <?php while ($melinda_user = $melinda_users->fetch_assoc()): ?>         
            <tr>             
                <td><?= $melinda_user['nik_melinda'];?></td>             
                <td><?= $melinda_user['nama_melinda']?></td>             
                <td><?= $melinda_user['email_melinda']?></td>     
                <td><?= $melinda_user['gaji_melinda']?></td>        
                <td><?= $melinda_user['tanggal_masuk_melinda']?></td>             
                <td><?= $melinda_user['namadivisi_melinda']?></td>            
                <td class="action-buttons">                 
                    <a href="editkaryawan_melinda.php?id=<?= $melinda_user['nik_melinda']; ?>">Edit</a> |               
                    <a href="deletekaryawan_melinda.php?id=<?= $melinda_user['nik_melinda']; ?>" class="hapus" onclick="return confirm('Hapus Data?')">Hapus Data</a>              
                </td>         
            </tr>         
            <?php endwhile; ?>     
        </table>

        <br>
        <a href="home_melinda.php">Kembali ke Halaman Utama</a>
    </div>

</body>
</html>
