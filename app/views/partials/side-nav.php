<?php  ?>
<div class="col-md-1 py-5 px-2 ml-0 h-100 left-nav ">
    <ul class="nav flex-column">
        <?php if (isset($_SESSION) && isset($_SESSION['user'])) : ?>

        <h4 class="navbar-text pt-3 pb-0 pl-0 pr-3 m-0">
            <?= $_SESSION['user']['name'] ?>
        </h4>
        <?php endif ?>

        <?php if (isset($_SESSION) && isset($_SESSION['user']) && isset($data['collections']) && $_SESSION['user']['id'] === $data['collections'][0]->user_id) : ?>
        <li class="nav-item">
            <h5 class="navbar-text pt-3 pb-0 px-3 m-0">Verzameling opties</h5>
        </li>
        <li class="nav-item">
            <a class="nav-link pt-3 pb-0" href="/verzamelingen/aanmaken">Verzameling
                toevoegen</a>
        </li>
        <?php if (substr($_SERVER['REQUEST_URI'], 0, 13) === '/verzameling/') :?>
        <li class="nav-item">
            <a class="nav-link pt-3 pb-0"
                href="/verzamelingen/aanpassen?id=<?= $data['collection']->id?>">Verzameling
                aanpassen</a>
        </li>
        <li class="nav-item">
            <form action="/verzamelingen/verwijderen" method="post">
                <input type="hidden" name="collection_id"
                    value="<?= $data['collection']->id ?>">
                <button class="btn bnt-link nav-link pt-3 pb-0" type="submit">Verzameling
                    verwijderen</button>
            </form>
        </li>
        <li class="nav-item">
            <a class="nav-link pt-3 pb-0" href="/items/aanmaken/?collection_id=" <?= $data['collection']->id?>"">Item
                toevoegen</a>
        </li>
        <?php endif ?>
        <hr class="mt-3 mb-0 mx-3">
        <?php endif ?>

        <?php if (isset($_SESSION) && isset($_SESSION['user'])) : ?>
        <li class="nav-item">
            <h5 class="navbar-text pt-4 pb-0 px-3 m-0">Verzamelingen</h5>
        </li>
        <?php
        $collectionsCount = count($data['collections']);
        for ($i=0; $i < $collectionsCount && $i < 5; $i++) { ?>

        <li class="nav-item">
            <a class="nav-link pt-3 pb-0"
                href="verzameling/?id=<?= $data['collections'][$i]->id ?>"><?= $data['collections'][$i]->name ?></a>
        </li>

        <?php
        } ?>

        <?php if ($collectionsCount >= 5) : ?>

        <li class="nav-item dropright">
            <a class="nav-link dropdown-toggle pt-3 pb-0" data-toggle="dropdown">Meer verzamelingen</a>
            <div class="dropdown-menu more-items">
                <?php for ($i=5; $i < $collectionsCount; $i++) : ?>
                <a class="dropdown-item"
                    href="verzameling/?id=<?= $data['collections'][$i]->id ?>"><?= $data['collections'][$i]->name ?></a>
                <?php endfor ?>

            </div>
        </li>
        <?php endif ?>
        <!-- <hr class="mt-3 mb-0 mx-3"> -->
        <?php endif ?>


        <!-- <li class="nav-item">
            <h5 class="navbar-text pt-4 pb-0 px-3 m-0">Items</h5>
        </li> -->

    </ul>
</div>