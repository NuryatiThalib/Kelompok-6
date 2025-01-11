<?php
require_once "koneksi.php";
require_once "fpdf.php";



$query = mysqli_query($koneksi, "SELECT count(*) as jumlah_user FROM tbl_users");
$query2 = mysqli_query($koneksi, "SELECT * FROM tbl_users");

$data = mysqli_fetch_assoc($query);;
$users = mysqli_fetch_all($query2, MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan </title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
</head>

<body class="d-flex">

    <nav class=" px-4 py-4  min-vh-100" style="background-color: black; color : white ">
        <h3>Wajib pajak</h3>
        <ul class="mt-4">
            <li class="list-unstyled text-decoration-none"><a href="./dasboard.php" class="text-white text-decoration-none ">Dashboard</a></li>
            <li class="list-unstyled "><a href="laporan.php" class="text-white text-decoration-none">Laporan</a></li>
            <li class="list-unstyled "><a href="logout.php" class="text-white text-decoration-none">Logout</a></li>
        </ul>

    </nav>


    <div class="container-md p-4">
        <h1>Dashboard</h1>

        <div class="row">

            <div class="col col-122">

                <div class="card  mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah User <span class="badge rounded-pill text-bg-success"><?= $data['jumlah_user'] ?></span></h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>

        <h2>daftar User</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nama</th>
                    <th scope="col">username</th>
                    <th scope="col">pass</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                 foreach($users as $user) : ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $user['nma_admin'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['pass'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</body>

</html>