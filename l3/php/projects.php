<?php
			include("./database.php");
			connect();
?>
<!DOCTYPE html >
<html lang="pl">
    <head>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<script src="hamburger_menu.js"></script>
		<meta http-equiv="refresh" content="300;url=projects.php">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&amp;family=Open+Sans:ital,wght@0,300;1,300&amp;family=Ranchers&amp;display=swap" rel="stylesheet">
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<meta charset="UTF-8">
		<title> Projekty </title>
    </head>
    <body>
		<?php
			include("./menu.php");
		?>
	
		<div class="flex-container">
			<dl class="flex-item-left">
				<dt><a class="link" href="project1.php">Student Helper</a></dt>
				<dd class="description1">Aplikacja pomagająca w organizacji pracy/nauki studenta
					Politechniki Wrocławskiej.</dd>
				<dt class="zdjecie">
					<img class="img2" src="images/studenthelper.PNG" alt="StudentHelper">
				</dt>
				<dd></dd>
			</dl>
			<dl class="flex-item-middle">
				<dt><a class="link" href="project2.php">Gra Carcassone</a></dt>
				<dd class="description1">Implementacja 6 osobowej gry planszowej Carcassone.</dd>
				<dt class="zdjecie">
					<img class="img2" src="images/carcassone.PNG" alt="carcassone">
				</dt>
				<dd></dd>
			</dl>
			<dl class="flex-item-right">
				<dt><a class="link" href="project3.php">Rysowanie kwadratów</a></dt>
				<dd class="description1">Program rysujący za pomocą zapałek określoną ilość
					kwadratów różnych wielkości.</dd>
				<dt class="zdjecie">
					<img class="img2" src="images/zapalki.PNG" alt="carcassone">
				</dt>
				<dd></dd>
			</dl>
		</div>
    </body>
</html>