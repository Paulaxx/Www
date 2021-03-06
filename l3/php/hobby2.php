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
		<meta http-equiv="refresh" content="300;url=hobby2.php">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&amp;family=Open+Sans:ital,wght@0,300;1,300&amp;family=Ranchers&amp;display=swap" rel="stylesheet">
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<meta charset="UTF-8">
		<title> Pozainformatyczne zainteresowania </title>
    </head>
    <body>
		<?php
			include("./menu.php");
		?>

		<h4>Moje pozainformatyczne zainteresowania</h4>
		<ul class="circle">
			<li class="title">Czytanie książek
				<ol>
					<li class="description">Czytanie książek to moje hobby od bardzo dawna. 
						Kiedyś czytałam głównie książki fantasy, a aktualnie najczęściej czytam 
						ksiażki psychologiczne. Moim celem na każdy rok jest przeczytać 2 książki 
						miesięcznie (co daje 24 książki w ciągu roku). Od roku używam aplikacji 
						goodreads, w której zapisuje wszystkie książki jakie przeczytałam albo 
						chciałabym przeczytać. Link do mojego konta w tym serwisie: 
						<a href="https://www.goodreads.com/user/show/57259266-paula">goodreads</a>. 
						Moje ulubione książki do których najchętniej wracam to:
						<div class="ksiazki">
							<nav class="ks1">
								<img class="hobbyimg" src="images/alaska.jpeg" alt="alaska">
							</nav>
							<nav class="ks2">
								<img class="hobbyimg" src="images/kosmiczny.jpg" alt="kosmiczny">
							</nav>
							<nav class="ks3">
								<img class="hobbyimg" src="images/ziemiomorze.jpg" alt="ziemiomorze">
							</nav>
						</div> 
					</li>
				</ol>
			</li>
				
			<li class="title">Jazda na rowerze
				<ol>
					<li class="description">W wolnym czasie bardzo czesto jeżdżę też na rowerze. Gdy mam więcej czasu to chętnie wybieram się na dłuższe wycieczki. Poniższe zdjęcia zrobiłam podczas ostatniej
						z nich na jezioro Turawskie.
						<div class="rower">
							<nav class="r1">
								<img class="photo1" src="images/rower.jpg" alt="alaska">
							</nav>
							<nav class="r2">
								<img class="photo1" src="images/turawa.jpg" alt="kosmiczny">
							</nav>
						</div>
					</li>
				</ol>
			</li>
		</ul>
	
    </body>
</html>