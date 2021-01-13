<?php require 'partials/head.php'; ?>
<?php require 'partials/header.php' ?>

<main>
    <div class="container-fluid">

        <h1 class="mx-auto form-title my-4">Voeg een item toe aan je verzameling</h1>
        <div class="row">

            <div class="col-sm-8 col-md-6 col-xl-4 mx-auto">

                <form class="needs-validation collection-form" action="/items/aanmaken" method="POST" novalidate>
                    <input type="hidden" name="collectionId"
                        value="<?= $data['collection_id'] ?>">
                    <div class="mb-3">
                        <label for="collection-form-name" class="form-label">Naam</label>
                        <input type="text" class="form-control" id="collection-form-name" name="name" required>
                        <div class="invalid-feedback">
                            Geef een naam op
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="collection-form-artist" class="form-label">Artiest</label>
                        <input type="text" class="form-control" id="collection-form-artist" name="artist">
                    </div>

                    <div class="mb-3">
                        <label for="collection-form-album" class="form-label">Album</label>
                        <input type="text" class="form-control" id="collection-form-album" name="album">
                    </div>

                    <div class="mb-3">
                        <label for="collection-form-song" class="form-label">Nummer</label>
                        <input type="text" class="form-control" id="collection-form-song" name="song">
                    </div>

                    <div class="mb-3">
                        <label for="collection-form-genre" class="form-label">Genre</label>
                        <input type="text" class="form-control" id="collection-form-genre" name="genre">
                    </div>

                    <div class="mb-3">
                        <label for="collection-form-year" class="form-label">Jaar</label>
                        <input type="number" class="form-control" id="collection-form-year" name="year" min="0"
                            max="2021">

                    </div>

                    <div class="mb-3">
                        <label for="collection-form-idcode" class="form-label">Identificatie nummer</label>
                        <input type="text" class="form-control" id="collection-form-idcode" name="id_code">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="collection-form-format">Drager</label>
                        <select class="form-select" name="format" id="collection-form-format">
                            <option selected value="">Maak een keuze</option>
                            <option value="music">Vinyl</option>
                            <option value="books">CD</option>
                            <option value="other">Digitaal</option>
                            <option value="other">Casette</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="collection-form-amount" class="form-label">Aantal</label>
                        <input type="number" class="form-control" id="collection-form-amount" name="amount" min="1"
                            value="1">
                    </div>

                    <div class="mb-3">
                        <label for="collection-form-description" class="form-label">Omschrijving</label>
                        <textarea class="form-control" id="collection-form-description" rows="5" name="description"
                            maxlength="150"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="collection-form-notes" class="form-label">Notities</label>
                        <textarea class="form-control" id="collection-form-notes" rows="5" name="notes"
                            maxlength="255"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Toevoegen</button>
                </form>
            </div>
        </div>

    </div>

</main>

<?php require 'partials/footer.php';
