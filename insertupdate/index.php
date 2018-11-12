<?php
    require 'functions.php';
    $mahasiswa=query("SELECT * FROM mahasiswa");

    if(isset($_POST["cari"]))
    {
        $mahasiswa=cari($_POST["keyword"]);
    }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
        <title>Data Mahasiswa</title>
    </head>
    <body>
        <center>
            <h1>Daftar Mahasiswa</h1>
        </center>
        <a href="tambah_data.php">Tambah Data Mahasiswa</a>
        <br><br>
        <form action="" method="POST" role="form">
            <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
            <button type="submit" name=cari>Cari</button>
        </form>
        <br>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
            </thead>
        <?php $i=1 ?>
        <?php foreach($mahasiswa as $row):?>
        <tr>
            <tbody>
            <td><?= $i; ?></td>
            <td><?= $row["Nama"]; ?></td>
            <td><?= $row["Nim"]; ?></td>
            <td><?= $row["Email"]; ?></td>
            <td><?= $row["Jurusan"]; ?></td>
            <td><img src="img/<?php echo $row["Gambar"]; ?>" alt="" scrset="" width="100" height="100"></td>
            <td>
                <a href="Edit.php?id=<?php echo $row["id"];?>">Edit</a>
                <a href="hapus.php?id=<?php echo $row["id"];?>"onclick="return confirm('Apakah data ini akan dihapus')">Hapus</a>
            </td>
            </tbody>
        </tr>
        <?php $i++ ?>
        <?php endforeach;?>
        </table>
        
    </body>
</html>