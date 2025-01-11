<?php
require_once "koneksi.php";


$query = mysqli_query($koneksi, "SELECT * FROM tbl_wp");

$data = mysqli_fetch_all($query, MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan </title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
</head>

<body class="d-flex ">
    <nav class=" px-4 py-4  min-vh-100" style="background-color: black; color : white ">
        <h3>Wajib pajak</h3>
        <ul class="mt-4">
            <li class="list-unstyled text-decoration-none"><a href="./dasboard.php" class="text-white text-decoration-none ">Dashboard</a></li>
            <li class="list-unstyled "><a href="" class="text-white text-decoration-none">Laporan</a></li>
        </ul>
    </nav>


    <div class="container-md p-4">
        <h1>Table laporan</h1>

        <a href="/cetak.php">
            <button class="btn btn-info my-2">Cetak Laporan</button>
        </a>

        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nik</th>
                        <th scope="col">jenis Kelamini</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">NO Plat</th>
                        <th scope="col">Jenis Kendaran</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                     $no = 1;
                     foreach ($data as $d): ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $d['nma_wp'] ?></td>
                            <td><?= $d['nik_wp'] ?></td>
                            <td><?= $d['jns_kel'] ?></td>
                            <td><?= $d['alamat_wp'] ?></td>
                            <td><?= $d['no_dg'] ?></td>
                            <td><?= $d['jns_kdrn'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>