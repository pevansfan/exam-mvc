<?php
ob_start();
if ($data['form']) {
    // Gestion des erreurs
    if (!empty($data['errors'])) { ?>
    <div class="alert alert-danger" id="myAlert">
        <ul>
            <?php foreach ($data['errors'] as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php } else { 
        // Message de succès ?>
        <div class="alert alert-success" id="myAlert">
            Votre compte a bien été créé ! <br>             
        </div>
    <?php }
}
$content = ob_get_clean();

// J'afficherai les messages ou les erreurs en fonction des conditions ci-dessus dans le template index grâce à la fonction render
render('inscription/index', [
    'content' => $content
], true);
?>