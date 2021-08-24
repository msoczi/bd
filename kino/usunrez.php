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
	<title>Kasjer - usuń rezerwację</title>
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
<h2>Usuwanie rezerwacji</h2><br>
<p>Podaj numer ID rezerwacji aby usunąć rezerwację.</p>
<form action="usunrez.php" method="post">
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
			       WHERE id_rezerwacji = '" . pg_escape_string($idrezerwacji) . "';");
    $numrows = pg_numrows($result);
    if($numrows==0 && !empty($result)){
      echo "<h4>Nie ma rezerwacji o takim numerze. Spróbuj ponownie.</h4>";
    }
    if($numrowskasjer==0 && !empty($haslo)){
      echo "<h4>Podano błędny login lub hasło.</h4>";
    }
    else{
      $usun = pg_query($link, "DELETE FROM Rezerwacje WHERE id_rezerwacji = '" . pg_escape_string($idrezerwacji) . "';");
    }
      
	if(!empty($usun) && $numrows!=0) echo "<h4>Pomyślnie usunięto rezerwację.</h4>";
	
    
      ?>
      
    </form>

    <?php
  $dzien = $_POST['dzien'];

  $resultt = pg_query($link, "SELECT * FROM Rezerwacje ORDER BY id_rezerwacji;");
  $numrowss = pg_numrows($resultt);
  ?>
  <p>Poniżej znajdują się wszytkie zamówienia.</p>
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

  for($ri = 0; $ri < $numrowss; $ri++) {
    echo "<tr>\n";
    $row = pg_fetch_array($resultt, $ri);
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
