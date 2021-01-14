<?php require 'partials/head.php'; ?>
<?php require 'partials/header.php'; ?>
<main>
    <div class="container-fluid">
        <div class="row">
            <?php require 'partials/side-nav.php'; ?>
            <div class="col p-0">
                <div class="py-4 px-4"
                    style="height: 3rem; width: 100%; background-color: <?= $data['collection']->color?>">

                </div>
                <h1 class="py-2 px-4">
                    <?= $data['item']->name ?>
                </h1>
                <div class="row">
                    <div class="col">
                        <h3> <?= $data['item']->artist ?>
                            - <?= $data['item']->album ?>
                        </h3>
                        <p>Genre : <?= $data['item']->genre ?>
                        </p>
                        <p>Jaar : <?= $data['item']->year ?>
                        </p>
                        <p>Omschrijving: <?= $data['item']->description ?>
                        </p>
                        <?php if (isset($data['item']->tracklist)) : ?>
                        <?php foreach (json_decode($data['item']->tracklist, false) as $track) : ?>
                        <p>
                            <?= $track->nr ?>. <?= $track->Title ?> (<?= $track->Duration ?>)
                        </p>
                        <?php endforeach ?>
                        <?php endif ?>
                    </div>
                    <div class="col">
                        <p>Identificatie Nummer: <?= $data['item']->id_code ?>
                        </p>
                        <p>
                            Aantal: <?= $data['item']->amount ?>
                        </p>
                        <p>Notities: <?= $data['item']->notes ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>





<?php require 'partials/footer.php';
