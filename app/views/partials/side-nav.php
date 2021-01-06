<div class="col-md-1 py-5 px-2 ml-0 h-100 left-nav ">

    <ul class="nav flex-column">

        <li class="nav-item">
            <h5 class="navbar-text pt-3 pb-0 px-3 m-0">Verzameling opties</h5>
        </li>
        <li class="nav-item">
            <a class="nav-link pt-3 pb-0" href="/verzameling/toevoegen">Verzameling
                toevoegen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pt-3 pb-0" href="/verzameling/aanpassen">Verzameling
                aanpassen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pt-3 pb-0" href="/verzameling/verwijderen">Verzameling
                verwijderen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pt-3 pb-0" href="/verzameling/toevoegen">Item toevoegen</a>
        </li>
        <hr class="mt-3 mb-0 mx-3">

        <li class="nav-item">
            <h5 class="navbar-text pt-4 pb-0 px-3 m-0">Verzamelingen</h5>
        </li>

        <?php if (isset($_SESSION) && isset($_SESSION['user'])) : ?>

        <?php
        $collectionsCount = count($data['collections']);
        for ($i=0; $i < $collectionsCount && $i < 5; $i++) { ?>

        <li class="nav-item">
            <a class="nav-link pt-3 pb-0" href="#"><?= $data['collections'][$i]->name ?></a>
        </li>

        <?php
        } ?>

        <?php if ($collectionsCount >= 5) : ?>

        <li class="nav-item dropright">
            <a class="nav-link dropdown-toggle pt-3 pb-0" data-toggle="dropdown">Meer verzamelingen</a>
            <div class="dropdown-menu more-items">
                <?php for ($i=5; $i < $collectionsCount; $i++) : ?>
                <a class="dropdown-item" href="#"><?= $data['collections'][$i]->name ?></a>
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