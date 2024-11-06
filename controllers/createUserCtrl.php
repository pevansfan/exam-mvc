<?php
include 'models/Users.php';

$userModel = new User();

$errors = []; // Liste des erreurs
$registered = false; // Par défaut, l'utilisateur n'est pas créé

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Gestions des erreurs de chaque input
    if (!empty($_POST['email'])) {
        if (strlen($_POST['email']) <= 255) {
            $email = htmlspecialchars($_POST['email']);
        } else {
            $errors['email'] = 'Email trop long';
        }
    } else {
        $errors['email'] = 'Veuillez entrer un email';
    }

    if (!empty($_POST['firstname'])) {
        if (strlen($_POST['firstname']) <= 50) {
            $firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $errors['firstname'] = 'Prénom trop long';
        }
    } else {
        $errors['firstname'] = 'Veuillez entrer un prénom';
    }

    if (!empty($_POST['lastname'])) {
        if (strlen($_POST['lastname']) <= 50) {
            $lastname = htmlspecialchars($_POST['lastname']);
        } else {
            $errors['lastname'] = 'Prénom trop long';
        }
    } else {
        $errors['lastname'] = 'Veuillez entrer un prénom';
    }

    if (!empty($_POST['password'])) {
        if (strlen($_POST['password']) <= 255) {
            $password = htmlspecialchars($_POST['password']);
        } else {
            $errors['password'] = 'Mot de passe trop long';
        }
    } else {
        $errors['password'] = 'Veuillez entrer un mot de passe';
    }

    if (!empty($_POST['newPassword'])) {
        if (strlen($_POST['newPassword']) <= 255) {
            $newPassword = htmlspecialchars($_POST['newPassword']);
        } else {
            $errors['newPassword'] = 'Mot de passe trop long';
        }
    } else {
        $errors['newPassword'] = 'Veuillez entrer un mot de passe';
    }

    $alertClass = "";

    // Gestion des erreurs du mot de passe
    if (strlen($password) < 8) {
        $message = "Mot de passe trop court. Le mot de passe doit comporter au moins 8 caractères.";
        array_push($errors, $message);
    }

    if (strlen($password) >= 8) {
        if ($password !== $newPassword) {
            $message = "Veuillez entrez le même mot de passe";
            array_push($errors, $message);
            $alertClass = "alert-danger";
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $message = "Le mot de passe doit comporter au moins une majuscule.";
            array_push($errors, $message);
        }

        if (!preg_match('/[a-z]/', $password)) {
            $message = "Le mot de passe doit comporter au moins une minuscule.";
            array_push($errors, $message);
        }

        if (!preg_match('/[0-9]/', $password)) {
            $message = "Le mot de passe doit comporter au moins un chiffre.";
            array_push($errors, $message);
        }
    }

    if (count($errors) == 0) { // le cas où il y a aucune erreur, je crée l'utilisateur à partir des données récupérées du formulaire d'inscription
        $registered = $userModel->create_user($email, $firstname, $lastname, password_hash($password, PASSWORD_DEFAULT), 4);
    }
}


render('createUser', [
    'form' => $_SERVER['REQUEST_METHOD'] == "POST",
    'errors' => $errors,
    'registered' => $registered
]);