<?php
require '../core/db_connection.php';
require '../core/DatabaseExecutor.php';
require '../core/ModelMapper.php';
require '../core/FieldValidator.php';
require '../core/QueryBuilder.php';
require '../controllers/ClientesController.php';
require '../controllers/LaboratoriosController.php';
require '../controllers/FichaController.php';
require '../controllers/VentasController.php';

$tabla = $_POST['tabla'] ?? '';
$id = $_POST['id'] ?? '';
// Validar tabla e id

if($tabla <> ''){
    $tabla = str_replace('/view_','',$tabla);
    $tabla = str_replace('_editar','',$tabla);
    $tabla = str_replace('_',' ',$tabla);
    $tabla = ucwords($tabla);
    $tabla = str_replace(' ','',$tabla);
}

$tablas_eliminar = array(
    'Clientes' => 'Clientes',
    'Laboratorios' => 'Laboratorios',
    'FichaClinica' => 'FichaClinica',
    'Ventas' => 'Ventas',
    'VentasDet' => 'VentasDet',
);

if (!isset($tablas_eliminar[$tabla]) || !is_numeric($id)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Parámetros inválidos']);
    exit;
}

// Definir el campo de eliminación y el campo ID según la tabla
$tiene_detalles = false;
if($tabla === 'Clientes'){
    $process = new ClientesController();
    $resultado = $process->EliminarCliente($id);
}else if($tabla === 'Laboratorios'){
    $process = new LaboratoriosController();
    $resultado = $process->EliminarLaboratorio($id);
}else if($tabla === 'FichaClinica'){
    $process = new FichaController();
    $resultado = $process->EliminarFicha($id);
}else if($tabla === 'Ventas'){
    $process = new VentasController();
    $resultado = $process->EliminarVenta($id);
}else if($tabla === 'VentasDet'){
    $process = new VentasController();
    $resultado = $process->EliminarVentaDet($id);
}

echo json_encode($resultado);