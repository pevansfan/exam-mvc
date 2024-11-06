<?php

// J'inclue tous les modèles
include 'models/Users.php';
include 'models/Messages.php';
include 'models/Blogs.php';

$errors = [];
$messageModel = new Message();
$blogModel = new Blog();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $user = new User();

    //Gestion des inputs s'ils sont non vides
    if (!empty($_POST['email'])) {
        $user->email = htmlspecialchars($_POST['email']);
    } else {
        $errors['email'] = 'email Obligatoire';
    }

    if (!empty($_POST['password'])) {
        $user->password = htmlspecialchars($_POST['password']);
    } else {
        $errors['password'] = 'Mot de passe Obligatoire';
    }

    $userData = $user->getByEmail();

    // Je vérifie s'il existe bien un utilisateur avec une adresse mail existante
    if ($userData) {
        $user->id = $userData->id;
        $user->firstname = $userData->firstname;
        if (password_verify($user->password, $userData->password)) { // Vérification du mot de passe
            $_SESSION['firstname'] = $user->firstname; // Récupération du prénom de l'utilisateur
            $_SESSION['lastname'] = $user->lastname; // Récupération du nom de l'utilisateur
            $_SESSION['id'] = intval($user->id); // // Récupération de l'id de l'utilisateur (en transformant le string en int)
        } else {
            // Gestion des erreurs du mot de passe
            $errors['global'] = "Mot de passe incorrect";
        }
    } else {
        $errors['global'] = "Email ou mot de passe incorrect";
    }
}

if (!empty($_SESSION)) {
    $blogs = $blogModel->getAllBlogs();
} else {
    $blogs = [];
}

render('login', [
    'errors' => $errors,
    'blogs' => $blogs
]);