<?php
include '../core/db_connection.php';
include '../core/DatabaseExecutor.php';
include '../core/ModelMapper.php';
include '../core/QueryBuilder.php';
// Autocomplete para clientes
$execute_query = false;
if(isset($_GET['fichaClinicaCodigo']) || isset($_GET['clienteNombre'])) {
    $query = $_GET['fichaClinicaCodigo'] ?? $_GET['clienteNombre'];
    $execute_query = true;
    $fichas = array();

    $tabla = ModelMapper::getTableName('ficFichaClinica');
    $tabla_cliente_join = ModelMapper::getTableName('cliClientes');
    $ficha_id = ModelMapper::getField('ficFichaClinica', 'fichaClinicaId');
    $ficha_codigo = ModelMapper::getField('ficFichaClinica', 'fichaClinicaCodigo');
    $ficha_cliente_id = ModelMapper::getField('ficFichaClinica', 'fichaClinicaClienteId');
    $cliente_id = ModelMapper::getField('cliClientes', 'clienteId');
    $cliente_nombre = ModelMapper::getField('cliClientes', 'clienteNombre');
    $eliminado = ModelMapper::getField('ficFichaClinica', 'eliminado');

    $mysql = 'SELECT '.$ficha_id.' as fichaClinicaId, '.$ficha_codigo.' as fichaClinicaCodigo, '.$cliente_nombre.' as clienteNombre FROM '.$tabla. ' t';
    $mysql .= ' INNER JOIN '.$tabla_cliente_join.' cli ON t.'.$ficha_cliente_id.' = cli.'.$cliente_id;

    if (!empty($_GET['fichaClinicaCodigo'])) {

        $mysql .= " WHERE ".$ficha_codigo." LIKE '%".addslashes($_GET['fichaClinicaCodigo'])."%'";

    }else if(!empty($_GET['clienteNombre'])){

        $mysql .= " WHERE ".$cliente_nombre." LIKE '%".addslashes($_GET['clienteNombre'])."%'";

    }

    $mysql .= " AND ".$eliminado." = 0 ORDER BY ".$ficha_codigo." DESC LIMIT 10";
    $executor = new DatabaseExecutor();
    $resultado = $executor->execute_direct($mysql, 'select');
    
    if(count($resultado) > 0){
        foreach($resultado as $result){
            $fichas[] = [
                'fichaClinicaId' => $result['fichaClinicaId'],
                'fichaClinicaCodigo' => $result['fichaClinicaCodigo'],
                'clienteNombre' => $result['clienteNombre']
            ];
        }
    }
    $result = array_filter($fichas, function($ficha) use ($query) {
        return stripos($ficha['fichaClinicaCodigo'].' '.$ficha['clienteNombre'], $query) !== false;
    });

    echo json_encode(array_values($result));
}

