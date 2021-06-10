<?php
			if(session_status() == PHP_SESSION_ACTIVE)
			{
				session_regenerate_id();
			}
			include("./database.php");
			connect();
			comment();
?>
<!DOCTYPE html >
<html lang="pl">
    <head>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<script src="hamburger_menu.js"></script>
		<meta http-equiv="refresh" content="300;url=project1.php">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&amp;family=Open+Sans:ital,wght@0,300;1,300&amp;family=Ranchers&amp;display=swap" rel="stylesheet">
		<meta charset="UTF-8">
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<title> Projekt1 </title>
    </head>
    <body>
		<?php
			include("./menu.php");
		?>
	
		<article>
			<h2>Student Helper</h2>
			<p>"Student Helper" to aplikacja mająca pomóc studentowi w organizacji zajęć, ocen, zaliczeń i czasu nauki. Została napisana w języku Python z wykorzystaniem frameworku Django. Aplikacja ta jest skierowana głównie do studentów Politechniki Wrocławskiej, ponieważ większość funkcjonalności jest dostępna dopiero po pobraniu planu zajęć w formacie "icalendar", który jest dostępny na platformie "jsos". Główne funkcjonalności to: </p>
		</article>
	
		<nav>
			<ul>
				<li><a>Przeglądanie planu zajęć</a></li>
				<li><a>Przeglądanie informacji odnośnie wybranego kursu</a></li>
				<li><a>Wprowadzenie zasad zaliczenia</a></li>
				<li><a>Wprowadzenie oceny, punktów, zaliczeń</a></li>
				<li><a>Wprowadzanie do kalendarza różnych wydarzeń, np. kartkówka, kolokwium, egzamin</a></li>
				<li><a>Przeglądanie celów na dany semestr oraz monitorowanie postępów</a></li>
				<li><a>Sprawdzanie stron internetowych prowadzących</a></li>
				<li><a>Otrzymywanie powiadomień gdy na stronie prowadzącego pojawią się jakieś zmiany (m.in. nowa lista)</a></li>
				<li><a>Przechowywanie materiałów do każdego kursu na dysku Google</a></li>
				<li><a>Obliczanie średniej ocen na podstawie wprowdzonych zasad zaliczenia</a></li>
			</ul>
		</nav>

		<p>
			Link do repozytorium projektu: <a href="https://github.com/mateuszkochanek/student-helper">github</a>
		</p>

		<h4 class="myh4">Fragment kodu, który pobiera informacje z "icalendara"</h4>
		<figure>
			<pre><code>
			for component in calendar.walk():
						if component.name == "VEVENT":
						if i == 0:
							i += 1
							first_date = component.get('dtstart').dt
							two_weeks = datetime.timedelta(weeks=2)
							two_weeks_after = first_date + two_weeks

						summary = component.get('summary')
						description = component.get('description')
						if description not in self.AllTeachers:
							self.AllTeachers.append(description)
						location = component.get('location')
						startdt = component.get('dtstart').dt
						enddt = component.get('dtend').dt
						mode = ""
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