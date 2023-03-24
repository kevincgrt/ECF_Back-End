<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre profil</title>
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<?php require "header.php"; ?>
<div class="open">
<br><br>
<?= "Bonjour ".$_SESSION['username'] ?>
<br><br>
<p>Bienvenue sur ton compte</p>
<br>
</div>
<h1>Modifier vos informations</h1>
<div class="container">
<form method="POST" action="index.php?action=updateProfile">
    <label for="username"></label>
    <input type="text" name="username" value="<?= isset($user["username"]) ? $user["username"] : "" ?>" required placeholder="Nom d'utilisateur :">
    <br><br>
    <label for="email"></label>
    <input type="email" name="email" value="<?= isset($user["email"]) ? $user["email"] : "" ?>" required placeholder="Email :">
    <br><br>
    <label for="password"></label>
    <input type="password" name="password" required placeholder="Mot de passe :">
    <br><br>
    <input id="submit" type="submit" value="Enregistrer">
</form>
</div>
</body>
</html>
