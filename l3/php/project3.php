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
		<meta http-equiv="refresh" content="300;url=project3.php">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&amp;family=Open+Sans:ital,wght@0,300;1,300&amp;family=Ranchers&amp;display=swap" rel="stylesheet">
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<meta charset="UTF-8">
		<title> Projekt3 </title>
    </head>
    <body>
		<?php
			include("./menu.php");
		?>
		
		<article>
			<h2>Rysowanie kwadratów</h2>
			<p>Program ten był jednym z zadań zadanych przez doktora Kobylańskiego na kursie języka Prolog. Zadanie polegało na "narysowaniu" prostymi znakami ASCII odpowiedniej ilości kwadratów 1x1, 2x2 lub 3x3 za pomocą odpowiedniej ilości zapałek. Kwadraty mogły zawierać się w sobie, a narysować należało wszystkie możliwe rozwiązania. </p>
		</article>

		<p>
			Link do rozwiązania zadania: <a href="https://github.com/Paulaxx/Prolog/blob/master/lista4/3.pl">github</a>
		</p>

		<h4 class="myh4">Jedna z funkcji tworząca listę zapałek do narysowania</h4>
		<figure>
			<pre><code>
			createMatchesList(N, S, A, L) :-
					allMatches(AllM),

					nSmall(_, 0, AllM, [], Small),
					nAverage(_, 0, AllM, [], Average),

					subset(S, Small, SmallS),
					subset(A, Average, AverageA),

					join(SmallS, [], Sm),
					join(AverageA, [], Av),
					join2Lists(Sm, Av, List),

					listWithoutDuplikates(List, L),

					length(L, N),

					nSmall(S, 0, L, [], _),
					nAverage(A, 0, L, [], _),

					bigSquare(Big),
					\+ subset(Big, L),

					draw(AllM, L).
			</code></pre>
		</figure>

		<?php
			include("./add_comment.php");
		?>

    </body>
</html>