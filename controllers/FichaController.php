<?php
class FichaController
{
    public function __construct() {

    }

    public function GetFichasClinicas() {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'ficFichaClinica',
            'alias' => 't',
            'select' => [
                't.fichaClinicaId',
                't.fichaClinicaCodigo',
                't.fichaClinicaClienteId',
                't.fichaClinicaFecha',
                't.fichaClinicaStatus',
                'cli.clienteNombre',
            ],
            'joins'=> array(
                array(
                    'tabla' => 'cliClientes',
                    'alias' => 'cli',
                    'on' => 't.fichaClinicaClienteId = cli.clienteId'
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
    public function GetFichaClinicaPorId($id) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'ficFichaClinicaDet',
            'alias' => 't',
            'select' => [
                't.fichaClinicaDetId',
                't.fichaClinicaId',
                't.fichaClinicaDetCefalea',
                't.fichaClinicaDetDolorOjos',
                't.fichaClinicaDetArdorOjos',
                't.fichaClinicaDetLagrimeo',
                't.fichaClinicaDetLagrimeo',
                't.fichaClinicaDetPresionAlta',
                't.fichaClinicaDetPresionBaja',
                't.fichaClinicaDetFlasheos',
                't.fichaClinicaDetMiodesopsias',
                't.fichaClinicaDetEmbarazo',
                't.fichaClinicaDetVisionBorrosa',
                't.fichaClinicaDetVisionNublada',
                't.fichaClinicaDetCuerpoExtranio',
                't.fichaClinicaDetMigrania',
                't.fichaClinicaDetFotofobia',
                't.fichaClinicaDetDiabetes',
                't.fichaClinicaDetOtrosSintomas',
                't.fichaClinicaDetUsaLentes',
                't.fichaClinicaDetAgvOdAvsc',
                't.fichaClinicaDetAgvOdAvcc',
                't.fichaClinicaDetAgvOdPh',
                't.fichaClinicaDetAgvOdRtc',
                't.fichaClinicaDetAgvOdFo',
                't.fichaClinicaDetAgvOiAvsc',
                't.fichaClinicaDetAgvOiAvcc',
                't.fichaClinicaDetAgvOiPh',
                't.fichaClinicaDetAgvOiRtc',
                't.fichaClinicaDetAgvOiFo',
                't.fichaClinicaDetRxamOdEsf',
                't.fichaClinicaDetRxamOdCil',
                't.fichaClinicaDetRxamOdEje',
                't.fichaClinicaDetRxamOdAdd',
                't.fichaClinicaDetRxamOdPrisma',
                't.fichaClinicaDetRxamOiEsf',
                't.fichaClinicaDetRxamOiCil',
                't.fichaClinicaDetRxamOiEje',
                't.fichaClinicaDetRxamOiAdd',
                't.fichaClinicaDetRxamOiPrisma',
                't.fichaClinicaDetRxfinOdEsf',
                't.fichaClinicaDetRxfinOdCil',
                't.fichaClinicaDetRxfinOdEje',
                't.fichaClinicaDetRxfinOdAdd',
                't.fichaClinicaDetRxfinOdPrisma',
                't.fichaClinicaDetRxfinOiEsf',
                't.fichaClinicaDetRxfinOiCil',
                't.fichaClinicaDetRxfinOiEje',
                't.fichaClinicaDetRxfinOiAdd',
                't.fichaClinicaDetRxfinOiPrisma',
                't.fichaClinicaDetRxantOdEsf',
                't.fichaClinicaDetRxantOdCil',
                't.fichaClinicaDetRxantOdEje',
                't.fichaClinicaDetRxantOdAdd',
                't.fichaClinicaDetRxantOdPrisma',
                't.fichaClinicaDetRxantOiEsf',
                't.fichaClinicaDetRxantOiCil',
                't.fichaClinicaDetRxantOiEje',
                't.fichaClinicaDetRxantOiAdd',
                't.fichaClinicaDetRxantOiPrisma',
                't.fichaClinicaDetMaterial',
                't.fichaClinicaDetDip',
                't.fichaClinicaDetTipoLente',
                't.fichaClinicaDetRecomendacion',
                'fic.fichaClinicaCodigo',
                'fic.fichaClinicaClienteId',
                'fic.fichaClinicaFecha',
                'fic.fichaClinicaStatus',
                'cli.clienteNombre',
            ],
            'joins'=> array(
                array(
                    'tabla' => 'ficFichaClinica',
                    'alias' => 'fic',
                    'on' => 't.fichaClinicaId = fic.fichaClinicaId'
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
                array(
                    'where'=> 't.fichaClinicaId = '.$id,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }
    public static function UpdateFichaPorId(Request $request) {
        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'ficFichaClinicaDet',
            'campos' => array(
                array(
                    'campo' => 'fichaClinicaDetCefalea',
                    'valor' => $request->input('fichaClinicaDetCefalea')
                ),
                array(
                    'campo' => 'fichaClinicaDetDolorOjos',
                    'valor' => $request->input('fichaClinicaDetDolorOjos')
                ),
                array(
                    'campo' => 'fichaClinicaDetArdorOjos',
                    'valor' => $request->input('fichaClinicaDetArdorOjos')
                ),
                array(
                    'campo' => 'fichaClinicaDetLagrimeo',
                    'valor' => $request->input('fichaClinicaDetLagrimeo')
                ),
                array(
                    'campo' => 'fichaClinicaDetPresionAlta',
                    'valor' => $request->input('fichaClinicaDetPresionAlta')
                ),
                array(
                    'campo' => 'fichaClinicaDetPresionBaja',
                    'valor' => $request->input('fichaClinicaDetPresionBaja')
                ),
                array(
                    'campo' => 'fichaClinicaDetFlasheos',
                    'valor' => $request->input('fichaClinicaDetFlasheos')
                ),
                array(
                    'campo' => 'fichaClinicaDetMiodesopsias',
                    'valor' => $request->input('fichaClinicaDetMiodesopsias')
                ),
                array(
                    'campo' => 'fichaClinicaDetEmbarazo',
                    'valor' => $request->input('fichaClinicaDetEmbarazo')
                ),
                array(
                    'campo' => 'fichaClinicaDetVisionBorrosa',
                    'valor' => $request->input('fichaClinicaDetVisionBorrosa')
                ),
                array(
                    'campo' => 'fichaClinicaDetVisionNublada',
                    'valor' => $request->input('fichaClinicaDetVisionNublada')
                ),
                array(
                    'campo' => 'fichaClinicaDetCuerpoExtranio',
                    'valor' => $request->input('fichaClinicaDetCuerpoExtranio')
                ),
                array(
                    'campo' => 'fichaClinicaDetMigrania',
                    'valor' => $request->input('fichaClinicaDetMigrania')
                ),
                array(
                    'campo' => 'fichaClinicaDetFotofobia',
                    'valor' => $request->input('fichaClinicaDetFotofobia')
                ),
                array(
                    'campo' => 'fichaClinicaDetDiabetes',
                    'valor' => $request->input('fichaClinicaDetDiabetes')
                ),
                array(
                    'campo' => 'fichaClinicaDetOtrosSintomas',
                    'valor' => $request->input('fichaClinicaDetOtrosSintomas')
                ),
                array(
                    'campo' => 'fichaClinicaDetUsaLentes',
                    'valor' => $request->input('fichaClinicaDetUsaLentes')
                ),
                array(
                    'campo' => 'fichaClinicaDetAgvOdAvsc',
                    'valor' => $request->input('fichaClinicaDetAgvOdAvsc')
                ),
                array(
                    'campo' => 'fichaClinicaDetAgvOdAvcc',
                    'valor' => $request->input('fichaClinicaDetAgvOdAvcc')
                ),
                array(
                    'campo' => 'fichaClinicaDetAgvOdPh',
                    'valor' => $request->input('fichaClinicaDetAgvOdPh')
                ),
                array(
                    'campo' => 'fichaClinicaDetAgvOdRtc',
                    'valor' => $request->input('fichaClinicaDetAgvOdRtc')
                ),
                array(
                    'campo' => 'fichaClinicaDetAgvOdFo',
                    'valor' => $request->input('fichaClinicaDetAgvOdFo')
                ),
                array(
                    'campo' => 'fichaClinicaDetAgvOiAvsc',
                    'valor' => $request->input('fichaClinicaDetAgvOiAvsc')
                ),
                array(
                    'campo' => 'fichaClinicaDetAgvOiAvcc',
                    'valor' => $request->input('fichaClinicaDetAgvOiAvcc')
                ),
                array(
                    'campo' => 'fichaClinicaDetAgvOiPh',
                    'valor' => $request->input('fichaClinicaDetAgvOiPh')
                ),
                array(
                    'campo' => 'fichaClinicaDetAgvOiRtc',
                    'valor' => $request->input('fichaClinicaDetAgvOiRtc')
                ),
                array(
                    'campo' => 'fichaClinicaDetAgvOiFo',
                    'valor' => $request->input('fichaClinicaDetAgvOiFo')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxamOdEsf',
                    'valor' => $request->input('fichaClinicaDetRxamOdEsf')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxamOdCil',
                    'valor' => $request->input('fichaClinicaDetRxamOdCil')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxamOdEje',
                    'valor' => $request->input('fichaClinicaDetRxamOdEje')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxamOdAdd',
                    'valor' => $request->input('fichaClinicaDetRxamOdAdd')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxamOdPrisma',
                    'valor' => $request->input('fichaClinicaDetRxamOdPrisma')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxamOiEsf',
                    'valor' => $request->input('fichaClinicaDetRxamOiEsf')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxamOiCil',
                    'valor' => $request->input('fichaClinicaDetRxamOiCil')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxamOiEje',
                    'valor' => $request->input('fichaClinicaDetRxamOiEje')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxamOiAdd',
                    'valor' => $request->input('fichaClinicaDetRxamOiAdd')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxamOiPrisma',
                    'valor' => $request->input('fichaClinicaDetRxamOiPrisma')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxfinOdEsf',
                    'valor' => $request->input('fichaClinicaDetRxfinOdEsf')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxfinOdCil',
                    'valor' => $request->input('fichaClinicaDetRxfinOdCil')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxfinOdEje',
                    'valor' => $request->input('fichaClinicaDetRxfinOdEje')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxfinOdAdd',
                    'valor' => $request->input('fichaClinicaDetRxfinOdAdd')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxfinOdPrisma',
                    'valor' => $request->input('fichaClinicaDetRxfinOdPrisma')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxfinOiEsf',
                    'valor' => $request->input('fichaClinicaDetRxfinOiEsf')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxfinOiCil',
                    'valor' => $request->input('fichaClinicaDetRxfinOiCil')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxfinOiEje',
                    'valor' => $request->input('fichaClinicaDetRxfinOiEje')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxfinOiAdd',
                    'valor' => $request->input('fichaClinicaDetRxfinOiAdd')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxfinOiPrisma',
                    'valor' => $request->input('fichaClinicaDetRxfinOiPrisma')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxantOdEsf',
                    'valor' => $request->input('fichaClinicaDetRxantOdEsf')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxantOdCil',
                    'valor' => $request->input('fichaClinicaDetRxantOdCil')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxantOdEje',
                    'valor' => $request->input('fichaClinicaDetRxantOdEje')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxantOdAdd',
                    'valor' => $request->input('fichaClinicaDetRxantOdAdd')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxantOdPrisma',
                    'valor' => $request->input('fichaClinicaDetRxantOdPrisma')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxantOiEsf',
                    'valor' => $request->input('fichaClinicaDetRxantOiEsf')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxantOiCil',
                    'valor' => $request->input('fichaClinicaDetRxantOiCil')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxantOiEje',
                    'valor' => $request->input('fichaClinicaDetRxantOiEje')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxantOiAdd',
                    'valor' => $request->input('fichaClinicaDetRxantOiAdd')
                ),
                array(
                    'campo' => 'fichaClinicaDetRxantOiPrisma',
                    'valor' => $request->input('fichaClinicaDetRxantOiPrisma')
                ),
                array(
                    'campo' => 'fichaClinicaDetMaterial',
                    'valor' => $request->input('fichaClinicaDetMaterial')
                ),
                array(
                    'campo' => 'fichaClinicaDetDip',
                    'valor' => $request->input('fichaClinicaDetDip')
                ),
                array(
                    'campo' => 'fichaClinicaDetTipoLente',
                    'valor' => $request->input('fichaClinicaDetTipoLente')
                ),
                array(
                    'campo' => 'fichaClinicaDetRecomendacion',
                    'valor' => $request->input('fichaClinicaDetRecomendacion')
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.fichaClinicaId = '.$request->input('fichaClinicaId'),
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_ficha_clinica');
        }else{
            var_dump($resultado);die;
        }
    }
    public static function InsertFicha(Request $request){

        $tabla = ModelMapper::getTableName('ficFichaClinica');
        $campo = ModelMapper::getField('ficFichaClinica', 'fichaClinicaCodigo');
        $mysql = 'SELECT MAX('.$campo.') as fichaClinicaCodigo FROM '.$tabla;
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute_direct($mysql, 'select');
        if(count($resultado) > 0){
            $ultimo_codigo = $resultado[0]['fichaClinicaCodigo'] + 1;
        }else{
            $ultimo_codigo = 300000;
        }
        $status = 'Grabada';

        $mysql = array(
            'tipo' => 'insert',
            'tabla' => 'ficFichaClinica',
            'campos' => array(
                array(
                    'campo' => 'fichaClinicaCodigo',
                    'valor' => $ultimo_codigo
                ),
                array(
                    'campo' => 'fichaClinicaClienteId',
                    'valor' => $request->input('ClienteId')
                ),
                array(
                    'campo' => 'fichaClinicaFecha',
                    'valor' => $request->input('fichaClinicaFecha')
                ),
                array(
                    'campo' => 'fichaClinicaStatus',
                    'valor' => $status
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){

            $mysql = array(
                'tipo' => 'insert',
                'tabla' => 'ficFichaClinicaDet',
                'campos' => array(
                    array(
                        'campo' => 'fichaClinicaId',
                        'valor' => $resultado['id']
                    ),
                ),
            );
            $executor = new DatabaseExecutor();
            $resultadoDet = $executor->execute($mysql);
            if(!isset($resultadoDet['error'])){
                Response::redirect('/view_ficha_clinica_det_editar?id='.$resultado['id']);
            }else{
                var_dump($resultadoDet);die;
            }
        }else{
            var_dump($resultado);die;
        }
    }

    public static function EliminarFicha($id){
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