<!DOCTYPE html>
<html>
<head>
    <title>Rejestracja</title>

    <style type="text/css">
        body {
            font-family: DejaVu Sans Mono, Helvetica, sans-serif;
            font-size: 20px;
            margin-top: 80px;
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
    <center><p>Login powinien składać się z 6 cyfr.<br>Hasło nie może składac się z mniej niż 6 liter.</p></center>
    <div align="center">
        <div style="width:400px; border: solid 2px #e6b800; border-radius: 25px; background-color:#ffffff;" align="center">
            <div style="background-color:#e6b800; border-top-left-radius:20px; border-top-right-radius:20px; color:#f2f2f2; padding:3px;">
                <b> Rejestracja </b>
            </div>

            <div style="margin:40px">

                <form action="rejestrklient.php" method="post">
                    <label><font color="#e6b800">Login</font></label>
                    <input type="text" name="login" required pattern="[0-9]{6}" class="box">                    
                    <br />
                    <br />
                    <label><font color="#e6b800">Hasło</font></label>
                    <input type="password" name="haslo" class="box " />
                    <br />
                    <br />
                    <label><font color="#e6b800">Powtórz hasło</font></label>
                    <input type="password" name="haslo2" class="box" />
                    <br />
                    <br />
                    <input type="submit" value=" Zarejestruj " name='rejestruj' />
                    <br />
                </form>

                <div style="font-size:11px; color:#cc0000; margin-top:10px">
                                    </div>

            </div>

        </div>
	
    </div>

</body>
</html>
