<?php
session_start();
if($_SESSION["zalogowany"]!=1){
  echo "<h3>Nie jesteś zalogowany! Przejdź do poniższej strony aby się zalogować i uzyskać dostęp do zawartości strony.";
  echo "<br>";
  echo '<a href="bd/logowanie.php">Strona logowania</a>';
  exit();
}
?>

<?php
$tytulfilmu = $_POST["tytulfilmu"]; //to bedzie wprowadzal uzytkownik

$link = pg_connect("host=host dbname=dbname user=user password=password");
//result == wynik
$result = pg_query($link,
			"SELECT id_seansu, dzien, godz_rozpocz, czas_trwania, sala 
                          FROM Seanse JOIN Filmy
                          ON Seanse.film = Filmy.id_filmu
                          WHERE tytul = '" . $tytulfilmu . "'");
$numrows = pg_numrows($result);
?>


<html>

<head>
	<title>Kino - zarezewuj</title>
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
<h2>Rezerwacja</h2>
<p>Wybierz tytuł filmu aby zobaczyć kiedy będzie można go obejrzeć.</p>
<center>
  <form action="bd/kino/sprawdzfilm.php" method="post">
    <select name="tytulfilmu">
		<option value="American Gangster">American Gangster</option>
		<option value="Buntownik z wyboru">Buntownik z wyboru</option>
		<option value="Bękarty wojny">Bękarty wojny</option>
		<option value="Django">Django</option>
		<option value="Dwunastu gniewnych ludzi">Dwunastu gniewnych ludzi</option>
		<option value="Dzień próby">Dzień próby</option>
		<option value="Gladiator">Gladiator</option>
		<option value="Gran Torino">Gran Torino</option>
		<option value="Joe Black">Joe Black</option>
		<option value="Koneser">Koneser</option>
		<option value="Leon zawodowiec">Leon zawodowiec</option>
		<option value="Nienawistna ósemka">Nienawistna ósemka</option>
		<option value="Nietykalni">Nietykalni</option>
		<option value="Ojciec chrzestny">Ojciec chrzestny</option>
		<option value="Pianista">Pianista</option>
		<option value="Prawnik z Lincolna">Prawnik z Lincolna</option>
		<option value="Prestiż">Prestiż</option>
		<option value="Siedem dusz">Siedem dusz</option>
		<option value="Skazani na Shawshank">Skazani na Shawshank</option>
		<option value="Szkoła dla łobuzów">Szkoła dla łobuzów</option>
		<option value="Twój Vincent">Twój Vincent</option>
		<option value="W pogoni za szczęściem">W pogoni za szczęściem</option>
		<option value="Zaginiona dziewczyna">Zaginiona dziewczyna</option>
	</select>
	<input type="submit" required="required" name="submit" value="Szukaj seansów" />
  </form>
 </center> 
	<?php
    if($numrows==0 && !empty($tytulfilmu)){
      echo "<br><h3>Nie znaleziono filmu o takim tytule.</h3>";}
    ?>
    <center><p>Wybierz seans:</p></center>
    
    <h3 align=center><?php echo " '$tytulfilmu' " ?></h3>
	
      <table border="1" align=center>
      <tr>
      <th></th>
      <th>Dzień</th>
      <th>Godzina</th>
      <th>Czas trwania</th>
      <th>Sala</th>
      </tr>
      
      <form action="rezerwacja.php" method="post"> 
      
	<?php
	// Loop on rows in the result set.

	for($ri = 0; $ri < $numrows; $ri++) {
	  echo "<tr>\n";
	  $row = pg_fetch_array($result, $ri);
	  echo " <td><input type='radio' name='film_rez'   value=" . $row["id_seansu"] . " required></td>
	<td>" . $row["dzien"] . "</td>
	<td>" . $row["godz_rozpocz"] . "</td>
	<td><center>" . $row["czas_trwania"] . "</center></td>
	<td><center>" . $row["sala"] . "</center></td>
	</tr>
	";
	}
	pg_close($link);
	?>
	</table>
	<center>
	<p>Podaj ilość miejsc, które chcesz zarezerwować.</p>
	 <?php
	//echo "Numer seansu: <input type=number name='nrseansu2' value='$nrseansu2'><br>";
	echo "Liczba miejsc: <input type=number min='1' required='reguired' name='liczbamiejsc' value='$liczbamiejsc'>";
	//echo "Login: <input type=text name=login required pattern=[0-9]{6} value='$login'><br>";
	//echo "Hasło: <input type=password name='haslo' value='$haslo'><br>";
	?>
	<center><input type="submit" name="submitrez" value="Rezerwuj" /></center>
      </form>
  
</div></div></body>
</head>
