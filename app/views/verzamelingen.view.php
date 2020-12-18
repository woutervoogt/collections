<?php require 'partials/head.php'; ?>
<?php require 'partials/header.php'; ?>

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 left-nav pt-5">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/verzameling/toevoegen">Verzameling toevoegen</a>
                    </li>
                </ul>
            </div>
            <div class="col pt-5">
                <div class="row">
                    <?php for ($i=0; $i < 12; $i++) : ?>
                    <div class="col-sm-4 col-lg-3 col-xl-2">
                        <div class="verzameling-card card border-0 pt-4">

                            <div class="btn-group dropup">
                                <button class="btn btn-sm btn-secondary position-absolute top-0 end-0"
                                    data-bs-toggle="dropdown">::</button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="/verzameling/id/aanpassen">Aanpassen</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/verzameling/id/verwijderen">Verwijderen</a>
                                    </li>
                                </ul>
                            </div>

                            <a href="/verzameling/id">
                                <img class="card-img-top" src="public/images/homepage-image.jpg" alt="Card image cap">
                                <div class="card-body px-0 pt-2 pb-0">
                                    <p class="card-title"><?='Naam Verzameling'?>
                                    </p>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endfor ?>
            </div>

        </div>
    </div>



    </div>

</main>

<?php require 'partials/footer.php';
