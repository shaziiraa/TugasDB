<?php
session_start();
include 'action/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Mengambil data review berdasarkan transaksi yang sudah selesai
$query = "SELECT * FROM review 
          INNER JOIN transaksi ON review.kode_transaksi = transaksi.kode_transaksi
          WHERE transaksi.username = '".$_SESSION['username']."'";

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bepress</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.1/dist/css/uikit.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.1/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.1/dist/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="css/bengkel.css">
    <style>
        body {
            background: linear-gradient(to bottom, #80CDC0, #ffffff);
            height: 100vh;
        }
        .btn-primary {
			background-color: #6C63FF;
			color: white;
		}

		.btn-primary:hover {
			background-color: #5753d9;
		}
        footer {
			text-align: center;
			padding: 20px;
			background-color: #80CDC0;
			color: white;
			font-size: 14px;
			display: flex;
			position: absolute;
			bottom: 0;
			width: 100%;
			justify-content: center;
		}
    </style>
</head>
<body>

<nav class="uk-navbar-container" style="background-color: #80CDC0;" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="profil_motor.php" style="color:white; padding:30px; font-size: 40px;font-family:rockwell;">Bepress</a></li>
            <?php
                if(empty($_SESSION["username"])){
                    echo "<li><a href='jadwal_service.php' style='color:white'>Lihat Jadwal Service</a></li>";
                }elseif(isset($_SESSION["username"])){
                    echo "<li><a href='pesan_jadwal_service.php' style='color:white'>Reservasi Jadwal Service</a></li>";
                    echo "<li><a href='reservasi_aktif.php' style='color:white;'>Reservasi Service Aktif</a></li>";
                    echo "<li><a href='review_list.php' style='color:white;'>Review Pengguna</a></li>";
                }
            ?>
        </ul>
    </div>
    
    <div class="uk-navbar-right">
        <ul class="uk-navbar-nav">
            <li>
                <?php 
                    if(empty($_SESSION["username"])){
                        echo "<a href='#'' class='uk-icon-link uk-margin-small-left' uk-icon='user' style='color:white; padding-right:80px;'>Akun</a>";
                    }elseif(isset($_SESSION["username"])){
                        $akun = $_SESSION["username"];
                        echo "<a href='#' class='uk-icon-link uk-margin-small-left' uk-icon='user' style='color:white; padding-right:80px;'>Hai, $akun</a>";
                    }
                ?>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <?php
                            if(empty($_SESSION["username"])){
                                echo "<li class='uk-active'><a href='login.php'>Masuk</a></li>";
                                echo "<li class='uk-active'><a href='daftar.php'>Daftar</a></li>";
                            }elseif(isset($_SESSION["username"])){
                                echo "<li class='uk-active'><a href='profil.php'>Profil Akun</a></li>";
                                echo "<li class='uk-active'><a href='profil_motor.php'>Data Motor</a></li>";
                                echo "<li><hr></li>";
                                echo "<li class='uk-active'><a href='action/act_logout.php'>Keluar</a></li>";

                            }
                        ?>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="uk-container uk-margin-top">
    <h2 class="uk-text-center">Daftar Review Anda</h2>

    <!-- Tabel Review -->
    <table class="uk-table uk-table-hover uk-table-divider">
        <thead>
            <tr>
                <th style="color:black;">Kode Transaksi</th>
                <th style="color:black;">Tanggal</th>
                <th style="color:black;">Rating</th>
                <th style="color:black;">Komentar</th>
                <th style="color:black;">Status Review</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>".$row['kode_transaksi']."</td>
                            <td>".$row['tanggal']."</td>
                            <td>".$row['rating']."</td>
                            <td>".$row['comments']."</td>
                            <td>".$row['status']."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='uk-text-center' style='color:black;'>Belum ada review yang diberikan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<footer>
		&copy; 2024 BePress. Semua Hak Dilindungi.
	</footer>
</body>
</html>
