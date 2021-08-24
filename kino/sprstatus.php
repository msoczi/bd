<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

session_start();
if($_SESSION["zalogowany"]!=1){
  echo "<h3>Nie jesteś zalogowany! Przejdź do poniższej strony aby się zalogować i uzyskać dostęp do zawartości strony.";
  echo "<br>";
  echo '<a href="bd/logowanie.php">Strona logowania</a>';
  exit();
}
?>

<?php
$link = pg_connect("host=host dbname=dbname user=user password=password");
$login = $_SESSION["sesjalogin"];
$haslo = $_SESSION["sesjahaslo"];

// a teraz wybieranie id_klienta podajacego swoje haslo
$wynik = pg_query($link,
			"SELECT id_klienta FROM Rezerwacje JOIN Klienci ON Rezerwacje.klient = Klienci.id_klienta WHERE login = '" . $login . "' AND haslo = '" . $haslo . "' GROUP BY id_klienta;");
			 
$numrows3 = pg_numrows($wynik);
$identyfikator = pg_fetch_array($wynik);
$idklienta = $identyfikator["id_klienta"];

//wyciagmay rezerwacje zaakceptowane
$result = pg_query($link, "SELECT id_rezerwacji,tytul,liczba_miejsc,sala,dzien,godz_rozpocz FROM Seanse
      JOIN Rezerwacje ON Seanse.id_seansu = Rezerwacje.seans
      JOIN Sale ON Seanse.sala = Sale.nr
      JOIN Filmy ON Filmy.id_filmu=Seanse.film
      WHERE klient ='" . $idklienta . "' AND stan = TRUE ORDER BY id_rezerwacji;
");
$numrows = pg_numrows($result);

//wyciagmay rezerwacje oczekujące
$result2 = pg_query($link, "SELECT id_rezerwacji,tytul,liczba_miejsc,sala,dzien,godz_rozpocz FROM Seanse
      JOIN Rezerwacje ON Seanse.id_seansu = Rezerwacje.seans
      JOIN Sale ON Seanse.sala = Sale.nr
      JOIN Filmy ON Filmy.id_filmu=Seanse.film
      WHERE klient ='" . $idklienta . "' AND stan = FALSE ORDER BY id_rezerwacji;
");
$numrows2 = pg_numrows($result2);

?>

<html>

<head>
	<title>Kasjer - sprawdź status</title>
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
<h2>Sprawdź status swoich rezerwacji</h2><br>
<p>Poniżej znajduje się lista twoich zaakceptowanych rezerwacji:</p>
  
    <table border="1" align=center>
    <tr>
    <th>Numer ID</th>
    <th>Tytuł</th>
    <th>Liczba miejsc</th>
    <th>Sala</th>
    <th>Dzień</th>
    <th>Godzina</th>
    </tr>
    
    <?php
    
    // Loop on rows in the result set.

    for($ri = 0; $ri < $numrows; $ri++) {
      echo "<tr>\n";
      $row = pg_fetch_array($result, $ri);
      echo " <td>" . $row["id_rezerwacji"] . "</td>
    <td>" . $row["tytul"] . "</td>
    <td><center>" . $row["liczba_miejsc"] . "</center></td>
    <td>" . $row["sala"] . "</td>
    <td>" . $row["dzien"] . "</td>
    <td>" . $row["godz_rozpocz"] . "</td>
    </tr>
    ";
    }
    
    ?>
    </table>
    
    <p>Poniżej znajduje się lista twoich oczekujących rezerwacji:</p>
  
    <table border="1" align=center>
    <tr>
    <th>Numer ID</th>
    <th>Tytuł</th>
    <th>Liczba miejsc</th>
    <th>Sala</th>
    <th>Dzień</th>
    <th>Godzina</th>
    </tr>
    <?php

    // Loop on rows in the result set.

    for($ri = 0; $ri < $numrows2; $ri++) {
      echo "<tr>\n";
      $row = pg_fetch_array($result2, $ri);
      echo " <td>" . $row["id_rezerwacji"] . "</td>
    <td>" . $row["tytul"] . "</td>
    <td><center>" . $row["liczba_miejsc"] . "</center></td>
    <td>" . $row["sala"] . "</td>
    <td>" . $row["dzien"] . "</td>
    <td>" . $row["godz_rozpocz"] . "</td>
    </tr>
    ";
    }
    pg_close($link);
    ?>
    </table>
    
    
    
</div></div>
<p></p>
</body>
</head>
