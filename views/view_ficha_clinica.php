<div class="grid_box main_content">
    <h2 class="main_title_form">Listado De Fichas Clínicas</h2>
    <table id="main_table">
        <thead>
            <tr>
                <th width="15%">Código</th>
                <th width="50%">Paciente</th>
                <th width="20%">Fecha</th>
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
            <a href="/view_ficha_clinica_det_editar" id='editar'>Editar</a>
            <a href="/view_ficha_clinica_det_editar?action=ver" id='ver'>Ver</a>
            <a href="/view_ficha_clinica" id="eliminar" onclick="eliminar()">Eliminar</a>
        </div>
    </div>
    <br>
    <div class="div_main_side">
        <a href="/view_ficha_clinica_nuevo"><button class="div_main_side_btn">Nueva Ficha</button></a>
    </div>
</div>
<script>
    const registros = <?php echo json_encode($data); ?>;
    const vista = 'Ficha';
</script>
<script src="/js/jsDisplayTables.js"></script>