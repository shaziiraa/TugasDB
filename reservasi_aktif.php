<!DOCTYPE html>
<?php
    session_start();
    include "action/act_cek.php";
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bengkel.css">
	<script src="js/uikit.min.js"></script>
	<script src="js/uikit-icons.min.js"></script>
	<title>Bepress</title>
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

<div class="uk-container" style="padding-top:25px;">
    <?php
        include "action/act_alert.php";

        // Tampilkan notifikasi jika review berhasil ditambahkan
        if (isset($_GET['alert']) && $_GET['alert'] == 'review_success') {
            echo "<div class='uk-alert-success' uk-alert>Ulasan Anda telah berhasil ditambahkan!</div>";
        }
    ?>
    <h2>Data Motor</h2>
    <div class="uk-container">
        <table class="uk-table uk-table-hover uk-table-divider">
            <thead>
                <tr>
                    <th style="color:black;">Kode Transaksi</th>
                    <th style="color:black;">Tanggal</th>
                    <th style="color:black;">Waktu</th>
                    <th style="color:black;">Nomor Polisi</th>
                    <th style="color:black;">Status</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'action/koneksi.php';
                    $username = $_SESSION['username'];
                    $data = mysqli_query($koneksi, 
                        "SELECT * FROM transaksi 
                         INNER JOIN jadwal ON transaksi.kode_jadwal = jadwal.kode_jadwal 
                         WHERE transaksi.username = '$username' 
                         AND transaksi.status != 'Batal'"
                    ) or die(mysqli_error($koneksi));

                    foreach ($data as $baris) { ?>
                        <tr>
                            <td><?php echo $baris['kode_transaksi']; ?></td>
                            <td><?php echo $baris['tanggal']; ?></td>
                            <td><?php echo $baris['waktu']; ?></td>
                            <td><?php echo $baris['no_polisi']; ?></td>
                            <td><?php echo $baris['status']; ?></td>
                            <td>
                                <center>
                                    <?php 
                                    if ($baris['status'] == "Belum") { ?>
                                        <input type="button" class="uk-button uk-button-danger" 
                                               onclick="location.href='action/act_batal_transaksi.php?kode_transaksi=<?php echo $baris['kode_transaksi']; ?>'" 
                                               value="Batal">
                                    <?php 
                                    } elseif ($baris['status'] == "Selesai") { 
                                        $kode_transaksi = $baris['kode_transaksi'];
                                        $review_check = mysqli_query($koneksi, 
                                            "SELECT * FROM review 
                                             WHERE kode_transaksi = '$kode_transaksi'"
                                        );

                                        if (mysqli_num_rows($review_check) > 0) { ?>
                                            <button class="uk-button uk-button-default" disabled>Sudah Direview</button>
                                        <?php } else { ?>
                                            <button class="uk-button uk-button-primary" 
                                                    onclick="location.href='review.php?kode_transaksi=<?php echo $kode_transaksi; ?>'">
                                                Beri Review
                                            </button>
                                        <?php } ?>
                                    <?php } ?>
                                </center>
                            </td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<br>
<footer>
		&copy; 2024 BePress. Semua Hak Dilindungi.
	</footer>
</body>
</html>
