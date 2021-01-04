function addCustomColumn() {
	const columnsNumber = document.querySelectorAll(".column-input").length + 1;

	const labelColumn = document.querySelector(".label-column");
	const inputColumn = document.querySelector(".input-field-column");

	const newLabel = document.createElement("div");
	newLabel.innerHTML = `<label class="form-label" for="column${columnsNumber}">Column${columnsNumber}</label>`;
	labelColumn.appendChild(newLabel);

	const newInputField = document.createElement("div");
	newInputField.innerHTML = `<input class="column-input form-input" type="text" name="column${columnsNumber}" id="column${columnsNumber}">`;
	inputColumn.appendChild(newInputField);
}

(function() {
	"use strict";
	window.addEventListener(
		"load",
		function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			const forms = document.getElementsByClassName("needs-validation");
			// Loop over them and prevent submission
			const validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener(
					"submit",
					function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add("was-validated");
					},
					false
				);
			});
		},
		false
	);
})();
