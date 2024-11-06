<?php
session_destroy(); // Destruction de la session
header('Location: /login'); // Redirection vers la page de connexion
?>