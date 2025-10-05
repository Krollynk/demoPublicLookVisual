console.log(vista);
let sinRegistros = false;
if(registros === null){
    sinRegistros = true;
}
let idSeleccionado = null;
let paginaActual = 1;
const registrosPorPagina = 20;
const tabla = document.getElementById('main_table').getElementsByTagName('tbody')[0];
const btnAnterior = document.getElementById('btnAnterior');
const btnSiguiente = document.getElementById('btnSiguiente');


document.getElementById('eliminar').addEventListener('click', function(event) {
        event.preventDefault(); // Evita la redirección
    });
//se define la estructura de la tabla de cada vista
function vistaClientes(registrosPagina){
    registrosPagina.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.clienteId;
        const celdaCodigo = fila.insertCell();
        const celdaNombre = fila.insertCell();
        const celdaTelefono = fila.insertCell();

        celdaCodigo.textContent = registro.clienteCodigo;
        celdaNombre.textContent = registro.clienteNombre;
        celdaTelefono.textContent = registro.clienteTelefono;
    });
}

function vistaLaboratorios(registrosPagina){
    registrosPagina.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.laboratorioId;
        const celdaCodigo = fila.insertCell();
        const celdaNombre = fila.insertCell();
        const celdaTelefono = fila.insertCell();
        const celdaCorreo = fila.insertCell();

        celdaCodigo.textContent = registro.laboratorioCodigo;
        celdaNombre.textContent = registro.laboratorioNombre;
        celdaTelefono.textContent = registro.laboratorioTelefono;
        celdaCorreo.textContent = registro.laboratorioCorreo;
    });
}

function vistaFichas(registrosPagina){
    registrosPagina.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.fichaClinicaId;
        const celdaCodigo = fila.insertCell();
        const celdaNombre = fila.insertCell();
        const celdaFecha = fila.insertCell();
        const celdaEstatus = fila.insertCell();

        celdaCodigo.textContent = registro.fichaClinicaCodigo;
        celdaNombre.textContent = registro.clienteNombre;
        celdaFecha.textContent = registro.fichaClinicaFecha;
        celdaEstatus.textContent = registro.fichaClinicaStatus;
    });
}

function vistaVentas(registrosPagina){
    registrosPagina.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.ventaId;
        const celdaCodigo = fila.insertCell();
        const celdaNombre = fila.insertCell();
        const celdaTotal = fila.insertCell();
        const celdaEstatus = fila.insertCell();

        celdaCodigo.textContent = registro.ventaCodigo;
        celdaNombre.textContent = registro.clienteNombre;
        celdaTotal.textContent = 'Q' + registro.ventaTotal;
        celdaEstatus.textContent = registro.ventaEstatus;
    });
}

function vistaOrdenes(registrosPagina){
    registrosPagina.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.ordenId;
        const celdaCodigo = fila.insertCell();
        const celdaFicha = fila.insertCell();
        const celdaCliente = fila.insertCell();
        const celdaLaboratorio = fila.insertCell();
        const celdaEstatus = fila.insertCell();

        celdaCodigo.textContent = registro.ordenCodigo;
        celdaFicha.textContent = registro.fichaClinicaCodigo;
        celdaCliente.textContent = registro.clienteNombre;
        celdaLaboratorio.textContent = registro.laboratorioNombre;
        celdaEstatus.textContent = registro.ordenEstatus;
    });
}

//función para mostrar las tablas
function mostrarTabla(pagina) {
    tabla.innerHTML = ''; // Limpiar la tabla
    const inicio = (pagina - 1) * registrosPorPagina;
    const fin = inicio + registrosPorPagina;
    const registrosPagina = registros.slice(inicio, fin);

    if(window.location.pathname === '/view_clientes'){
        vistaClientes(registrosPagina);
    }else if(window.location.pathname === '/view_laboratorios'){
        vistaLaboratorios(registrosPagina);
    }else if(window.location.pathname === '/view_ficha_clinica'){
        vistaFichas(registrosPagina);
    }else if(window.location.pathname === '/view_ventas'){
        vistaVentas(registrosPagina);
    }else if(window.location.pathname === '/view_ordenes'){
        vistaOrdenes(registrosPagina);
    }
}

//funciones y eventos para el la paginación
function actualizarBotones() {
    btnAnterior.disabled = paginaActual === 1;
    btnSiguiente.disabled = paginaActual * registrosPorPagina >= registros.length;
}

btnAnterior.addEventListener('click', () => {
    if (paginaActual > 1) {
        paginaActual--;
        mostrarTabla(paginaActual);
        actualizarBotones();
    }
});

btnSiguiente.addEventListener('click', () => {
    if (paginaActual * registrosPorPagina < registros.length) {
        paginaActual++;
        mostrarTabla(paginaActual);
        actualizarBotones();
    }
});

// Inicializar funciones
if(!sinRegistros){
    mostrarTabla(paginaActual);
    actualizarBotones();
}

//detectar ID al hacer clic en la fila
document.querySelectorAll('#main_table tbody tr').forEach(row => {
    row.addEventListener('click', () => {
        //console.log("se hizo clic");
        // Remover selección previa
        document.querySelectorAll('#main_table tbody tr').forEach(r => r.classList.remove('seleccionado'));

        // Marcar esta fila como seleccionada (opcional, para visual feedback)
        row.classList.add('seleccionado');

        // Guardar ID del producto
        idSeleccionado = row.id;

        //console.log("Producto seleccionado ID:", idSeleccionado);
        asignarIdMenu(idSeleccionado);
    });
});

function asignarIdMenu(id){
    document.querySelectorAll('#dropdown-content a').forEach(s => {
        let url = s.getAttribute('href');

        let urlNew = new URL(url, window.location.origin);
        urlNew.searchParams.set('id', id);
        s.setAttribute('href', urlNew.toString());
    });
}

function eliminar(callback = function(res) { 
            console.log(res);
            if(res.success) location.reload(); 
            else alert('Error al eliminar'); 
        }) 
{
    if(idSeleccionado !== null){
        fetch('/controllers/Eliminar.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `tabla=${encodeURIComponent(window.location.pathname)}&id=${encodeURIComponent(idSeleccionado)}`
        })
        .then(response => response.json())
        .then(data => {
            if (callback) callback(data);
        });
    }else {
        alert("No hay cliente seleccionado");
    }
}

if( window.location.pathname === '/view_clientes' ||
    window.location.pathname === '/view_laboratorios' ||
    window.location.pathname === '/view_ficha_clinica' ||
    window.location.pathname === '/view_ventas'
){
    if(document.getElementById('editar') !== null){
        document.getElementById('editar').addEventListener('click', function(event) {
            if (idSeleccionado === null) {
                event.preventDefault();
                alert("Debe seleccionar un registro para editar.");
                return;
            }
        });
    }
}
if( window.location.pathname === '/view_clientes' ||
    window.location.pathname === '/view_laboratorios' ||
    window.location.pathname === '/view_ficha_clinica' ||
    window.location.pathname === '/view_ventas'
){
    if(document.getElementById('ver') !== null){
        document.getElementById('ver').addEventListener('click', function(event) {
            if (idSeleccionado === null) {
                event.preventDefault();
                alert("Debe seleccionar un registro para ver.");
                return;
            }
        });
    }
}