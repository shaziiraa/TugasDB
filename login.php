<!DOCTYPE html>
<?php
session_start();
?>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bengkel Ku</title>
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

		.c1 {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 60vh;
			width: 100%;
		}

		.container {
			text-align: center;
			width: 100%;
			max-width: 400px;
			padding: 20px;
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
		input[type="password"] {
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

		.btn-secondary {
			background-color: white;
			/* border: 2px solid #6C63FF; */
			color: #6C63FF;
		}

		.btn-secondary:hover {
			background-color: #6C63FF;
			color: white;
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
	<nav>
		<a href="index.php" style="font-size: 24px; font-weight: bold; color: white; text-decoration: none;">BePress</a>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="tentangkami.php">Tentang Kami</a></li>
			<li><a href="layanan.php">Layanan</a></li>
			<li><a href="review.php">Review</a></li>
		</ul>
	</nav>
	<div class="c1">
		<div class="container">
			<h2>Login</h2>
			<p>Solusi cepat untuk kamu, dimanapun kamu berada!</p>
			<form action="action/act_masuk.php" method="post" autocomplete="off">
				<div class="form-group">
					<input type="text" name="username" placeholder="Masukkan Username" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Masukkan Password" required>
				</div>
				<button class="btn-primary" type="submit" name="button" onclick="location.href='profil_motor.php'" style="margin: 0 5px;">Masuk</button>
				<button class="btn-secondary" type="button" onclick="location.href='profil_motor.php'" style="margin: 0 5px;">Daftar</button>
			</form>
		</div>

	</div>
	<footer>
		&copy; 2024 BePress. Semua Hak Dilindungi.
	</footer>
</body>

</html>