<div class="grid_box main_content">
    <h2 class="main_title_form">Editar Laboratorio</h2>
    <form action="/guardar_laboratorio" class="main_form" id="main_form" method="post">
        <input type="hidden" class="modulo" name="modulo" value="laboratorioUpdate">
        <input type="hidden" class="laboratorioId" name="laboratorioId">

        <div class="main_div">
            <p>Nombre</p>
            <input size="60" type="text" class="laboratorioNombre input_text" name="laboratorioNombre">
        </div>
        <div class="main_div">
            <p>Direccion</p>
            <input size="60" type="text" class="laboratorioDireccion input_text" name="laboratorioDireccion">
        </div>
        <div class="main_div">
            <p>Teléfono</p>
            <input size="30" type="text" class="laboratorioTelefono input_text" name="laboratorioTelefono">
        </div>
        <div class="main_div">
            <p>Correo</p>
            <input size="30" type="text" class="laboratorioCorreo input_text" name="laboratorioCorreo">
        </div>
    </form>
</div>
<div class="grid_box main_side">
    <div class="div_main_side">
        <button type="submit" form="main_form" class="div_main_side_btn">Guardar Cambios</button>
    </div>
    <br>
    <div class="div_main_side">
        <a href="/view_laboratorios"><button class="div_main_side_btn">No guardar</button></a>
    </div>
</div>