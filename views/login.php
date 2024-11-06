<?php
ob_start();

if (!empty($data['errors'])) { ?>
    <div class="alert alert-danger" id="myAlert">
        <ul>
            <?php foreach ($data['errors'] as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php } else {
    render('blogs/index', [
        'blogs' => $data['blogs'],
    ], true);
}

$content = ob_get_clean();

// Je vérifie si une session est lancée
if (!empty($_SESSION['id'])) {
    // À partir de la condition ci-dessus, cela m'affichera logiquement tous les forums et me redirige vers la page d'accueil
    render("default", [
        'content' => $content
    ], true);
} else {
    // Dans le cas contraire, cela m'affichera la liste des erreurs et me redirige vers la page de connexion
    render("login/index", [
        'content' => $content
    ], true);
}




?>