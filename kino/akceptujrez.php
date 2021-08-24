<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

session_start();
if($_SESSION["zalogowany"]!=2){
  echo "<h3>Nie jesteś zalogowany! Przejdź do poniższej strony aby się zalogować i uzyskać dostęp do zawartości strony.";
  echo "<br>";
  echo '<a href="bd/logowanie.php">Strona logowania</a>';
  exit();
}
?>

<?php
$link = pg_connect("host=host dbname=dbname user=user password=password");
$idrezerwacji = $_POST["idrezerwacji"];
$login = $_SESSION["sesjalogin"];
$haslo = $_SESSION["sesjahaslo"];

// a teraz wybieranie id_kasjera podajacego swoje haslo
$wynik2 = pg_query($link,
			"SELECT id_kasjera FROM Kasjerzy
			 WHERE haslo = '" . pg_escape_string($haslo) . "' AND login = '" . pg_escape_string($login) . "';");
$numrowskasjer = pg_numrows($wynik2);
$idkas = pg_fetch_array($wynik2, 0);
$idkasjera = $idkas["id_kasjera"];
?>

<html>

<head>
	<title>Kasjer - akceptacja</title>
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
<h2>Akceptacja rezerwacji</h2><br>
<p>Podaj numer ID rezerwacji aby zaakceptować zmówienie.</p>
<form action="akceptujrez.php" method="post">
    <?php
      echo "Numer ID rezerwacji: <input type=number name='idrezerwacji' value='$idrezerwacji'>";
      //echo "Login: <input type=text name=login required pattern=[0-9]{6} value='$login'><br>";
      //echo "Hasło: <input type=password name='haslo' value='$haslo'><br>";
    ?>
    <input type=submit value="Akceptuj"><br>
</form>   
    <?php
    // najpierw sprawdzenie czy jest rezerwacja o takim id
    $result = pg_query($link, "SELECT * FROM Rezerwacje
			       WHERE stan = FALSE AND id_rezerwacji = '" . pg_escape_string($idrezerwacji) . "';");
    $numrows = pg_numrows($result);
    if($numrows==0 && !empty($result)){
      echo "<h4>Nie ma rezerwacji o takim numerze. Spróbuj ponownie.</h4>";
    }
    else{
      $akceptacja = pg_query($link, "UPDATE Rezerwacje SET stan = TRUE, kasjer = '" . $idkasjera . "' WHERE id_rezerwacji = '" . pg_escape_string($idrezerwacji) . "';");
    }
      
	if($akceptacja) echo "<h4>Pomyślnie zmieniono status rezerwacji.</h4>";
	//elseif(empty($wynik2)) echo "Złe dane";
	// echo "<br>Wystąpił błąd. Spróbuj ponownie.";
	if($numrowskasjer==0 && !empty($haslo)) echo "<h4>Podano błędny login lub hasło.</h4>";
      ?>
      
      <p>Poniżej znajdują się oczekujące na akceptację rezerwacje.</p>

  <?php
  $link = pg_connect("host=host dbname=dbname user=user password=password");

  $dzien = $_POST['dzien'];

  $result = pg_query($link, "SELECT id_rezerwacji, liczba_miejsc, seans, klient FROM Rezerwacje WHERE stan=FALSE ORDER BY id_rezerwacji;");
  $numrows = pg_numrows($result);
  ?>

  <table border="1" align=center>
  <tr>
  <th>ID Rezerwacji</th>
  <th>Liczba miejsc</th>
  <th>ID Seansu</th>
  <th>ID Klienta</th>
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
  </tr>
  ";
  }
  pg_close($link);
  ?>

</div></div></body>
</head>
