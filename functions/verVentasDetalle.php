<?php
include '../core/db_connection.php';
include '../core/DatabaseExecutor.php';
include '../core/ModelMapper.php';
include '../core/QueryBuilder.php';
include '../controllers/VentasController.php';

$resultado = new VentasController();
$resultado = $resultado->GetVentasDetPorId($_GET['id']);

if(count($resultado) > 0){
    foreach($resultado as $result){
        $productos[] = [
            'id' => $result['ventaDetId'],
            'producto' => $result['ventaDetProducto'],
            'cantidad' => $result['ventaDetCantidad'],
            'precio' => $result['ventaDetPrecio'],
            'total' => $result['ventaDetTotal'],
        ];
    }

    echo json_encode(array_values($productos));
}