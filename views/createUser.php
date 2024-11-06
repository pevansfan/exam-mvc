<?php
ob_start();
if ($data['form']) {
    if (!empty($data['errors'])) { ?>
    <div class="alert alert-danger" id="myAlert">
        <ul>
            <?php foreach ($data['errors'] as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php } else { ?>
        <div class="alert alert-success" id="myAlert">
            Votre compte a bien été créé ! <br>             
        </div>
    <?php }
}
$content = ob_get_clean();

render('inscription/index', [
    'content' => $content
], true);
?>