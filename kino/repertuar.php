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
	<title>Kino - repertuar</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
<body>

<?php
$link = pg_connect("host=host dbname=dbname user=user password=password");

$dzien = $_POST['dzien'];

$result = pg_query($link, "SELECT tytul, rezyser, rok_prod, typ, godz_rozpocz, czas_trwania, sala FROM Seanse JOIN Filmy
ON Seanse.film = Filmy.id_filmu
WHERE dzien = '".$dzien."'
ORDER BY godz_rozpocz;");
$numrows = pg_numrows($result);
?>

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
<h2>Repertuar</h2>

<p> Wybierz dzień tygodnia aby wyświetlić seanse odbywające się w danym dniu. </p>
<form action="repertuar.php" method="post">
	<select name="dzien">
		<option value="poniedzialek">Poniedziałek</option>
		<option value="wtorek">Wtorek</option>
		<option value="sroda">Środa</option>
		<option value="czwartek">Czwartek</option>
		<option value="piatek">Piątek</option>
		<option value="sobota">Sobota</option>
		<option value="niedziela">Niedziela</option>
	</select>
	<input type="submit" name="submit" value="Szukaj seansów" />

	  <table border="1" align=center>
	  <tr>
	  <th>Tytuł</th>
	  <th>Reżyser</th>
	  <th>Rok</th>
	  <th>Typ</th>
	  <th>Godzina</th>
	  <th>Czas trwania</th>
	  <th>Sala</th>
	  </tr>
	  <?php

	  // Loop on rows in the result set.

	  for($ri = 0; $ri < $numrows; $ri++) {
	    echo "<tr>\n";
	    $row = pg_fetch_array($result, $ri);
	    echo "
	  <td>" . $row["tytul"] . "</td>
	  <td>" . $row["rezyser"] . "</td>
	  <td>" . $row["rok_prod"] . "</td>
	  <td>" . $row["typ"] . "</td>
	  <td>" . $row["godz_rozpocz"] . "</td>
	  <td><center>" . $row["czas_trwania"] . "</center></td>
	  <td>" . $row["sala"] . "</td>
	  </tr>
	  ";
	  }
	  pg_close($link);
	  ?>
	  </table>
	
</form>



</div></div></body>
</head>
