<div class="grid_box main_content">
    <h2 class="main_title_form">Listado De Clientes</h2>
    <table id="main_table">
        <thead>
            <tr>
                <th width="20%">Código</th>
                <th width="60%">Cliente</th>
                <th width="20%">Teléfono</th>
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
            <a href="/view_clientes_editar" id='editar'>Editar</a>
            <a href="/view_ficha_clinica">Generar Ficha Clinica</a>
            <a href="/eliminar_cliente" id="eliminar" onclick="eliminar()">Eliminar</a>
        </div>
    </div>
    <br>
    <div class="div_main_side">
        <a href="/view_clientes_nuevo"><button class="div_main_side_btn">Nuevo Cliente</button></a>
    </div>
</div>
<script>
    const registros = <?php echo json_encode($data); ?>;
    const vista = 'clientes';
</script>
<script src="/js/jsDisplayTables.js"></script>