document.getElementById("laboratorioNombre").addEventListener("keyup", function() {
    closeAllLists();
    let query = this.value;

    if (query.length < 2) {
        document.getElementById("autocomplete-list-laboratorio").innerHTML = "";
        return;
    }

    fetch("/functions/autocompleteLaboratorios.php?laboratorioNombre=" + encodeURIComponent(query))
        .then(response => response.json())
        .then(data => {
            let allContainers = document.querySelectorAll('.autocomplete-items-active');
            allContainers.forEach(c => c.setAttribute('class', 'autocomplete-items'));

            let container = document.getElementById("autocomplete-list-laboratorio");
            container.setAttribute('class', 'autocomplete-items-active');
            container.innerHTML = "";

            data.forEach(item => {
                let div = document.createElement("div");
                div.textContent = item.laboratorioNombre;
                div.classList.add("autocomplete-item");

                div.addEventListener("click", function() {
                    document.getElementById("laboratorioNombre").value = item.laboratorioNombre;
                    document.getElementById("laboratorioId").value = item.laboratorioId;
                    container.innerHTML = "";
                });

                container.appendChild(div);
            });
        });
});

function closeAllLists() {
    document.querySelectorAll('.autocomplete-items').forEach(list => list.innerHTML = '');
}

document.getElementById("laboratorioNombre").addEventListener("blur", function() {
    setTimeout(closeAllLists, 100);
});