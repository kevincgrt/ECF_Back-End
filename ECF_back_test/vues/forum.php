<?php
require "header.php"; 

include('./models/forumDB.php');

// Récupérer la liste des sujets de discussion
$sql = "SELECT * FROM topics";
$result = mysqli_query($conn, $sql);

// Afficher les sujets de discussion
while ($row = mysqli_fetch_assoc($result)) {
    echo '<a href="http://localhost/ECF_back_test/vues/topic.php?id='.$row['id'].'">'.$row['subject'].'</a><br>';
    echo '<p class="author">Par '.$row['username'].'</p>';
    echo'<br><br>';
    echo '</div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="../css/forum.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    
</body>
</html>
