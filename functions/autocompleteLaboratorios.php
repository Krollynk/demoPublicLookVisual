<?php
include '../core/db_connection.php';
include '../core/DatabaseExecutor.php';
include '../core/ModelMapper.php';
include '../core/QueryBuilder.php';
// Autocomplete para clientes
if (isset($_GET['laboratorioNombre'])) {
    $validation = $_GET['laboratorioNombre'];
    $laboratorios = array();

    $tabla = ModelMapper::getTableName('labLaboratorios');
    $campo_id = ModelMapper::getField('labLaboratorios', 'laboratorioId');
    $campo_nombre = ModelMapper::getField('labLaboratorios', 'laboratorioNombre');
    $campo_eliminado = ModelMapper::getField('labLaboratorios', 'eliminado');

    $mysql = 'SELECT '.$campo_id.' as laboratorioId,'.$campo_nombre.' as laboratorioNombre FROM '.$tabla.' WHERE '.$campo_eliminado.' = 0 AND '.$campo_nombre.' LIKE "%'.$validation.'%"';
    $executor = new DatabaseExecutor();
    $resultado = $executor->execute_direct($mysql, 'select');
    if(count($resultado) > 0){
        foreach($resultado as $result){
            $laboratorios[] = [
                'laboratorioId' => $result['laboratorioId'],
                'laboratorioNombre' => $result['laboratorioNombre']
            ];
        }
    }
    
    $result = array_filter($laboratorios, function($laboratorio) use ($validation) {
        return stripos($laboratorio['laboratorioNombre'], $validation) !== false;
    });

    echo json_encode(array_values($result));
}