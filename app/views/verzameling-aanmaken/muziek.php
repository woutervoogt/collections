<form action="/verzameling/aanmaken" method="POST">
    <div class="row">
        <div class="col-3 label-column">
            <h4>
                Default naam
            </h4>
            <div>
                <label class="form-label" for="column1">Column1</label>
            </div>
            <div>
                <label class="form-label" for="column2">Column2</label>
            </div>

        </div>


        <div class="col input-field-column">
            <h4>
                Eigen naam
            </h4>
            <input type="hidden" name="verzamelingNaam"
                value="<?= $verzamelingNaam; ?>">
            <input type="hidden" name="verzamelingKleur"
                value="<?= $verzamelingKleur; ?>">
            <input type="hidden" name="verzamelingOpenbaar"
                value="<?= $verzamelingOpenbaar; ?>">
            <div>
                <input class="column-input form-input" type="text" name="column1" id="column1">
            </div>
            <div><input class="column-input form-input" type="text" name="column2" id="column2"></div>

        </div>
    </div>
    <button class="btn btn-primary" type="button" onclick="addCustomColumn()">
        Veld toevoegen
    </button>
    <button class="btn btn-primary" type="submit">
        Verzameling aanmaken
    </button>
    </div>
</form>