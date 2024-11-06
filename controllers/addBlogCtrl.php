<?php

include 'models/Blogs.php';

//pour l'ajout d'une nouvelle tâche
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskModel = new Blog();

    $title = $_POST['blogName'];

    if (!empty($title)) {
        if (!empty($_SESSION)) {
            $idUser = $_SESSION['id'];
            $taskModel->addBlog($title, $idUser);
            header("Location: /login");
            exit;
        }
    } else {
        $message = "Échec de l'ajout de la tâche.";
    }
}
