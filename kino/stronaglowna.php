<?php
session_start();
if($_SESSION["zalogowany"]!=1){
  echo "<h3>Nie jesteś zalogowany! Przejdź do poniższej strony aby się zalogować i uzyskać dostęp do zawartości strony.";
  echo "<br>";
  echo '<a href="bd/logowanie.php">Strona logowania</a>';
  exit();
}


?>

<html>

<head>
	<title>Kino - strona główna</title>
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
<br><center><h5>Jesteś zalogowany jako: <?php echo " '".$_SESSION["sesjalogin"]."' "; ?></h5></center>
	<div class="menu_content">
		<ul>
			<li><a href="stronaglowna.php">Strona główna</a></li><br>
			<li><a href="repertuar.php">Repertuar</a></li><br>
			<li><a href="premieryfilmowe.php">Lista granych fimów</a></li><br>
			<li><a href="sprawdzfilm.php">Rezerwacje</a></li><br>
			<li><a href="rezerwacje.php">Sprawdź wolne miejsca</a></li><br>
			<li><a href="sprstatus.php">Sprawdź status</a></li><br>
			<li><a href="wyloguj.php">Wyloguj</a></li>
        </ul>
	</div>
	
</div><div class="main"><div class="content">
<h2>Strona główna</h2><br>
<h3>Witaj! Jesteś zalogowany jako: <?php echo " '".$_SESSION["sesjalogin"]."' "; ?></h3><br><br>
<center><img src="bd/img/reklamowka.png" alt="jest jakis blad"></center>
<br>
<br>
<h3> Kino M.S.Cinema zbierze cię w daleką podróż po najlepszych kinowych hitach! </h3>
<p> Sprawdź co dzisiaj gramy, i nie przegap żadnej premiery! </p>

</div></div></body>
</head>
