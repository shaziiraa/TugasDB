<!DOCTYPE html>
<?php
session_start();
?>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bepress</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #80CDC0, #ffffff);
            color: #333;
            height: 100vh;
            width: 100%;
            overflow-x: hidden;
        }

        c1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            width: 100%;
        }

        nav {
            background-color: #80CDC0;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            padding: 0;
            margin: 0;
        }

        nav ul li a {
            color: white;
            font-size: 18px;
            font-weight: 600;
            text-decoration: none;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        .container {
            text-align: center;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            font-size: 2rem;
            font-weight: 750;
            margin-bottom: 10px;
        }

        p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #6C63FF;
            color: white;
        }

        .btn-primary:hover {
            background-color: #5753d9;
        }

        .btn-outline {
            border: 2px solid #6200ee;
            color: #6200ee;
            background: none;
        }

        .btn-primary:hover,
        .btn-outline:hover {
            opacity: 0.9;
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
    <div class="c1">
        <!-- <nav>
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
                    <li class="uk-active">
                        <a href="index.php" style="padding: 30px; font-size: 40px; font-family: rockwell;">Bepress</a>
                    </li>
                    <?php
                    if (empty($_SESSION["username"])) {
                        echo "<li><a href='jadwal_service.php'>Lihat Jadwal Service</a></li>";
                    } else {
                        echo "<li><a href='pesan_jadwal_service.php'>Reservasi Jadwal Service</a></li>";
                        echo "<li><a href='reservasi_aktif.php'>Reservasi Service Aktif</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li>
                        <?php
                        if (empty($_SESSION["username"])) {
                            echo "<a href='#' class='uk-icon-link' uk-icon='user' style='padding-right: 80px;'>Akun</a>";
                        } else {
                            $akun = $_SESSION["username"];
                            echo "<a href='#' class='uk-icon-link' uk-icon='user' style='padding-right: 80px;'>Hai, $akun</a>";
                        }
                        ?>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <?php
                                if (empty($_SESSION["username"])) {
                                    echo "<li class='uk-active'><a href='login.php'>Masuk</a></li>";
                                    echo "<li class='uk-active'><a href='daftar.php'>Daftar</a></li>";
                                } else {
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
        </nav> -->
        <nav>
            <a href="index.php" style="font-size: 24px; font-weight: bold; color: white; text-decoration: none;">BePress</a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="tentangkami.php">Tentang Kami</a></li>
                <li><a href="layanan.php">Layanan</a></li>
                <li><a href="review.php">Review</a></li>
            </ul>
        </nav>
        <?php include "action/act_alert.php"; ?>

        <div class="container">
            <h2>Daftar Akun</h2>
            <form action="action/act_daftar.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan Username" maxlength="15" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" maxlength="15" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" maxlength="30" required>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" min="1910-01-01" max="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select id="jk" name="jk" required>
                        <option value="">Pilih</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="number" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telepon" maxlength="15" required>
                </div>
                <div class="form-group" style="display: flex; align-items: center;">
                    <label for="alamat" style="margin: 0 10px;">Alamat</label>
                    <textarea style="width: 100%; height:80px; padding: 5px;" id="alamat" name="alamat" rows="3" maxlength="50" placeholder="Masukkan Alamat" required></textarea>
                </div>
                <button type="submit" class="btn-primary">DAFTAR</button>
            </form>
        </div>
        <footer>
            &copy; 2024 BePress. Semua Hak Dilindungi.
        </footer>
    </div>
</body>

</html>