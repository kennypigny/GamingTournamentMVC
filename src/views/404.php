<?php ob_start() ?>
<main>

    <h1>404 ERROR</h1>

    <div class="container-img">
        <img src="../assets/img/General/38c78bc0-ca30-4c25-9adb-be7ee808e653.webp" alt="Robot 404">

    </div>

    <p>La page que vous recherchez n'existe pas :'( </p>

    <a href="/">Retour à l'accueil</a>

</main>




<?php

template('default', [
    'title' => 'Error',
    'css' => '404',
    'content' => ob_get_clean(),
]);
?>