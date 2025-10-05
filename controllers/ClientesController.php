<?php

class ClientesController {

    public function __construct() {

    }

    public function GetClientes() {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'cliClientes',
            'alias' => 't',
            'select' => [
                't.clienteId',
                't.clienteCodigo',
                't.clienteNombre',
                't.clienteTelefono',
            ],
            'joins'=> array(),
            'where'=> array(
                array(
                    'where'=> 't.eliminado = "0" ',
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }
    public function GetClientesPorId($id) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'cliClientes',
            'alias' => 't',
            'select' => [
                't.clienteId',
                't.clienteCodigo',
                't.clienteNombre',
                't.clienteDireccion',
                't.clienteTelefono',
                't.clienteCorreo',
                't.clienteEdad',
            ],
            'joins'=> array(),
            'where'=> array(
                array(
                    'where'=> 't.eliminado = "0" ',
                    'values'=> array(),
                    'type'=> 'add',
                ),
                array(
                    'where'=> 't.clienteId = '.$id,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }

    public static function UpdateClientesPorId(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'cliClientes',
            'campos' => array(
                array(
                    'campo' => 'clienteNombre',
                    'valor' => $request->input('clienteNombre')
                ),
                array(
                    'campo' => 'clienteDireccion',
                    'valor' => $request->input('clienteDireccion')
                ),
                array(
                    'campo' => 'clienteTelefono',
                    'valor' => $request->input('clienteTelefono')
                ),
                array(
                    'campo' => 'clienteCorreo',
                    'valor' => $request->input('clienteCorreo')
                ),
                array(
                    'campo' => 'clienteEdad',
                    'valor' => $request->input('clienteEdad')
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.clienteId = '.$request->input('clienteId'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_clientes');
        }else{
            var_dump($resultado);die;
        }
    }
    public static function InsertCliente(Request $request){

        $tabla = ModelMapper::getTableName('cliClientes');
        $campo = ModelMapper::getField('cliClientes', 'clienteCodigo');
        $mysql = 'SELECT MAX('.$campo.') as clienteCodigo FROM '.$tabla;
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute_direct($mysql, 'select');
        $ultimo_codigo = $resultado[0]['clienteCodigo'] + 1;

        $mysql = array(
            'tipo' => 'insert',
            'tabla' => 'cliClientes',
            'campos' => array(
                array(
                    'campo' => 'clienteCodigo',
                    'valor' => $ultimo_codigo
                ),
                array(
                    'campo' => 'clienteNombre',
                    'valor' => $request->input('clienteNombre')
                ),
                array(
                    'campo' => 'clienteDireccion',
                    'valor' => $request->input('clienteDireccion')
                ),
                array(
                    'campo' => 'clienteTelefono',
                    'valor' => $request->input('clienteTelefono')
                ),
                array(
                    'campo' => 'clienteCorreo',
                    'valor' => $request->input('clienteCorreo')
                ),
                array(
                    'campo' => 'clienteEdad',
                    'valor' => $request->input('clienteEdad')
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_clientes');
        }else{
            var_dump($resultado);die;
        }
    }
    public static function EliminarCliente(Request $request){
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'cliClientes',
            'campos' => array(
                array(
                    'campo' => 'eliminado',
                    'valor' => '1'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 'clienteId = '.$request->query('id'), 
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);
        if(!isset($resultado['error'])){
            return $resultado;
        }else{
            var_dump($resultado);die;
        }
    }
}