<?php
include '../core/db_connection.php';
include '../core/DatabaseExecutor.php';
include '../core/ModelMapper.php';
include '../core/QueryBuilder.php';
// Autocomplete para clientes
if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $clientes = array();

    $tabla = ModelMapper::getTableName('cliClientes');
    $campo_id = ModelMapper::getField('cliClientes', 'clienteId');
    $campo_nombre = ModelMapper::getField('cliClientes', 'clienteNombre');
    $campo_eliminado = ModelMapper::getField('cliClientes', 'eliminado');
    $mysql = 'SELECT '.$campo_id.' as clienteId,'.$campo_nombre.' as clienteNombre FROM '.$tabla.' WHERE '.$campo_eliminado.' = 0 AND '.$campo_nombre.' LIKE "%'.$query.'%"';
    $executor = new DatabaseExecutor();
    $resultado = $executor->execute_direct($mysql, 'select');
    if(count($resultado) > 0){
        foreach($resultado as $result){
            $clientes[] = [
                'id' => $result['clienteId'],
                'nombre' => $result['clienteNombre']
            ];
        }
    }

    $result = array_filter($clientes, function($cliente) use ($query) {
        return stripos($cliente['nombre'], $query) !== false;
    });

    echo json_encode(array_values($result));
}