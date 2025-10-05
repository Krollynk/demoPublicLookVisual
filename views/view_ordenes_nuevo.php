<div class="grid_box main_content">
    <h2 class="main_title_form">Nueva Orden</h2>
    <form action="/guardar_orden" class="main_form" id="main_form" method="post">
        <input type="hidden" class="ordenId" name="ordenId">

        <div class="main_div autocomplete-container">
            <p>Ficha Clinica</p>
            <div class="autocomplete-wrapper">
                <input size="60" type="text" class="fichaClinicaCodigo input_text" id="fichaClinicaCodigo" name="fichaClinicaCodigo" autocomplete="off" required>
                <div id="autocomplete-list-ficha" class="autocomplete-items ficha-items"></div>
            </div>
        </div>
        <div class="main_div autocomplete-container">
            <p>Paciente</p>
            <div class="autocomplete-wrapper">
                <input size="60" type="text" class="clienteNombre input_text" id="clienteNombre" name="clienteNombre" autocomplete="off" required>
                <div id="autocomplete-list-cliente" class="autocomplete-items cliente-items"></div>
            </div>
        </div>
        <div class="main_div autocomplete-container">
            <p>Laboratorio</p>
            <div class="autocomplete-wrapper">
                <input size="60" type="text" class="laboratorioNombre input_text" id="laboratorioNombre" name="laboratorioNombre" autocomplete="off" required>
                <div id="autocomplete-list-laboratorio" class="autocomplete-items cliente-items"></div>
            </div>
        </div>
        <div class="main_div">
            <p>Fecha</p>
            <input size="60" type="date" class="ordenFecha input_text" name="ordenFecha" required>
        </div>

        
        <input type="hidden" class="fichaClinicaId" id="fichaClinicaId" name="fichaClinicaId" value="">
        <input type="hidden" class="laboratorioId" id="laboratorioId" name="laboratorioId" value="">
    </form>
</div>
<div class="grid_box main_side">
    <div class="div_main_side">
        <button type="submit" form="main_form" class="div_main_side_btn">Guardar Cambios</button>
    </div>
    <br>
    <div class="div_main_side">
        <a href="/view_ordenes"><button class="div_main_side_btn">No guardar</button></a>
    </div>
</div>
<script src="/js/fichaAutocompleteAjax.js"></script>
<script src="/js/laboratorioAutocompleteAjax.js"></script>