<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/style_form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
    <div class="containerT" style="display: flex; flex-direction: column;" id="app">
        <?= $data['content'] ?>
        <h1 class="title">Créer mon compte</h1>
        <form action="/create" id="inscriptionForm" method="POST">
            <div class="identity">
                <div class="input-box">
                    <input type="text" name="lastname" required>
                    <label>Nom</label>
                </div>
                <div class="input-box">
                    <input type="text" name="firstname" required>
                    <label>Prénom</label>
                </div>
            </div>
            <div class="input-box">
                <input type="email" name="email" id="email" required>
                <label>Adresse mail</label>
            </div>
            <div class="input-box">
                <input type="password" name="newPassword" id="newPassword" required>
                <label>Nouveau mot de passe</label>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="confirmPassword" required>
                <label>Confirmer le mot de passe</label>
            </div>
            <button type="submit" name="submit" class="myBtn">S'inscrire</button>
            <div class="back-connexion">
                <p><a href="/login">Connexion</a></p>
            </div>
        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>