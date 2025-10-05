<?php
class OrdenesController
{
    public function __construct() {

    }

    public function GetOrdenes() {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'labOrdenes',
            'alias' => 't',
            'select' => [
                't.ordenId',
                't.ordenCodigo',
                't.fichaClinicaId',
                't.laboratorioId',
                't.ordenFecha',
                't.ordenEstatus',
                'fic.fichaClinicaCodigo',
                'fic.fichaClinicaClienteId',
                'cli.clienteNombre',
                'lab.laboratorioNombre',
                'lab.laboratorioDireccion',
            ],
            'joins'=> array(
                array(
                    'tabla' => 'ficFichaClinica',
                    'alias' => 'fic',
                    'on' => 't.fichaClinicaId = fic.fichaClinicaId'
                ),
                array(
                    'tabla' => 'labLaboratorios',
                    'alias' => 'lab',
                    'on' => 't.laboratorioId = lab.laboratorioId'
                ),
                array(
                    'tabla' => 'cliClientes',
                    'alias' => 'cli',
                    'on' => 'fic.fichaClinicaClienteId = cli.clienteId'
                ),
            ),
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
    public function GetOrdenPorId($id) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'labOrdenesDet',
            'alias' => 't',
            'select' => [
                't.ordenDetId',
                't.ordenId',
                't.ordenDetArmazon',
                't.ordenDetDip',
                't.ordenDetAltura',
                't.ordenDetPuente',
                't.ordenDetHorizontal',
                't.ordenDetVertical',
                't.ordenDetDiagonal',
                't.ordenDetMaterial',
                'ord.ordenCodigo',
                'ord.fichaClinicaId',
                'ord.laboratorioId',
                'ord.ordenFecha',
                'fic.fichaClinicaCodigo',
                'ficdet.fichaClinicaDetRxfinOdEsf',
                'ficdet.fichaClinicaDetRxfinOdCil',
                'ficdet.fichaClinicaDetRxfinOdEje',
                'ficdet.fichaClinicaDetRxfinOdAdd',
                'ficdet.fichaClinicaDetRxfinOdPrisma',
                'ficdet.fichaClinicaDetRxfinOiEsf',
                'ficdet.fichaClinicaDetRxfinOiCil',
                'ficdet.fichaClinicaDetRxfinOiEje',
                'ficdet.fichaClinicaDetRxfinOiAdd',
                'ficdet.fichaClinicaDetRxfinOiPrisma',
                'cli.clienteNombre',
                'lab.laboratorioNombre',
                'lab.laboratorioDireccion',
            ],
            'joins'=> array(
                array(
                    'tabla' => 'labOrdenes',
                    'alias' => 'ord',
                    'on' => 't.ordenId = ord.ordenId'
                ),
                array(
                    'tabla' => 'ficFichaClinica',
                    'alias' => 'fic',
                    'on' => 'ord.fichaClinicaId = fic.fichaClinicaId'
                ),
                array(
                    'tabla' => 'ficFichaClinicaDet',
                    'alias' => 'ficdet',
                    'on' => 'fic.fichaClinicaId = ficdet.fichaClinicaId'
                ),
                array(
                    'tabla' => 'cliClientes',
                    'alias' => 'cli',
                    'on' => 'fic.fichaClinicaClienteId = cli.clienteId'
                ),
                array(
                    'tabla' => 'labLaboratorios',
                    'alias' => 'lab',
                    'on' => 'ord.laboratorioId = lab.laboratorioId'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.eliminado = "0" ',
                    'values'=> array(),
                    'type'=> 'add',
                ),
                array(
                    'where'=> 't.ordenId = '.$id,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }
    public static function InsertOrdenes(Request $request){

        $tabla = ModelMapper::getTableName('labOrdenes');
        $campo = ModelMapper::getField('labOrdenes', 'ordenCodigo');
        $mysql = 'SELECT MAX('.$campo.') as ordenCodigo FROM '.$tabla;
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute_direct($mysql, 'select');
        if(count($resultado) > 0){
            $ultimo_codigo = $resultado[0]['ordenCodigo'] + 1;
        }else{
            $ultimo_codigo = 400000;
        }
        $status = 'Grabada';

        $mysql = array(
            'tipo' => 'insert',
            'tabla' => 'labOrdenes',
            'campos' => array(
                array(
                    'campo' => 'ordenCodigo',
                    'valor' => $ultimo_codigo
                ),
                array(
                    'campo' => 'fichaClinicaId',
                    'valor' => $request->input('fichaClinicaId')
                ),
                array(
                    'campo' => 'laboratorioId',
                    'valor' => $request->input('laboratorioId')
                ),
                array(
                    'campo' => 'ordenFecha',
                    'valor' => $request->input('ordenFecha')
                ),
                array(
                    'campo' => 'ordenEstatus',
                    'valor' => $status
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){

            $mysql = array(
                'tipo' => 'insert',
                'tabla' => 'labOrdenesDet',
                'campos' => array(
                    array(
                        'campo' => 'ordenId',
                        'valor' => $resultado['id']
                    ),
                ),
            );
            $executor = new DatabaseExecutor();
            $resultadoDet = $executor->execute($mysql);
            if(!isset($resultadoDet['error'])){
                Response::redirect('/view_ordenes_det_editar?id='.$resultado['id']);
            }else{
                var_dump($resultadoDet);die;
            }
        }else{
            var_dump($resultado);die;
        }
    }
    public static function UpdateOrdenesPorId(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'labOrdenesDet',
            'campos' => array(
                array(
                    'campo' => 'ordenDetArmazon',
                    'valor' => $request->input('ordenDetArmazon')
                ),
                array(
                    'campo' => 'ordenDetMaterial',
                    'valor' => $request->input('ordenDetMaterial')
                ),
                array(
                    'campo' => 'ordenDetDip',
                    'valor' => $request->input('ordenDetDip')
                ),
                array(
                    'campo' => 'ordenDetAltura',
                    'valor' => $request->input('ordenDetAltura')
                ),
                array(
                    'campo' => 'ordenDetPuente',
                    'valor' => $request->input('ordenDetPuente')
                ),
                array(
                    'campo' => 'ordenDetHorizontal',
                    'valor' => $request->input('ordenDetHorizontal')
                ),
                array(
                    'campo' => 'ordenDetVertical',
                    'valor' => $request->input('ordenDetVertical')
                ),
                array(
                    'campo' => 'ordenDetDiagonal',
                    'valor' => $request->input('ordenDetDiagonal')
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.ordenId = '.$request->input('ordenId'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_ordenes');
        }else{
            var_dump($resultado);die;
        }
    }
    

    public static function EliminarOrden($id){
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'ficFichaClinica',
            'campos' => array(
                array(
                    'campo' => 'eliminado',
                    'valor' => '1'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 'fichaClinicaId = '.$id, 
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);
        if(!isset($resultado['error'])){
            $mysql = array(
                'tipo' => 'update',
                'tabla' => 'ficFichaClinicaDet',
                'campos' => array(
                    array(
                        'campo' => 'eliminado',
                        'valor' => '1'
                    ),
                ),
                'where'=> array(
                    array(
                        'where'=> 'fichaClinicaId = '.$id, 
                        'values'=> array(),
                        'type'=> 'add',
                    ),
                ),
            );
            $executor = new DatabaseExecutor();
            $resultado = $executor->execute($mysql);
            return $resultado;
        }else{
            var_dump($resultado);die;
        }
    }
}