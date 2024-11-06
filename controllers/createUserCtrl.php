<?php
include 'models/Users.php';

$userModel = new User();

$errors = [];
$registered = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['lastname'])) {
        if (strlen($_POST['lastname']) <= 100) {
            $lastname = htmlspecialchars($_POST['lastname']);
        } else {
            $errors['lastname'] = 'salut';
        }
    } else {
        $errors['lastname'] = 'salut';
    }

    

    $email = htmlspecialchars($_POST['email']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $password = $_POST['password'];
    $newPassword = $_POST['newPassword'];
    $alertClass = "";

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

    if (count($errors) == 0) {
        $registered = $userModel->create_user($email, $firstname, $lastname, password_hash($password, PASSWORD_DEFAULT), 4);
    }
}

render('createUser', [
    'form' => $_SERVER['REQUEST_METHOD'] == "POST",
    'errors' => $errors,
    'registered' => $registered
]);