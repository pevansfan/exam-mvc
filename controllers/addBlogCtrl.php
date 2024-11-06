<?php

include 'models/Blogs.php';

//pour l'ajout d'une nouvelle tâche
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskModel = new Blog(); 

    $title = $_POST['blogName']; // Je récupère le titre du blog du formulaire

    if (!empty($title)) {  // Je vérifie si le titre est vide
        if (!empty($_SESSION)) { // même chose si une session est lancée
            $idUser = $_SESSION['id']; 
            $taskModel->addBlog($title, $idUser); // Création d'un nouveau blog
            header("Location: /login");
            exit;
        }
    } else {
        $message = "Échec de l'ajout de la tâche."; // Cas contraire
    }
}
