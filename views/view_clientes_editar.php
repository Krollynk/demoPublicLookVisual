<div class="grid_box main_content">
    <h2 class="main_title_form">Editar Cliente</h2>
    <form action="/actualizar_cliente" class="main_form" id="main_form" method="post">
        <input type="hidden" class="modulo" name="modulo" value="clienteUpdate">
        <input type="hidden" class="clienteId" name="clienteId" value="<?php echo ($resultado[0]['clienteId']) ?>">

        <div class="main_div">
            <p>Nombre</p>
            <input size="60" type="text" class="clienteNombre input_text" name="clienteNombre"
                value="<?php echo ($resultado[0]['clienteNombre']) ?>">
        </div>
        <div class="main_div">
            <p>Direccion</p>
            <input size="60" type="text" class="clienteDireccion input_text" name="clienteDireccion"
                value="<?php echo ($resultado[0]['clienteDireccion']) ?>">
        </div>
        <div class="main_div">
            <p>Teléfono</p>
            <input size="30" type="text" class="clienteTelefono input_text" name="clienteTelefono"
                value="<?php echo ($resultado[0]['clienteTelefono']) ?>">
        </div>
        <div class="main_div">
            <p>Correo</p>
            <input size="30" type="text" class="clienteCorreo input_text" name="clienteCorreo"
                value="<?php echo ($resultado[0]['clienteCorreo']) ?>">
        </div>
        <div class="main_div">
            <p>Edad</p>
            <input size="30" type="text" class="clienteEdad input_text" name="clienteEdad"
                value="<?php echo ($resultado[0]['clienteEdad']) ?>">
        </div>

    </form>
</div>
<div class="grid_box main_side">
    <div class="div_main_side">
        <button type="submit" form="main_form" class="div_main_side_btn">Guardar Cambios</button>
    </div>
    <br>
    <div class="div_main_side">
        <a href="/view_clientes"><button class="div_main_side_btn">No guardar</button></a>
    </div>
</div>
