<?php require 'partials/head.php'; ?>
<?php require 'partials/header.php'; ?>

<main>
    <div class="container-fluid">
        <div class="row">
            <?php require 'partials/side-nav.php'; ?>

            <div class="col pt-5">
                <div class="row">
                    <?php foreach ($data['collections'] as $collection) : ?>
                    <div class="col-sm-4 col-lg-3 col-xl-2">
                        <div class="collection-card card border-0 mb-4">

                            <div class="btn-group dropup">
                                <button class="collection-btn btn btn-sm position-absolute top-0 end-0 p-1"
                                    data-bs-toggle="dropdown"><i data-feather="more-vertical"></i></button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="/verzameling/aanpassen/?id=<?= $collection->id ?>">Aanpassen</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="/verzameling/verwijderen/?id=<?= $collection->id ?>">Verwijderen</a>
                                    </li>
                                </ul>
                            </div>

                            <a
                                href="/verzameling/?id=<?= $collection->id ?>">
                                <?php if (!empty($collection->img)) : ?>
                                <img class=" card-img-top"
                                    src="<?= $collection->img ?>"
                                    alt="Card image cap">
                                <?php elseif (!empty($collection->color)) : ?>
                                <div class=" collection-card-img card-img-top"
                                    style="background-color: <?= $collection->color;?>">
                                </div>
                                <?php else : ?>
                                <img class="collection-card-img card-img-top" src="public/images/homepage-image.jpg"
                                    alt="Card image cap">
                                <?php endif ?>
                                <div class="card-body px-0 pt-2 pb-0">
                                    <p class="card-title">
                                        <?= $collection->name ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>



    </div>

</main>

<?php require 'partials/footer.php';
