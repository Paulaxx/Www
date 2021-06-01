<div class="menu" id="menu">
	<a href="index.php">Strona główna</a>
	<div id="dropdown">
		<a href="projects.php">Moje projekty</a>
		<a href="hobby1.php">Hobby informatyczne</a>
		<a href="hobby2.php">Hobby pozainformatyczne</a>
		<a href="sign_up.php">Zaloguj się/Załóż konto</a>
	</div>
	<a href="javascript:void(0);" class="icon" id="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
	</a>
</div>
<?php
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		$website = explode("/", $_SERVER['REQUEST_URI']);
    	$project_name = $website[count($website)-1];
		$hidden = 
		'<div class="log_data">
			<p class="fminside2">Zalogowano jako: '.$_SESSION["username"].'</p>
			<div class="fm">
				<form class="fminside" action="logout.php" method="post">
					<input type="hidden" value="logout" name="type_of_form" />
					<input class="btn-primary" id="submitbutton" type="submit" value="Wyloguj" />
				</form>';
		$hidden = $hidden.
				'<form class="fminside2" action="logout.php" method="post">
					<input type="hidden" value="'.$project_name.'" name="delete_account" />
					<input class="btn-primary" id="submitbutton" type="submit" value="Usuń konto" />
				</form>';
		if(isset($_SESSION['want_delete']) && $_SESSION['want_delete'] == true){
			$hidden = $hidden.
				'<form class="fminside3" action="logout.php" method="post">
					<input type="hidden" value="delete" name="yes_delete" />
					<input class="btn-primary3" id="submitbutton" type="submit" value="Potwierdź usunięcie konta" />
				</form>';
		}
		$hidden = $hidden.'</div></div>';
		echo $hidden;
	}
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
		session_unset(); 
		session_destroy();
	}
	$_SESSION['LAST_ACTIVITY'] = time();
?>