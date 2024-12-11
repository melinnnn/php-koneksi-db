<?php
session_start();
include 'koneksi_melinda.php';

$melinda_nik = $_GET['id'];

$melinda_sql = "SELECT * FROM karyawan_melinda WHERE nik_melinda = '$melinda_nik'";
$melinda_result = $melinda_conn->query($melinda_sql);
$melinda_user = $melinda_result->fetch_assoc();

if (!$melinda_user) {
    echo "Data karyawan tidak ditemukan!";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $melinda_nama = $_POST['nama_melinda'];
    $melinda_email = $_POST['email_melinda'];
    $melinda_gaji = $_POST['gaji_melinda'];
    $melinda_tglmsk = $_POST['tanggal_masuk_melinda'];
    $melinda_divisi = $_POST['divisi_id_melinda'];

    $melinda_sql_divisi = "SELECT * FROM divisi_melinda WHERE divisi_id_melinda = '$melinda_divisi'";
    $melinda_hasil = $melinda_conn->query($melinda_sql_divisi);

    if ($melinda_hasil->num_rows == 0) {
        echo "Error: Division ID not found!";
        exit();
    }

    $melinda_update_sql = "
        UPDATE karyawan_melinda SET
        nama_melinda = '$melinda_nama',
        email_melinda = '$melinda_email',
        gaji_melinda = '$melinda_gaji',
        tanggal_masuk_melinda = '$melinda_tglmsk',
        divisi_id_melinda = '$melinda_divisi'
        WHERE nik_melinda = '$melinda_nik'";

    if ($melinda_conn->query($melinda_update_sql)) {
        header("Location: datakaryawan_melinda.php");
        exit();
    } else {
        echo "Error: " . $melinda_conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Karyawan</title>
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

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        select {
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
        <h2>Edit Data Karyawan</h2>

        <form method="post">
            <input type="text" name="nik_melinda" placeholder="NIK"
                value="<?= htmlspecialchars($melinda_user['nik_melinda']); ?>" required readonly><br>
            <input type="text" name="nama_melinda" placeholder="Nama"
                value="<?= htmlspecialchars($melinda_user['nama_melinda']); ?>" required><br>
            <input type="email" name="email_melinda" placeholder="Email"
                value="<?= htmlspecialchars($melinda_user['email_melinda']); ?>" required><br>
            <input type="number" name="gaji_melinda" placeholder="Gaji"
                value="<?= htmlspecialchars($melinda_user['gaji_melinda']); ?>" required><br>
            <input type="date" name="tanggal_masuk_melinda"
                value="<?= htmlspecialchars($melinda_user['tanggal_masuk_melinda']); ?>"><br>


            <select name="divisi_id_melinda" required>
                <option value="">Pilih Divisi</option>
                <?php
                $melinda_divisi_query = "SELECT * FROM divisi_melinda";
                $melinda_hasil_divisi = $melinda_conn->query($melinda_divisi_query);

                while ($melinda_divisi = $melinda_hasil_divisi->fetch_assoc()) {
                    echo "<option value='" . $melinda_divisi["divisi_id_melinda"] . "' " . ($melinda_user["divisi_id_melinda"] == $melinda_divisi["divisi_id_melinda"] ? 
                    "selected" : "") . ">" . $melinda_divisi["namadivisi_melinda"] . "</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" name="submit" value="Update Data Karyawan">
        </form>

        <br><br>
        <a href="datakaryawan_melinda.php">Kembali</a>
    </div>

</body>

</html>