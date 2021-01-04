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
                    <?= $data['collection']->name ?>
                </h1>



                <div class=" table-responive px-4">

                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Naam</th>
                                <th scope="col">Artiest</th>
                                <th scope="col">Album</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Jaar</th>
                                <th scope="col">Aantal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['items'] as $item) : ?>

                            <tr>
                                <a
                                    href="verzameling/?id=<?= $item->id ?>">
                                    <td>
                                        <?= $item->name ?>
                                    </td>
                                    <td>
                                        <?= $item->artist ?>
                                    </td>
                                    <td>
                                        <?= $item->album ?>
                                    </td>
                                    <td>
                                        <?= $item->genre ?>
                                    </td>
                                    <td>
                                        <?= $item->year ?>
                                    </td>
                                    <td>
                                        <?= $item->amount ?>
                                    </td>
                                </a>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>



                </div>
            </div>



        </div>
    </div>



    </div>

</main>





<?php require 'partials/footer.php';
