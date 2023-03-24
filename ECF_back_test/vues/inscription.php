<!DOCTYPE html>
<html>
<head>
    <title>Inscris toi</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>
<?php
require "header.php"; 
?>
    <h1>Inscris toi</h1>
    <div class="container1">
    <form action="./index.php?action=inscription" method="post">
    <label for="username"></label>
        <input type="text" id="username" name="username" required placeholder="Le nom que votre humain vous a donné 😺 :"><br><br>
        <label for="email"></label>
        <input type="email" id="email" name="email" required placeholder="Votre ChatMail 📩 :"><br><br>
        <label for="password"></label>
        <input type="password" id="password" name="password" required placeholder="Mot de passe secret 😎 :"><br><br>


        <div class="form-row">
        <label for="description">A tu peur de l'eau ?</label>
        <textarea name="description" id="description" placeholder="Bonne réponse exigé !"></textarea>
        </div>
    <br><br><input id="submit" type="submit" value="S'inscrire 😻">
    </form>
    </div>
</body>
</html>
