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


if (!empty($_SESSION['id'])) {
    render("default", [
        'content' => $content
    ], true);
} else {
    render("login/index", [
        'content' => $content
    ], true);
}




?>