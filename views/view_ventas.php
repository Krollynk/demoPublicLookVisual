<div class="grid_box main_content">
    <h2 class="main_title_form">Listado De Clientes</h2>
    <table id="main_table">
        <thead>
            <tr>
                <th width="15%">Código</th>
                <th width="55%">Cliente</th>
                <th width="15%">Total</th>
                <th width="15%">Estatus</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <div class="pagination">
        <button id="btnAnterior" disabled>Anterior</button>
        <button id="btnSiguiente" disabled>Siguiente</button>
    </div>
</div>
<div class="grid_box main_side">
    <div class="dropdown">
        <button class="dropbtn">Acciones</button>
        <div id="dropdown-content" class="dropdown-content">
            <a href="/view_ventas_det_editar?action=editar" id='editar'>Editar</a>
            <a href="/view_ventas_det_editar?action=ver" id='ver'>Ver</a>
            <a href="/view_ventas" id="eliminar" onclick="eliminar()">Eliminar</a>
        </div>
    </div>
    <br>
    <div class="div_main_side">
        <a href="/view_ventas_nuevo"><button class="div_main_side_btn">Nueva Venta</button></a>
    </div>
</div>
<script>
    const registros = <?php echo json_encode($data); ?>;
    const vista = 'ventas';
</script>
<script src="/js/jsDisplayTables.js"></script>