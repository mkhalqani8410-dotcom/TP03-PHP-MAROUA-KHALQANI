<?php
/*
Auteur : Maroua KHALQANI
Objectif : Gérer la connexion, les sessions, les cookies et la redirection.
Date : 17/10/2026
*/

session_start();

if (isset($_POST["login"]) && isset($_POST["password"])) {
    $login = trim($_POST["login"]);
    $password = trim($_POST["password"]);

    if ($login === "admin" && $password === "1234") {
        $_SESSION["login"] = $login;

        setcookie("login", $login, time() + 86400, "/");

        header("Location: profil.php");
        exit;
    } else {
        $erreur = "Login ou mot de passe incorrect.";
    }
}

$loginCookie = $_COOKIE["login"] ?? "";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

<h2>Connexion</h2>

<?php if (isset($erreur)): ?>
    <p style="color:red;">
        <?= htmlspecialchars($erreur) ?>
    </p>
<?php endif; ?>

<form method="POST" action="login.php">
    <label>Login :</label>
    <input
        type="text"
        name="login"
        value="<?= htmlspecialchars($loginCookie) ?>"
        required
    >
    <br><br>

    <label>Mot de passe :</label>
    <input
        type="password"
        name="password"
        required
    >
    <br><br>

    <button type="submit">Se connecter</button>
</form>

</body>
</html>
```