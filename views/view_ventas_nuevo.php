<div class="grid_box main_content">
    <h2 class="main_title_form">Nueva Venta</h2>
    <form action="/guardar_venta" class="main_form" id="main_form" method="post">
        <input type="hidden" class="ventaId" name="ventaId">

        <div class="main_div autocomplete-container">
            <p>Cliente</p>
            <div class="autocomplete-wrapper">
                <input size="60" type="text" class="clienteNombre input_text" id="clienteNombre" name="clienteNombre" autocomplete="off">
                <div id="autocomplete-list" class="autocomplete-items"></div>
            </div>
        </div>
        <input type="hidden" class="ClienteId" id="ClienteId" name="ClienteId" value="">
        <div class="main_div">
            <p>Fecha</p>
            <input size="60" type="date" class="ventaFecha input_text" name="ventaFecha">
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