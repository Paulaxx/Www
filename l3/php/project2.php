<?php
			include("./database.php");
			connect();
			comment();
?>
<!DOCTYPE html >
<html lang="pl">
    <head>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<script src="hamburger_menu.js"></script>
		<meta http-equiv="refresh" content="300;url=project2.php">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&amp;family=Open+Sans:ital,wght@0,300;1,300&amp;family=Ranchers&amp;display=swap" rel="stylesheet">
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<meta charset="UTF-8">
		<title> Projekt2 </title>
    </head>
    <body>
		<?php
			include("./menu.php");
		?>
		
		<article>
			<h2>Gra Carcassone</h2>
			<p>Carcassone to gra planszowa. W implementację tej gry, napisaną w językach Python i React może grać od 2 do 5 osób. Gra polega na zbudowaniu łąk, zamków i dróg tak aby panować nad jak największa ilością ziem. W grze tej każdy z graczy otrzymuje losową "płytkę", zawierającą fragment terenu i musi umieścić ją w pasującym miejscu tak aby np. przedłużyć drogę lub poszerzyć łąkę. Gracz może również na nowo utworzonym terenie położyć swojego pionka, który będzie "pilnował" danego terenu. Po wykorzystaniu wszystkich płytek, liczone są punkty wszystkich graczy na podstawie posiadanych terenów. Wygrywa gracz z największą ilością punktów. </p>
		</article>

		<p>
			Link do repozytorium projektu: <a href="https://github.com/jozef-piechaczek/carcassone">github</a>
		</p>

		<h4 class="myh4">Fragment kodu, który pokazuje sposób reprezentacji jednej z płytek</h4>
		<figure>
			<pre><code>
			class Tile10(TileMeadow, TileCastle, TileRoad):
					id = TileIDs.TILE10
					amount = 3

					def __init__(self):
					super().__init__()
					self.sides = [[[1, 2, 3, 10, 11, 12], Terrains.CASTLE, 1, None],
										[[5, 8], Terrains.ROAD, 2, None],
										[[4, 9], Terrains.MEADOW, 3, None],
										[[6, 7], Terrains.MEADOW, 4, None]]
							self.center = [[0], Terrains.DEFAULT, 5, None]

					self.code7x7 = [
							[0, 1, 1, 1, 1, 1, 0],
							[1, 1, 1, 1, 1, 1, 2],
							[1, 1, 2, 2, 2, 2, 2],
							[1, 1, 2, 3, 3, 3, 3],
							[1, 1, 2, 3, 2, 2, 2],
							[1, 1, 2, 3, 2, 2, 2],
							[0, 2, 2, 3, 2, 2, 0]
					]
			</code></pre>
		</figure>
		
		<?php
			include("./add_comment.php");
		?>
		<?php
			include("./show_comments.php");
		?>
    </body>
</html>