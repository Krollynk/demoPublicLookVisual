<?php
class LaboratoriosController
{
    public function __construct() {

    }

    public function GetLaboratorios() {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'labLaboratorios',
            'alias' => 't',
            'select' => [
                't.laboratorioId',
                't.laboratorioCodigo',
                't.laboratorioNombre',
                't.laboratorioTelefono',
                't.laboratorioCorreo',
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
    public function GetLaboratoriosPorId($id) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'labLaboratorios',
            'alias' => 't',
            'select' => [
                't.laboratorioId',
                't.laboratorioCodigo',
                't.laboratorioNombre',
                't.laboratorioDireccion',
                't.laboratorioTelefono',
                't.laboratorioCorreo',
            ],
            'joins'=> array(),
            'where'=> array(
                array(
                    'where'=> 't.eliminado = "0" ',
                    'values'=> array(),
                    'type'=> 'add',
                ),
                array(
                    'where'=> 't.laboratorioId = '.$id,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }
    public static function UpdateLaboratoriosPorId(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'labLaboratorios',
            'campos' => array(
                array(
                    'campo' => 'laboratorioNombre',
                    'valor' => $request->input('laboratorioNombre')
                ),
                array(
                    'campo' => 'laboratorioDireccion',
                    'valor' => $request->input('laboratorioDireccion')
                ),
                array(
                    'campo' => 'laboratorioTelefono',
                    'valor' => $request->input('laboratorioTelefono')
                ),
                array(
                    'campo' => 'laboratorioCorreo',
                    'valor' => $request->input('laboratorioCorreo')
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.laboratorioId = '.$request->input('laboratorioId'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_laboratorios');
        }else{
            var_dump($resultado);die;
        }
    }
    public static function InsertLaboratorios(Request $request){

        $tabla = ModelMapper::getTableName('labLaboratorios');
        $campo = ModelMapper::getField('labLaboratorios', 'laboratorioCodigo');
        $mysql = 'SELECT MAX('.$campo.') as laboratorioCodigo FROM '.$tabla;
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute_direct($mysql, 'select');
        $ultimo_codigo = $resultado[0]['laboratorioCodigo'] + 1;

        $mysql = array(
            'tipo' => 'insert',
            'tabla' => 'labLaboratorios',
            'campos' => array(
                array(
                    'campo' => 'laboratorioCodigo',
                    'valor' => $ultimo_codigo
                ),
                array(
                    'campo' => 'laboratorioNombre',
                    'valor' => $request->input('laboratorioNombre')
                ),
                array(
                    'campo' => 'laboratorioDireccion',
                    'valor' => $request->input('laboratorioDireccion')
                ),
                array(
                    'campo' => 'laboratorioTelefono',
                    'valor' => $request->input('laboratorioTelefono')
                ),
                array(
                    'campo' => 'laboratorioCorreo',
                    'valor' => $request->input('laboratorioCorreo')
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_laboratorios');
        }else{
            var_dump($resultado);die;
        }
    }

    public static function EliminarLaboratorio($id){
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'labLaboratorios',
            'campos' => array(
                array(
                    'campo' => 'eliminado',
                    'valor' => '1'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 'laboratorioId = '.$id, 
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