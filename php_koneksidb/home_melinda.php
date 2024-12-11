<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #a7c6ed, #f0e4d7);
            align-items: center;
            display: flex;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #9B9A96;
            width: 400px;
        }

        h3 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #45a049;
        }

        .links {
            margin-top: 20px;
        }
        </style>
</head>
<body>
<div class="container">
        <center>
    <?php
        session_start();
            ?>
            <div class="links">
                <h3>Aplikasi Manajemen Data Karyawan</h3>
                <br>
                <a href="datakaryawan_melinda.php">Data Karyawan</a> 
                <a href="divisi_melinda.php">Divisi</a> 
        </center>
    </div>
</body>
</html>