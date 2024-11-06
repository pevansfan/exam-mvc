<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="/assets/css/style_form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
    <div class="containerT" id="loginForm">
        <div class="login-box">
            <?= $data['content'] ?> <!-- J'affiche ici que les messages d'erreurs (puisque si je suis connecté, cela me redirige vers la page d'accueil) -->

            <h1>Se connecter</h1>
            <form action="/login" id="connexionForm" method="POST">
                <div class="input-box">
                    <input type="email" id="email" name="email" required>
                    <label>Adresse mail</label>
                </div>
                <div class="input-box">
                    <span id="togglePassword" class="togglePassword"><ion-icon name="eye-off-outline"></ion-icon></span>
                    <input type="password" id="password" name="password" required>
                    <label>Mot de passe</label>
                </div>

                <div class="forgot-pass">
                    <p><a href="/forgot">Mot de passe oublié ?</a></p>
                </div>
                <button type="submit" name="submit" class="myBtn">Se connecter</button>
                <div class="signup-link">
                    <p>Vous n'avez pas de compte ? <a href="/createUser"> S'inscrire</a></p>
                </div>
                <?php

                ?>
            </form>
        </div>
    </div>

    <!-- Script permettant de modifier la visibilité du mot de passe en modifiant le type de l'input -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            togglePassword.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    togglePassword.innerHTML = '<ion-icon name="eye-outline"></ion-icon>';
                } else {
                    passwordInput.type = 'password';
                    togglePassword.innerHTML = '<ion-icon name="eye-off-outline"></ion-icon>';
                }
            });
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>