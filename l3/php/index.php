<?php		
			if(session_status() == PHP_SESSION_ACTIVE)
			{
				session_regenerate_id();
			}
			include("./database.php");
			connect();
?>
<!DOCTYPE html >
<html lang="pl">
    <head>
		<script src="hamburger_menu.js"></script>
		<meta http-equiv="refresh" content="300;url=index.php">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&amp;family=Open+Sans:ital,wght@0,300;1,300&amp;family=Ranchers&amp;display=swap" rel="stylesheet">
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<meta charset="UTF-8">
		<title> Strona startowa </title>
    </head>
    <body>
		<?php
			include("./menu.php");
		?>

		<nav class="zdjecieja">
			<img style='height: 100%; width: 100%' src="images/zdjecie.jpg" alt="Moje zdjecie">
			<p>
				<?php
					show_counter();
				?>
			</p>
		</nav>

		<article class="aboutme">
			<h1>About me</h1>
			<p>Nazywam się Paulina Gryszczyk. Pochodzę z Opola, ale aktualnie mieszkam we Wrocławiu. Jestem studentką 3 roku informatyki na Politechnice Wrocławskiej. Moim najnowszym zainteresowaniem
				związanym ze studiami jest informatyka kwantowa, którą poznałam uczęszczając na zajęcia równie interesującej fizyki kwantowej. W wolnym czasie czytam dużo książek oraz jeżdżę na rowerze.
				Mam nadzieję, że kiedy zostaną otwarte korty tenisowe, to będę mogła kontynuować moją naukę tenisa ziemnego, która niestety zakończyła się po 1 zajęciach. </p>
			<p>Od lutego 2021 roku pracuję w Capgemini jako Java Software Developer.</p>
			<p>Mój email: palinkagr@gmail.com</p>
			<p>
			Moje konto na githubie: <a href="https://github.com/Paulaxx">Paulaxx</a>
			</p>
		</article>
    </body>
</html>