 <!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

session_start();
$_SESSION["zalogowany"]=0;
# laczymy sie z baza danych
pg_connect("host=host dbname=dbname user=user password=password");


if (isset($_POST['login2']))
{
   $login = $_POST['login2'];
   $haslo = $_POST['haslo2'];
 
   # sprawdzamy czy login i hasło są dobre
   # to jest storna do logowania dla KLIENTA! (dla KASJERA wystarczy zmienic tabele)
   if (pg_num_rows(pg_query("SELECT login, haslo FROM Kasjerzy WHERE login = '".$login."' AND haslo = '".$haslo."';")) > 0)
   {
      
      //echo " Brawo Kasjerze! Udało ci sie zalogować! ";
      $_SESSION["zalogowany"]=2;
      $_SESSION["sesjalogin"]=$login;
      $_SESSION["sesjahaslo"]=$haslo;
      header("location: kino/panelkasjera.php");
 
   }
   else echo " Wpisano złe dane. Spróbuj ponownie. ";
}
?>

</body>
</html> 
