let archivoVista = 'undefine';
let id = 0;
let action = '';
const tabla = document.getElementById('main_table').getElementsByTagName('tbody')[0];

if(window.location.pathname === '/view_ventas_det_editar'){
    const queryString = window.location.search;
    const params = new URLSearchParams(queryString);
    id = params.get('id');
    if(params.has('action')){
        action = params.get('action');
    }
    
    archivoVista = 'verVentasDetalle';
}else{
    id = idSeleccionado;
}

function vistaDetalleProductos(data){
    data.forEach(registro => {
        const fila = tabla.insertRow();
        fila.id = registro.id;
        const celdaProducto = fila.insertCell();
        const celdaCantidad = fila.insertCell();
        const celdaPrecio = fila.insertCell();
        const celdaTotal = fila.insertCell();
        const celdaAcciones = fila.insertCell();
        const btnEliminar = document.createElement('button');

        celdaProducto.textContent = registro.producto;
        celdaCantidad.textContent = registro.cantidad;
        celdaPrecio.textContent = 'Q' + registro.precio;
        celdaTotal.textContent = 'Q' + registro.total;

        if(action !== 'ver'){
            btnEliminar.textContent = 'Eliminar';
            btnEliminar.classList.add('btn_eliminar');
            btnEliminar.onclick = () => eliminar(registro.id, window.location.pathname);
            celdaAcciones.appendChild(btnEliminar);
        }
    });
}

function eliminar(
    id_eliminar,
    tabla_eliminar,
    callback = function(res) {
        if(res.success) location.reload(); 
        else alert('Error al eliminar'); 
    }) 
{
    fetch('/controllers/Eliminar.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `tabla=${encodeURIComponent(tabla_eliminar)}&id=${encodeURIComponent(id_eliminar)}`
        })
        .then(response => response.json())
        .then(data => {
            if (callback) callback(data);
        });
}

function cargarVistaDetalles(id, archivoVista) {
    fetch(`/functions/${archivoVista}.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            if(window.location.pathname === '/view_ventas_det_editar'){
                vistaDetalleProductos(data);
            }
        });
}

if(archivoVista !== 'undefine'){
    cargarVistaDetalles(id, archivoVista);
}