 <!DOCTYPE html>
<html>
<head>
<title>Rejestracja</title>
</head>
<body>

<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

# connection with database
pg_connect("host=host dbname=dbname user=user password=password");

$wynik = pg_query("SELECT MAX(id_klienta)+1 AS next_id FROM Klienci;");
$numrows = pg_numrows($wynik);
$nastepneidklienta = pg_fetch_array($wynik, 0);
$nextid = $nastepneidklienta["next_id"];


if (isset($_POST['rejestruj']))
{
   $login = $_POST['login'];
   $haslo = $_POST['haslo'];
   $haslo2 = $_POST['haslo2'];
 
   // check if login is already in the database
   if (pg_numrows(pg_query("SELECT login FROM Klienci WHERE login = '".$login."';")) == 0)
   {
      if ($haslo == $haslo2) // check if passwords are the same
      {
         $result = pg_query("INSERT INTO Klienci VALUES('".$nextid."', ".intval($login).", '".$haslo."');");
 
	 if($result){
         echo "Twoje konto zostało utworzone!<br>Możesz teraz zalogować się pod tym adresem";
         echo "<br>";
	 echo '<a href="/bd/logowanie.php">Strona logowania</a>';
	 }
	 else echo "Hasło musi zawierać co conajmniej 6 liter.";
      }
      else echo "Błąd! Podane hasła nie są takie same.";
   }
   else echo "Podany login jest już zajęty. Wybierz inny.";
}

?>

</body>
</html> 
