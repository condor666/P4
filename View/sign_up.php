<!DOCTYPE html>
<html>
<head>
	<title>mon blog</title>
</head>
<body>

<form action="../Controller/sign_up.php" method="POST">
	<input type="text" name="login" placeholder="Pseudo" required><br>
	<input type="password" name="psw" placeholder="Mot de passe" required><br>
	<input type="password" name="psw_check" placeholder="Retapez votre mot de passe" required><br>
	<input type="email" name="mail" placeholder="Adresse email" required><br>
	<input type="submit" name="submit"><br>
</form>

</body>
</html>