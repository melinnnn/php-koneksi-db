<?php
session_start();
include 'koneksi_melinda.php';

$melinda_id = $_GET['id'];  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $melinda_id = $_POST['divisi_id_melinda'];
    $melinda_nama = $_POST['namadivisi_melinda'];
    $melinda_lokasi = $_POST['lokasi_melinda'];

    $melinda_sql = "UPDATE divisi_melinda SET namadivisi_melinda='$melinda_nama', lokasi_melinda='$melinda_lokasi' WHERE divisi_id_melinda='$melinda_id'";
    
    if ($melinda_conn->query($melinda_sql) === TRUE) {
        header("Location: divisi_melinda.php");  
        exit();
    } else {
        echo "Error updating record: " . $melinda_conn->error;
    }
}

$melinda_sql = "SELECT * FROM divisi_melinda WHERE divisi_id_melinda='$melinda_id'";
$melinda_result = $melinda_conn->query($melinda_sql);
$melinda_row = $melinda_result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Divisi</title>
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
        <h2>Edit Data Divisi</h2>
        <form method="post">
            <input type="text" name="divisi_id_melinda" value="<?php echo htmlspecialchars($melinda_row['divisi_id_melinda']); ?>" placeholder="ID Divisi" required readonly>
            
            <select name="namadivisi_melinda" required>
                <option value="Semua Divisi" <?php if($melinda_row['namadivisi_melinda'] == "Semua Divisi") echo "selected"; ?>>Semua Divisi</option>
                <option value="HR" <?php if($melinda_row['namadivisi_melinda'] == "HR") echo "selected"; ?>>HR</option>
                <option value="IT" <?php if($melinda_row['namadivisi_melinda'] == "IT") echo "selected"; ?>>IT</option>
                <option value="Finance" <?php if($melinda_row['namadivisi_melinda'] == "Finance") echo "selected"; ?>>Finance</option>
                <option value="Sales" <?php if($melinda_row['namadivisi_melinda'] == "Sales") echo "selected"; ?>>Sales</option>
                <option value="Logistics" <?php if($melinda_row['namadivisi_melinda'] == "Logistics") echo "selected"; ?>>Logistics</option>
            </select>
            
            <input type="text" name="lokasi_melinda" value="<?php echo htmlspecialchars($melinda_row['lokasi_melinda']); ?>" placeholder="Lokasi" required>
            
            <input type="submit" value="Update Data Divisi">
        </form>
        <a href="divisi_melinda.php">Kembali</a>
    </div>
</body>
</html>
