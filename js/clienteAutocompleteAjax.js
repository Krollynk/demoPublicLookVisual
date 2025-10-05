document.getElementById("clienteNombre").addEventListener("keyup", function() {
    let query = this.value;

    console.log("Input value:", query); // Depuración: muestra el valor del input
    if (query.length < 2) {
        document.getElementById("autocomplete-list").innerHTML = "";
        return;
    }

    fetch("/functions/autocompleteClientes.php?q=" + encodeURIComponent(query))
        .then(response => response.json())
        .then(data => {
            let container = document.getElementById("autocomplete-list");
            container.innerHTML = "";

            data.forEach(item => {
                let div = document.createElement("div");
                div.textContent = item.nombre;
                div.classList.add("autocomplete-item");

                div.addEventListener("click", function() {
                    document.getElementById("clienteNombre").value = item.nombre;
                    document.getElementById("ClienteId").value = item.id;
                    container.innerHTML = "";
                });

                container.appendChild(div);
            });
        });
});