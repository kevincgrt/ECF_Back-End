<?php
include('../models/forumDB.php');

// Récupérer le sujet de discussion
$sql = "SELECT * FROM topics WHERE id=".$_GET['id'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo '<h1>'.$row['subject'].'</h1>';
echo'<br><br>';
echo '<p>'.$row['content'].'</p>';
echo'<br><br>';

// Récupérer les messages associés
$sql = "SELECT * FROM posts WHERE topic_id=".$_GET['id'];
$result = mysqli_query($conn, $sql);

// Afficher les messages
while ($row = mysqli_fetch_assoc($result)) {
    echo '<p><b>'.$row['username'].':</b> '.$row['content'].'</p>';
}
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $topic_id = mysqli_real_escape_string($conn, $_POST['topic_id']);

    // Insérer le nouveau message dans la base de données
    $sql = "INSERT INTO posts (content, username, topic_id) VALUES ('$content', '$username', '$topic_id')";
    mysqli_query($conn, $sql);
}

//si l'utilisateur n'est pas connecté il ne pourra pas accéder au post de commentaires
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: http://localhost/ECF_back_test/index.php?action=connexion');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/topic.css">
    <title>Topics</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<form method="post">
    <input type="hidden" name="topic_id" value="<?php echo $_GET['id']; ?>">
    <br><br>
    <label>Contenu :</label>
    <textarea name="content"></textarea><br><br>
    <?php if (isset($_SESSION['username'])) { ?>
        <p>Poster en tant que <?php echo $_SESSION['username']; ?></p>
        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
    <?php } ?>
    <br><br>
    <input type="submit" value="Poster">
</form>
<a href="../index.php">Retour a l'accueil</a>
</body>
</html>



