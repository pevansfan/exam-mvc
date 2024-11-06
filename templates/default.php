<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oui</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <!-- NavBar -->
    <?php 
    require 'templates/ui/nav.php';
    ?>

    <div class="container">
        <ul class="list-group todos mx-auto text-light delete">
            <!-- J'affiche ici les forums à partir de la view login -->
            <?= $data['content'] ?>
        </ul>
        <br>
    </div>

    <div class="group-add">
        <form class="add text-center my-4" method="POST" action="/addBlog">
            <label for="blogName" class="text-light">Ajouter un nouveau blog</label>
            <input class="form-control m-auto" type="text" name="blogName" id="blogName" required />
            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-light">Ajouter</button>
            </div>
        </form>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>