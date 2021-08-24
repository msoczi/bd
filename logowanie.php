<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logowanie klienta</title>

    <style type="text/css">
        body {
            font-family: DejaVu Sans Mono, Helvetica, sans-serif;
            font-size: 20px;
            margin-top: 30px;
        }

        label {
            font-weight: 900;
            width: 100px;
            font-size: 17px;
        }

        .box {
            border-style: groove;
            width: 170px;
        }
    </style>

</head>

<body bgcolor="#c6c0b9">
    
    <div align="center">
        <div style="width:400px; border: solid 2px #e6b800; border-radius: 25px; background-color:#ffffff;" align="center">
            <div style="background-color:#e6b800; border-top-left-radius:20px; border-top-right-radius:20px; color:#f2f2f2; padding:3px;">
                <b> Logowanie klienta</b>
            </div>

            <div style="margin:40px">

                <form action="logklient.php" method="post">
                    <label><font color="#e6b800">Login</font></label>
                    <input type="text" name="login" class="box" />
                    <br />
                    <br />
                    <label><font color="#e6b800">Hasło</font></label>
                    <input type="password" name="haslo" class="box" />
                    <br />
                    <br />
                    <input type="submit" value=" Zaloguj " name='loguj' />
                    <br />
                </form>

                <div style="font-size:11px; color:#cc0000; margin-top:10px">
                                    </div>

            </div>

        </div>
	
      <br><br>
      
      <div style="width:400px; border: solid 2px #e6b800; border-radius: 25px; background-color:#ffffff;" align="center">
            <div style="background-color:#e6b800; border-top-left-radius:20px; border-top-right-radius:20px; color:#f2f2f2; padding:3px;">
                <b> Logowanie kasjera</b>
            </div>

            <div style="margin:40px">

                <form action="logkasjer.php" method="post">
                    <label><font color="#e6b800">Login</font></label>
                    <input type="text" name="login2" class="box" />
                    <br />
                    <br />
                    <label><font color="#e6b800">Hasło</font></label>
                    <input type="password" name="haslo2" class="box" />
                    <br />
                    <br />
                    <input type="submit" value=" Zaloguj " name='loguj2' />
                    <br />
                </form>

                <div style="font-size:11px; color:#cc0000; margin-top:10px">
                                    </div>

            </div>

        </div>
      
    </div>

</body>
</html>
