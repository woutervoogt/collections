<div class="row">
    <div class="col-3">
        <form action="/verzameling/aanmaken" method="GET">
            <div class="mb-3">
                <label for="verzamelingNaam" class="form-label">Naam</label>
                <input type="text" class="form-control" id="verzamelingNaam" name="verzamelingNaam" required>
            </div>
            <div class="mb-3">
                <label for="verzamelingKleur" class="form-label">Kleur</label>
                <input type="color" class="form-control w-25" id="verzamelingKleur" name="verzamelingKleur"
                    value="#607b94" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="verzamelingTemplate">Kies een template voor je
                    verzameling</label>
                <select class="form-select" name="verzamelingTemplate" id="verzamelingTemplate" required>
                    <option selected value="">Maak een keuze</option>
                    <option value="muziek">Muziek</option>
                    <option value="anders">Anders</option>
                </select>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="verzamelingOpenbaar" name="verzamelingOpenbaar"
                    value="true">
                <label class="form-check-label" for="verzamelingOpenbaar">Verzameling
                    openbaar maken</label>
            </div>
            <button type=" submit" class="btn btn-primary">Volgende</button>
        </form>
    </div>
</div>