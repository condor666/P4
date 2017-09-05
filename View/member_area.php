<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>mon blog</title>
</head>
<body>

<?php

// TODO handle sessions handlers
if (!isset($_SESSION[''])) {
    echo '<p>Vous n\'ètes pas autorisé a voir ce contenu <a href="login.php"></a></p>';
} else {
    echo '<p>Bienvenue dans l\'espace membres</p>';
}

?>

</body>
</html>