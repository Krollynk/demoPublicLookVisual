<div class="grid_box main_content">
    <h2 class="main_title_form">Nueva Ficha Clínica</h2>
    <form action="/guardar_ficha" class="main_form" id="main_form" method="post">
        <input type="hidden" class="modulo" name="modulo" value="fichaUpdate">
        <input type="hidden" class="fichaId" name="fichaId">

        <div class="main_div autocomplete-container">
            <p>Paciente</p>
            <div class="autocomplete-wrapper">
                <input size="60" type="text" class="clienteNombre input_text" id="clienteNombre" name="clienteNombre" autocomplete="off">
                <div id="autocomplete-list" class="autocomplete-items"></div>
            </div>
        </div>
        <input type="hidden" class="ClienteId" id="ClienteId" name="ClienteId" value="">
        <div class="main_div">
            <p>Fecha</p>
            <input size="60" type="date" class="fichaClinicaFecha input_text" name="fichaClinicaFecha">
        </div>
    </form>
</div>
<div class="grid_box main_side">
    <div class="div_main_side">
        <button type="submit" form="main_form" class="div_main_side_btn">Guardar Cambios</button>
    </div>
    <br>
    <div class="div_main_side">
        <a href="/view_ficha_clinica"><button class="div_main_side_btn">No guardar</button></a>
    </div>
</div>
<script src="/js/clienteAutocompleteAjax.js"></script>