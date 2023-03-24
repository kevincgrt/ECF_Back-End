<?php

require_once './models/connectDB.php';

// Fonction pour enregistrer un utilisateur
function saveUser($username, $password_hash, $email)
{
  // Requête pour insérer les informations de l'utilisateur dans la table "users"
  $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
  try {
    $pdo = connectDB();
    //Préparez et exécutez la requête en utilisant les données fournies
    $sql = $pdo->prepare($query);
    $sql->bindParam(':username', $username, PDO::PARAM_STR);
    $sql->bindParam(':password', $password_hash, PDO::PARAM_STR);
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->execute();
    echo "<br />";
    echo "Vous êtes inscrit! Veuillez vous connecter";
  } catch (PDOException $e) {
    throw new Exception('Erreur de sauvegarde : ' . $e->getMessage());
  }
}

//Fonction pour récupérer un utilisateur avec son email
function getUserByEmail($email) {
    $query = "SELECT * FROM users WHERE email = :email";
    try {
      $pdo = connectDB();
      $sql = $pdo->prepare($query);
      $sql->bindParam(':email', $email, PDO::PARAM_STR);
      $sql->execute();
      return $sql->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      throw new Exception("Pas d'utilisateur trouvé avec cette adresse e-mail : " . $e->getMessage());
    }
}

  
// Fonction pour récupérer utilisateur avec Id
function getUserById($userId) {
  $query = "SELECT * FROM users WHERE id = :userId";
  try {
    $pdo = connectDB();
    $sql = $pdo->prepare($query);
    $sql->bindParam(':userId', $userId, PDO::PARAM_INT);
    $sql->execute();
    return $sql->fetch(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    throw new Exception("Une erreur s'est produite lors de la récupération de l'utilisateur : " . $e->getMessage());
  }
}


function updateUser($userId, $username, $email, $password) {
  $query = "UPDATE users SET username = :username, email = :email, password = :password WHERE id = :userId";
  try {
    $pdo = connectDB();
    $sql = $pdo->prepare($query);
    $sql->bindParam(':username', $username, PDO::PARAM_STR);
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->bindParam(':password', $password, PDO::PARAM_STR);
    $sql->bindParam(':userId', $userId, PDO::PARAM_INT);
    $sql->execute();
    return "Vos modifications ont été enregistrées avec succès !";
  } catch (PDOException $e) {
    throw new Exception("Une erreur s'est produite lors de la mise à jour de l'utilisateur : " . $e->getMessage());
  }
}


// Vérifie si l'utilisateur est connecté en vérifiant si la variable de session est définie
function isUserLoggedIn() {
  return isset($_SESSION['id_user']);
}
  