<?php
session_start();
if($_SESSION["zalogowany"]!=2){
  echo "<h3>Nie jesteś zalogowany! Przejdź do poniższej strony aby się zalogować i uzyskać dostęp do zawartości strony.";
  echo "<br>";
  echo '<a href="bd/logowanie.php">Strona logowania</a>';
  exit();
}
?>

<html>

<head>
	<title>Kasjer - panel kasjera</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
<body>

<div class="all"> 

<div class="header">
	<div class="header_content">
		<h1><font face="cursive" color="#c6c0b9">M.S.Cinema - Mateusz Soczewka</font></h1>
	</div>
</div>

<div class="menu">
<br><center><h5>Zalogowany kasjer: <?php echo " '".$_SESSION["sesjalogin"]."' "; ?></h5></center>
	<div class="menu_content">
		<ul>
			<li><a href="panelkasjera.php">Panel kasjera</a></li><br>
			<li><a href="wszystkierez.php">Wszystkie rezerwacje</a></li><br>
			<li><a href="akceptujrez.php">Akceptacja rezerwacji</a></li><br>
			<li><a href="usunrez.php">Usuń rezerwację</a></li><br>
			<li><a href="wyloguj.php">Wyloguj</a></li>
        </ul>
	</div>
</div><div class="main"><div class="content">
<h2>Panel kasjera</h2><br>
<p>Witaj <?php echo " '".$_SESSION["sesjalogin"]."' "; ?>! Poprawnie zalogowałeś się jako kasjer.<br><br>Twoje uprawnienia pozwalają Ci oglądać złożone przez klientów rezerwacje oraz zarówno akceptować je jak i usuwać.</p>

</div></div></body>
</head>
