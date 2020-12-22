<?php require 'partials/head.php'; ?>
<?php require 'partials/header.php' ?>

<main>
    <div class="container-fluid">
        <h1>
            Maak een verzameling aan
        </h1>

        <?php
        if (!empty($verzamelingTemplate)) {
            require "verzameling-aanmaken/$verzamelingTemplate.php";
        } else {
            require "verzameling-aanmaken/start.php";
        }
            ?>

    </div>

</main>

<?php require 'partials/footer.php';
