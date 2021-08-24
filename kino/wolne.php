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
$nrseansu2 = intval($_POST['film_rez']);
$pusty = $_POST["$numrows"];
$liczbamiejsc = $_POST["liczbamiejsc"];
$login = $_SESSION["sesjalogin"];
$haslo = $_SESSION["sesjahaslo"];

// TRZEBA ZMIENIC ZAPYTANIE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// Przyda sie pózniej INSERT INTO Rezerwacje VALUES() zeby zarezerwoac bilet

$link = pg_connect("host=host dbname=dbname user=user password=password");



// teraz druga część tzn rezerwacja
$wynik = pg_query($link,
			"SELECT MAX(id_rezerwacji)+1 AS next_id FROM Rezerwacje;");
$numrowsrez = pg_numrows($wynik);
$nastepneidrezerwacji = pg_fetch_array($wynik, 0);
$nextid = $nastepneidrezerwacji["next_id"];
// a teraz wybieranie id_klienta podajacego swoje haslo
$wynik2 = pg_query($link,
			"SELECT id_klienta FROM Klienci
			 WHERE haslo = '" . pg_escape_string($haslo) . "' AND login = '" . intval($login) . "';");
$numrowsclient = pg_numrows($wynik2);
$idclient = pg_fetch_array($wynik2);
$idklienta = $idclient["id_klienta"];

?>

<html>

<head>
	<title>Kino - wolne</title>
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
<h2>Rezerwacje</h2><br>
    
    
	<?php
	  //tutaj zaczyna sie skopiowany tekst dla szukania wolych miejsc
			$result = pg_query($link,
				      "SELECT ilosc_miejsc - SUM(liczba_miejsc) AS wolne_miejsca FROM Seanse
				      JOIN Rezerwacje ON Seanse.id_seansu = Rezerwacje.seans
				      JOIN Sale ON Seanse.sala = Sale.nr
				      WHERE id_seansu = '" . intval($nrseansu2) . "' AND stan = TRUE
				      GROUP BY ilosc_miejsc;");
	      $numrows = pg_numrows($result);

	      if($numrows==0){
		$result2 = pg_query($link,
				      "SELECT ilosc_miejsc AS wolne_miejsca2 FROM Seanse
				      JOIN Rezerwacje ON Seanse.id_seansu = Rezerwacje.seans
				      JOIN Sale ON Seanse.sala = Sale.nr
				      WHERE (id_seansu = '" . intval($nrseansu2) ."' AND (stan = FALSE OR stan IS NULL))
				      GROUP BY ilosc_miejsc;");
		$numrows2 = pg_numrows($result2);
		if($numrows2==0){
		  $result3 = pg_query($link,
				      "SELECT ilosc_miejsc FROM Seanse
				      JOIN Sale ON Seanse.sala = Sale.nr
				      WHERE id_seansu = '" . intval($nrseansu2) . "'
				      GROUP BY ilosc_miejsc;");
		$numrows3 = pg_numrows($result3);
		
		$wolnemiejsca = pg_fetch_array($result3);
		$wolne = $wolnemiejsca["ilosc_miejsc"];
		}
		else{
		  $wolnemiejsca = pg_fetch_array($result2);
		  $wolne = $wolnemiejsca["wolne_miejsca2"];
		}
		
	      }
	      else{
		$wolnemiejsca = pg_fetch_array($result);
		$wolne = $wolnemiejsca["wolne_miejsca"];
	      }

	  //tutaj koknczy sie skopiowany tekst dla szukania wolych miejsc
	
	
      ?>
      
      <?php
      echo "<h3>Liczba wolnych miejsc: " . $wolne . "</h3><br>";
      if(empty($wolne) && empty($pusty)) echo "<h3>Nie wybrano seansu. Spróbuj ponownie.</h3><br>";
      echo '<a href="bd/kino/sprawdzfilm.php">Przejdź do panelu rezerwacji.</a>';
      echo '<br><br><a href="bd/kino/rezerwacje.php">Powrót.</a>';
      if(empty($wolne) && !empty($nrseansu))
      echo "<h3>Nie znaleziono seansu o takim numerze.</h3>";
      ?>
      
    </form>

</div></div></body>
</head>
