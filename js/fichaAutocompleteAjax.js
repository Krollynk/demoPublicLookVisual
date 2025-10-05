function autocompleteFichas(idContainer, paramName, query) {
    if (query.length < 2) {
        document.getElementById(idContainer).innerHTML = "";
        return;
    }
    
    fetch("/functions/autocompleteFicha.php?"+paramName+"=" + encodeURIComponent(query))
        .then(response => response.json())
        .then(data => {
            let allContainers = document.querySelectorAll('.autocomplete-items-active');
            allContainers.forEach(c => c.setAttribute('class', 'autocomplete-items'));

            let container = document.getElementById(idContainer);
            container.setAttribute('class', 'autocomplete-items-active');
            container.innerHTML = "";

            data.forEach(item => {
                let div = document.createElement("div");
                div.textContent = item.fichaClinicaCodigo + " - " + item.clienteNombre;
                div.classList.add("autocomplete-item");

                div.addEventListener("click", function() {
                    document.getElementById("fichaClinicaCodigo").value = item.fichaClinicaCodigo;
                    document.getElementById("clienteNombre").value = item.clienteNombre;
                    document.getElementById("fichaClinicaId").value = item.fichaClinicaId;
                    container.innerHTML = "";
                });

                container.appendChild(div);
            });
        });
}

function closeAllLists() {
    document.querySelectorAll('.autocomplete-items').forEach(list => list.innerHTML = '');
}

document.getElementById("clienteNombre").addEventListener("keyup", function() {
    closeAllLists();
    autocompleteFichas("autocomplete-list-cliente", "clienteNombre", this.value);
});

document.getElementById("fichaClinicaCodigo").addEventListener("keyup", function() {
    closeAllLists();
    autocompleteFichas("autocomplete-list-ficha", "fichaClinicaCodigo", this.value);
});

document.getElementById("clienteNombre").addEventListener("blur", function() {
    setTimeout(closeAllLists, 100);
});

document.getElementById("fichaClinicaCodigo").addEventListener("blur", function() {
    setTimeout(closeAllLists, 100);
});

/* document.getElementById("clienteNombre").addEventListener("onclick", function() {
    closeAllLists();
});

document.getElementById("fichaClinicaCodigo").addEventListener("onclick", function() {
    closeAllLists();
}); */