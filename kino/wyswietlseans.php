<!-- Ten plik nie jest w zasadzie juz potrzebny ale go sobie zostawie jakbym jednak chciał zmienić koncepcję -->

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
</head>
<body bgcolor="white">


<?php
$link = pg_connect("host=host dbname=dbname user=user password=password");

$dzien = $_POST['dzien'];

$result = pg_query($link, "SELECT tytul, rezyser, rok_prod, typ, godz_rozpocz, czas_trwania, sala FROM Seanse JOIN Filmy
ON Seanse.film = Filmy.id_filmu
WHERE dzien = '".$dzien."'
ORDER BY godz_rozpocz;");
$numrows = pg_numrows($result);
?>

<h2 align=center>Repertuar</h2>

<table border="1" align=center>
<tr>
 <th>Tytul</th>
 <th>Reżyser</th>
 <th>Rok</th>
 <th>Typ</th>
 <th>Godzina</th>
 <th>Dlugość</th>
 <th>Sala</th>
</tr>
<?php

 // Loop on rows in the result set.

 for($ri = 0; $ri < $numrows; $ri++) {
  echo "<tr>\n";
  $row = pg_fetch_array($result, $ri);
  echo " <td>" . $row["tytul"] . "</td>
 <td>" . $row["rezyser"] . "</td>
 <td>" . $row["rok_prod"] . "</td>
 <td>" . $row["typ"] . "</td>
 <td>" . $row["godz_rozpocz"] . "</td>
 <td>" . $row["czas_trwania"] . "</td>
 <td>" . $row["sala"] . "</td>
</tr>
";
 }
 pg_close($link);
?>
</table>
</body>
</html>
