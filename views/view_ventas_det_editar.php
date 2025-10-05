<div class="grid_box main_content">
    <h2 class="main_title_form">Venta Detalle</h2>
    <div class="main_datos_generales">
        <div class="datos_generales">
            <div class='main_div main_div_generales'>
                <p>Código</p>
                <input size="15" type="text" class="ventaCodigo" name="ventaCodigo"
                    value="<?php echo $resultado[0]['ventaCodigo']; ?>" disabled>
            </div>
            <div class="main_div main_div_generales">
                <p>Fecha</p>
                <input size="15" type="text" class="ventaFecha" name="ventaFecha"
                    value="<?php echo $resultado[0]['ventaFecha']; ?>" disabled>
            </div>
        </div>
        <div class="main_div">
            <p>Nombre</p>
            <input size="60" type="text" class="clienteNombre" name="clienteNombre"
                value="<?php echo $resultado[0]['clienteNombre']; ?>" disabled>
        </div>
    </div>
    <?php if(isset($_GET['action']) && $_GET['action'] === 'editar') { ?>
    <h3 class="main_title_form">Agregar Productos</h3>
    <form action="/guardar_venta_det" class="main_form" id="main_form" method="post">
        <input type="hidden" class="ventaId" name="ventaId" value="<?php echo ($resultado[0]['ventaId']) ?>">
        <div class="main_div">
            <p>Producto</p>
            <input size="60" type="text" class="ventaDetProducto input_text" name="ventaDetProducto">
        </div>
        <div class="main_div">
            <p>Cantidad</p>
            <input size="15" type="text" class="ventaDetCantidad input_text" name="ventaDetCantidad">
        </div>
        <div class="main_div">
            <p>Precio</p>
            <input size="15" type="text" class="ventaDetPrecio input_text" name="ventaDetPrecio">
        </div>
    </form>
    <?php } ?>
    <h3 class="main_title_form">Listado De Productos Agregados</h3>
    <table id="main_table">
        <thead>
            <tr>
                <th width="40%">Descripcion</th>
                <th width="10%">Cantidad</th>
                <th width="10%">Precio</th>
                <th width="10%">Subtotal</th>
                <th width="10%">Eliminar</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<div class="grid_box main_side">
    <?php if(isset($_GET['action']) && $_GET['action'] === 'editar') { ?>
    <div class="div_main_side">
        <button type="submit" form="main_form" class="div_main_side_btn">Agregar Producto</button>
    </div>
    <?php } ?>
    <br>
    <div class="div_main_side">
        <a href="/view_ventas"><button class="div_main_side_btn">Finalizar</button></a>
    </div>
    <br>
    <h3 class="main_title_form">Resumen</h3>
    <div class="main_div">
        <p>Subtotal:</p>
        <input size="10" type="text" class="ventaTotal" name="ventaTotal"
            value="<?php echo $resultado[0]['ventaTotal']; ?>" disabled
            style="border: none; border-bottom: 1px solid #000; font-weight: bold; font-size: 1.2em; text-align: right;">
    </div>
    <div class="main_div">
        <p>Saldo:</p>
        <input size="10" type="text" class="ventaSaldo" name="ventaSaldo"
            value="<?php echo $resultado[0]['ventaSaldo']; ?>" disabled
            style="border: none; border-bottom: 1px solid #000; font-weight: bold; font-size: 1.2em; text-align: right;">
    </div>
    <div class="main_div">
        <p>Abono:</p>
        <input size="10" type="text" class="ventaAbono" name="ventaAbono"
            value="<?php echo $resultado[0]['ventaAbono']; ?>" disabled
            style="border: none; border-bottom: 1px solid #000; font-weight: bold; font-size: 1.2em; text-align: right;">
    </div>
</div>
<script src="/js/jsVistasDetalles.js"></script>