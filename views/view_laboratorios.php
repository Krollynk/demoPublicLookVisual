<div class="grid_box main_content">
    <h2 class="main_title_form">Listado De Laboratorios</h2>
    <table id="main_table">
        <thead>
            <tr>
                <th width="15%">Código</th>
                <th width="30%">Laboratorio</th>
                <th width="15%">Teléfono</th>
                <th width="30%">Correo</th>
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
            <a href="/view_laboratorios_editar" id="editar">Editar</a>
            <a href="/view_laboratorios" id="eliminar" onclick="eliminar()">Eliminar</a>
        </div>
    </div>
    <br>
    <div class="div_main_side">
        <a href="/view_laboratorios_nuevo"><button class="div_main_side_btn">Nuevo Laboratorio</button></a>
    </div>
</div>
<script>
    const registros = <?php echo json_encode($data); ?>;
    const vista = 'laboratorios';
</script>
<script src="/js/jsDisplayTables.js"></script>