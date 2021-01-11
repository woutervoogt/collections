<?php require 'partials/head.php'; ?>
<?php require 'partials/header.php' ?>

<main>
    <div class="container-fluid">

        <h1 class="mx-auto form-title my-4">Pas je verzameling aan</h1>
        <div class="row">

            <div class="col-sm-8 col-md-6 col-xl-4 mx-auto">

                <form class="needs-validation collection-form" action="/verzamelingen/aanpassen" method="POST"
                    novalidate>
                    <input name="id" type="hidden"
                        value="<?= $data['collection']->id ?>">
                    <div class="mb-3">
                        <label for="collection-form-name" class="form-label">Pas de naam aan</label>
                        <input type="text" class="form-control" id="collection-form-name" name="name"
                            value="<?= $data['collection']->name ?>"
                            required>
                        <div class="invalid-feedback">
                            Geef een naam op
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="collection-form-color" class="form-label">Pas de kleur aan</label>
                        <input type="color" class="form-control w-25" id="collection-form-color" name="color"
                            value="<?= $data['collection']->color ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="collection-form-category">Gekozen categorie (kan niet gewijzigd
                            worden)</label>
                        <select class="form-select" name="category" id="collection-form-category" disabled required>
                            <option value="">Maak een keuze</option>
                            <option selected value="music">Muziek</option>
                            <option value="books">Boeken</option>
                            <option value="other">Anders</option>
                        </select>
                        <div class="invalid-feedback">
                            Kies een categorie
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="collection-form-description" class="form-label">Pas de omschrijving aan</label>
                        <textarea class="form-control" id="collection-form-description" rows="5" name="description"
                            maxlength="150"><?= $data['collection']->description ?></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="collection-form-pulic" name="public"
                            value="true" <?= $data['collection']->is_public ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="collection-form-pulic">Verzameling
                            openbaar maken</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Aanpassen</button>
                </form>
            </div>
        </div>

    </div>

</main>

<?php require 'partials/footer.php';
