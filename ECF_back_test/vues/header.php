<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <div class="menu">
            <a href="./index.php"><img id="logo" src="./public/images/logo (2).png" alt="logo"></a>
            <ul>
                <li id="forum"><?php echo '<a href="index.php?action=forum"><button action="forum" id="forum" type="button">forum</button></a>';?></li>
                <li id="forum"><?php echo '<a href="index.php?action=createtopic"><button action="createtopic" id="createtopic" type="button">Créer un topic</button></a>';?></li>
            </ul>
            <?php
// Démarrer la session

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['username'])) {
  // Si l'utilisateur est connecté, afficher le bouton de déconnexion
  echo '<a href="index.php?action=logout"><button action="logout" id="logout" type="button">Se déconnecter</button></a>';
} else {
  // Si l'utilisateur n'est pas connecté, afficher les boutons de connexion et d'inscription
  echo '<a href="index.php?action=connexion"><button action="connexion" id="connexion" type="button">Se connecter</button></a>';
  echo '<a href="index.php?action=inscription"><button action="inscription" id="inscription" type="button">S\'inscrire</button></a>';
}
?>
            <div class="user">
            
            <a href="index.php?action=profile" id="user-link"><img id="user" src="./public/images/cat.png" alt="user"></a>
            <script>
                let userLink = document.getElementById("user-link");
                let userImage = document.getElementById("user");

                <?php if (isset($_SESSION["username"])) { ?>
                    userLink.href = "index.php?action=profile";
                <?php } else { ?>
                    userLink.href = "#";
                    userLink.addEventListener("click", function(event) {
                        event.preventDefault();
                        alert("Vous devez être inscrit(e) ou connecté(e) pour accéder à votre profil 😉.");
                    });
                <?php } ?>
            </script>
    </header>

</body>

</html>