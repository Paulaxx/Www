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
		<meta http-equiv="refresh" content="300;url=hobby1.php">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&amp;family=Open+Sans:ital,wght@0,300;1,300&amp;family=Ranchers&amp;display=swap" rel="stylesheet">
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<meta charset="UTF-8">
		<title> Naukowe zainteresowania </title>
		</head>
		<body>
			<?php
				include("./menu.php");
			?>

			<h4>Moje naukowe zainteresowania</h4>
			<ul class="circle">
				<li class="title">Fizyka i informatyka kwantowa
					<ol>
						<li class="description">Mechanika kwantowa, nazywana inaczej teorią kwantową, jest gałęzią fizyki zajmującą się bardzo małymi cząstkami. Prawa mechaniki kwantowej zazwyczaj są bardzo
							kontrowersyjne i nie można próbować zrozumieć ich w taki sam sposób jak zjawiska mechaniki klasycznej. Na samym początku nauki fizyki w szkole dowiadujemy się, że obiekt może istnieć
							w konkretnym miejscu w konkretnym momencie w czasie. Jednak według fizyki kwantowej obiekt istnieje w różnych miejscach z różnymi prawdopodobieństwami. Ze względu na takie fakty 
							zrozumienie zjawisk tej gałęzi fizyki nie jest takie łatwe. Jednak dla mnie są to na tyle fascynujące i ciekawe aspekty, iż mam nadzieję kiedyś poznać i zrozumieć więcej z nich.</li>
						<li class="description2">Jednym z bardziej znanych paradoksów fizyki kwantowej jest tzw. "kot Schrödingera". Opisuje on sytuację, w której zamykamy kota w pudełku razem z trującą 
							substancją uwalniającą się z 50% prawdopodobieństwem, czyli prawdopodobieństwo, że kot przeżył lub zginął powinno wynosić 50%. Jednak według twórcy tego eksperymentu jest inaczej. 
							Dopóki nie otworzymy pudełka i nie sprawdzimy co się stało z kotem, to zwierzę to znajduję się jednocześnie w dwóch stanach - żywym i martwym. Dopiero po otwarciu pudełka możemy 
							stwierdzić czy kot przeżył, czy nie. Mamy tu do czynienia ze zjawiskiem "superpozycji", czyli sytuacji w której 2 stany nakładają się na siebie tworząc nowy stan.</li>
						<li class="description2">
							<figure>
								<img class="kotimg" src="images/kot.jpg" alt="kot">
								<figcaption>Zdjęcie ze strony https://theconversation.com/ca/topics/quantum-258</figcaption>
							</figure>
						</li>
						<li class="description2">Informatyka kwantowa to dziedzina informatyki, która od standardowej informatyki różni się tym, iż w tym przypadku podstawowym nośniekiem informacji jest kubit, 
							który może znajdować się w superpozycji paru stanów. Zbudowanie pierwszego komputera kwantowego będzie na tyle rewolucyjnym momentem, że może być zagrożeniem dla bezpieczeństwa dla 
							wszystkich aktualnie stosowanych metod zabezpieczania naszych danych, np. haseł. Komputery te będą tak szybkie i wydajne że złamanie nawet bardzo długiego hasła metodą brute force, 
							nie będzie żadnym problemem. Dlatego największe korporacje na świecie robią wszystko aby zabezpieczyć się przed taką sytuacją.</li>
					</ol>
				</li>
				<li class="title">Liczby (prawdziwie) losowe w informatyce
					<ol>
						<li class="description">Temat ten jest w pewnym sensie powiązany w powyższym, ponieważ jeśli chcemy wygenerować liczby prawdziwie losowe to musimy odnieść się do pewnych zjawisk 
							mechaniki kwantowej. Bazując tylko i wyłącznie na algorytmach komputerowych tworzymy liczby losowe, jednak są to liczby pseudolosowe, ponieważ jesteśmy w stanie przewidzieć działanie 
							takiego algorytmu. W związku z tym w stytuacjach kiedy potrzebujemy naprawdę losowe, bezpieczne liczby musimy użyc tzw. "Truly random number generator". Generator ten bazuje na 
							nieprzewidywalnych fizycznych zjawiskach takich jak np. szum powietrza. Zastosowanie liczb prawdziwie losowych to np. kryptografia.</li>
					</ol>
				</li>
			</ul>
			
		</body>
</html>