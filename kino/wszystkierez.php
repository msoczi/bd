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
	<title>Kasjer - wszystkie rezerwacje</title>
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
<h2>Wszystkie rezerwacje</h2><br>
<p>Tutaj możesz zobaczyć listę wszystkich złożonych rezerwacji, zarówno już zaakceptowanych jak i oczekujących na potwierdzenie.</p>

  <?php
  $link = pg_connect("host=host dbname=dbname user=user password=password");

  $dzien = $_POST['dzien'];

  $result = pg_query($link, "SELECT * FROM Rezerwacje ORDER BY id_rezerwacji;");
  $numrows = pg_numrows($result);
  ?>

  <table border="1" align=center>
  <tr>
  <th>ID Rezerwacji</th>
  <th>Liczba miejsc</th>
  <th>ID Seansu</th>
  <th>ID Klienta</th>
  <th>ID Kasjera</th>
  <th>Stan rezerwacji</th>
  </tr>
  <?php

  // Loop on rows in the result set.

  for($ri = 0; $ri < $numrows; $ri++) {
    echo "<tr>\n";
    $row = pg_fetch_array($result, $ri);
    echo " <td>" . $row["id_rezerwacji"] . "</td>
  <td>" . $row["liczba_miejsc"] . "</td>
  <td>" . $row["seans"] . "</td>
  <td>" . $row["klient"] . "</td>
  <td>" . $row["kasjer"] . "</td>
  <td>" . $row["stan"] . "</td>
  </tr>
  ";
  }
  pg_close($link);
  ?>

</div></div></body>
</head>
