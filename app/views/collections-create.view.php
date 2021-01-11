<?php require 'partials/head.php'; ?>
<?php require 'partials/header.php' ?>

<main>
    <div class="container-fluid">

        <h1 class="mx-auto form-title my-4">Maak een verzameling aan</h1>
        <div class="row">

            <div class="col-sm-8 col-md-6 col-xl-4 mx-auto">

                <form class="needs-validation collection-form" action="/verzamelingen/aanmaken" method="POST"
                    novalidate>
                    <div class="mb-3">
                        <label for="collection-form-name" class="form-label">Geef je verzameling een naam</label>
                        <input type="text" class="form-control" id="collection-form-name" name="name" required>
                        <div class="invalid-feedback">
                            Geef een naam op
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="collection-form-color" class="form-label">Kleur</label>
                        <input type="color" class="form-control w-25" id="collection-form-color" name="color"
                            value="#607b94">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="collection-form-category">Kies een categorie voor je
                            verzameling</label>
                        <select class="form-select" name="category" id="collection-form-category" required>
                            <option selected value="">Maak een keuze</option>
                            <option value="music">Muziek</option>
                            <option value="books">Boeken</option>
                            <option value="other">Anders</option>
                        </select>
                        <div class="invalid-feedback">
                            Kies een categorie
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="collection-form-description" class="form-label">Geef een korte omschrijving van je
                            verzameling</label>
                        <textarea class="form-control" id="collection-form-description" rows="5" name="description"
                            maxlength="150"></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="collection-form-pulic" name="public"
                            value="true">
                        <label class="form-check-label" for="collection-form-pulic">Verzameling
                            openbaar maken</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Aanmaken</button>
                </form>
            </div>
        </div>

    </div>

</main>

<?php require 'partials/footer.php';
