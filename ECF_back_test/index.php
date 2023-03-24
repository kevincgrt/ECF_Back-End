<?php
session_start();

require_once "controllers/controller.php";

// Vérification de l'URL pour déterminer quelle action doit être exécutée
if (isset($_GET['action']) && $_GET['action'] == "inscription") {
    inscription();
} elseif(isset($_GET['action']) && $_GET['action'] == "connexion") {
    connexion();
} elseif(isset($_GET['action']) && $_GET['action'] == "profile" ){
    profile();
} elseif (isset($_GET['action']) && $_GET['action'] == "logout") {
    logout();
} elseif (isset($_GET['action']) && $_GET['action'] == "forum") {
    forum();
}elseif (isset($_GET['action']) && $_GET['action'] == "createtopic") {
    createtopic();
}elseif (isset($_GET['action']) && $_GET['action'] == "topic") {
    topic();
}else{
    home();
}
