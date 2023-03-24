<?php
include('./models/forumDB.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    // Insérer le nouveau sujet de discussion dans la base de données
    $sql = "INSERT INTO topics (subject, content, username) VALUES ('$subject', '$content', '$username')";
    mysqli_query($conn, $sql);
    echo "Sujet créé !";
    echo '<a href="index.php">Retourner a l\'accueil</a>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un sujet !</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<form method="post">
    <label>Sujet de discussion :</label><br>
    <input type="text" name="subject"><br><br>
    <label>Contenu :</label><br>
    <textarea name="content"></textarea><br><br>
    <label>Nom d'utilisateur :</label><br>
    <input type="text" name="username"><br><br>
    <input type="submit" value="Créer le sujet">
</form>
</body>
</html>

