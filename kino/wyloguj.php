<?php
session_start();
 if(!isSet($_SESSION['zalogowany'])) {
 $komunikat = "Nie byłeś zalogowany!!!";
}

 else{
 unset($_SESSION['zalogowany']);
 unset($_SESSION['sesjalogin']);
 unset($_SESSION['sesjahaslo']);

}

session_destroy();
?>


<html>

<head>
	<title>Kino - wyloguj</title>
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
	
</div><div class="main"><div class="content">


<?php
  echo "<br>";
  echo "<h2>Wylogowano pomyślnie.</h2>";
  echo "<br><br>";
  echo "Aby zalogować się ponownie przejdź do strony:";
  echo "<br>";
  echo '<a href="bd/logowanie.php">Strona logowania</a>';
?>

</div></div></body>
</head>
