<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php

require_once "./models/modelUser.php";

/* ...........................................................connection..................................................... */

function connexion() 
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Recherche de l'utilisateur dans la base de données
            $user = getUserByEmail($email);

            if ($user) {
                // Vérification du mot de passe
                if (password_verify($password, $user["password"])) {
                    $_SESSION["username"] = $user["username"];
                    require_once "./vues/profile.php";
                } else {
                    throw new Exception("Mot de passe incorrect");
                }
            } else {
                throw new Exception("L'utilisateur avec l'adresse e-mail $email n'existe pas");
            }
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la connexion : " . $e->getMessage());
        }
    }
    else {
        require "./vues/connexion.php";
    }
    
}

/* ...........................................................inscription........................................................ */

/* function inscription() 
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupération des données
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        // Hachage du mot de passe
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        // Vérification des champs obligatoires
        if (empty($username) || empty($password) || empty($email)) {
            echo "<br />";
            echo "Veuillez remplir les champs obligatoires";
        } else {
            // Vérification de la validité de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Adresse email non valide";
            } else {
                try {
                    // Enregistre l'utilisateur dans la base de données en appelant la fonction registerUser
                    saveUser($username, $password_hash, $email);
                } catch (Exception $e) {
                    echo "Erreur lors de l'enregistrement de l'utilisateur : " . $e->getMessage();
                }
            }
        }
    }
    require "./vues/inscription.php";
} */

function inscription() 
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupération des données
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        
        // Vérification de la bonne réponse
        $description = $_POST['description'];
        $bonne_reponse = "oui";
        if ($description != $bonne_reponse) {
            echo "<script>alert('Vous êtes un imposteur !!! 😈')</script>";
            echo "<script>alert('Seuls les chats sont accéptés 🙄')</script>";
            exit();
        }
        
        // Hachage du mot de passe
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        // Vérification des champs obligatoires
        if (empty($username) || empty($password) || empty($email)) {
            echo "<br />";
            echo "Veuillez remplir les champs obligatoires";
        } else {
            // Vérification de la validité de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Adresse email non valide";
            } else {
                try {
                    // Enregistre l'utilisateur dans la base de données en appelant la fonction registerUser
                    saveUser($username, $password_hash, $email);
                } catch (Exception $e) {
                    echo "Erreur lors de l'enregistrement de l'utilisateur : " . $e->getMessage();
                }
            }
        }
    }
    require "./vues/inscription.php";
}

/* ...........................................................home........................................................ */

function home()
{
    require "./vues/home.php";
}

/* ...........................................................profile........................................................ */

function profile() 
{
    require "./vues/profile.php";
}

/* ...........................................................forum et topics........................................................ */

function forum()
{
    require "./vues/forum.php";
}

function createtopic()
{
    require "./vues/createtopic.php";
}

function topic()
{
    require "./vues/topic.php";
}

/* ...........................................................logout........................................................ */

function logout() 
{
    session_destroy();
    home();
}

function getLoggedInUserData() 
{
  try {
    $user_id = $_SESSION['user_id'];
    $user_data = getUserById($user_id);
    return $user_data;
  } catch (Exception $e) {
    throw new Exception("Une erreur s'est produite : " . $e->getMessage());
  }
}
