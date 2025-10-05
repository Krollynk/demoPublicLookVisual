<?php
class VentasController
{
    public function __construct() {

    }

    public function GetVentas() {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'vnVentas',
            'alias' => 't',
            'select' => [
                't.ventaId',
                't.ventaCodigo',
                't.ventaTotal',
                't.ventaSaldo',
                't.ventaAbono',
                't.ventaFecha',
                't.ventaEstatus',
                'cli.clienteNombre',
            ],
            'joins'=> array(
                array(
                    'tabla' => 'cliClientes',
                    'alias' => 'cli',
                    'on' => 't.ventaClienteId = cli.clienteId'
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
    public function GetVentasPorId($id) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'vnVentas',
            'alias' => 't',
            'select' => [
                't.ventaId',
                't.ventaCodigo',
                't.ventaTotal',
                't.ventaSaldo',
                't.ventaAbono',
                't.ventaFecha',
                't.ventaEstatus',
                'cli.clienteNombre',
            ],
            'joins'=> array(
                array(
                    'tabla' => 'cliClientes',
                    'alias' => 'cli',
                    'on' => 't.ventaClienteId = cli.clienteId'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.eliminado = "0" ',
                    'values'=> array(),
                    'type'=> 'add',
                ),
                array(
                    'where'=> 't.ventaId = '.$id,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }
    public function GetVentasDetPorId($id) {
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'vnVentasDet',
            'alias' => 't',
            'select' => [
                't.ventaDetId',
                't.ventaDetProducto',
                't.ventaDetCantidad',
                't.ventaDetPrecio',
                't.ventaDetTotal',
            ],
            'joins'=> array(),
            'where'=> array(
                array(
                    'where'=> 't.eliminado = "0" ',
                    'values'=> array(),
                    'type'=> 'add',
                ),
                array(
                    'where'=> 't.ventaId = '.$id,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        return $resultado;
    }
    public static function InsertVentas(Request $request){

        $tabla = ModelMapper::getTableName('vnVentas');
        $campo = ModelMapper::getField('vnVentas', 'ventaCorrelativo');
        $mysql = 'SELECT MAX('.$campo.') as ventaCorrelativo FROM '.$tabla;
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute_direct($mysql, 'select');
        $ultimo_correlativo = $resultado[0]['ventaCorrelativo'] + 1;
        if(!$ultimo_correlativo) $ultimo_correlativo = 1;
        $codigo = 'VN-'.$ultimo_correlativo;

        $mysql = array(
            'tipo' => 'insert',
            'tabla' => 'vnVentas',
            'campos' => array(
                array(
                    'campo' => 'ventaCodigo',
                    'valor' => $codigo
                ),
                array(
                    'campo' => 'ventaCorrelativo',
                    'valor' => $ultimo_correlativo
                ),
                array(
                    'campo' => 'ventaClienteId',
                    'valor' => $request->input('ClienteId')
                ),
                array(
                    'campo' => 'ventaTotal',
                    'valor' => 0
                ),
                array(
                    'campo' => 'ventaSaldo',
                    'valor' => 0
                ),
                array(
                    'campo' => 'ventaAbono',
                    'valor' => 0
                ),
                array(
                    'campo' => 'ventaFecha',
                    'valor' => $request->input('ventaFecha')
                ),
                array(
                    'campo' => 'ventaEstatus',
                    'valor' => 'Grabada'
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            Response::redirect('/view_ventas_det_editar?id='.$resultado['id']);
        }else{
            var_dump($resultado);die;
        }
    }

    public static function InsertVentasDet(Request $request){

        $total = $request->input('ventaDetCantidad') * $request->input('ventaDetPrecio');

        $mysql = array(
            'tipo' => 'insert',
            'tabla' => 'vnVentasDet',
            'campos' => array(
                array(
                    'campo' => 'ventaId',
                    'valor' => $request->input('ventaId')
                ),
                array(
                    'campo' => 'ventaDetProducto',
                    'valor' => $request->input('ventaDetProducto')
                ),
                array(
                    'campo' => 'ventaDetCantidad',
                    'valor' => $request->input('ventaDetCantidad')
                ),
                array(
                    'campo' => 'ventaDetPrecio',
                    'valor' => $request->input('ventaDetPrecio')
                ),
                array(
                    'campo' => 'ventaDetTotal',
                    'valor' => $total
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            self::ActualizarTotalesVenta($request->input('ventaId'));
            Response::redirect('/view_ventas_det_editar?id='.$request->input('ventaId'));
        }else{
            var_dump($resultado);die;
        }
    }

    private static function ActualizarTotalesVenta($id){
        $mysql = 'SELECT SUM(vn_venta_det_total) as total FROM vn_ventas_det WHERE vn_venta_id = '.$id.' AND vn_venta_det_eliminado = 0';
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute_direct($mysql, 'select');
        $total = $resultado[0]['total'];
        if(!$total) $total = 0;

        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'vnVentas',
            'campos' => array(
                array(
                    'campo' => 'ventaTotal',
                    'valor' => $total
                ),
                array(
                    'campo' => 'ventaSaldo',
                    'valor' => $total
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.ventaId = '.$id,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        if(!isset($resultado['error'])){
            return true;
        }else{
            return false;
        }
    }

    public static function EliminarVentaDet($id){
        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'vnVentasDet',
            'alias' => 't',
            'select' => [
                't.ventaId',
                't.ventaDetProducto',
                't.ventaDetCantidad',
                't.ventaDetPrecio',
                't.ventaDetTotal',
            ],
            'joins'=> array(),
            'where'=> array(
                array(
                    'where'=> 't.ventaDetId = '.$id,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);
        $id_venta = $resultado[0]['ventaId'];

        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'vnVentasDet',
            'campos' => array(
                array(
                    'campo' => 'eliminado',
                    'valor' => '1'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 'ventaDetId = '.$id, 
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);
        if(!isset($resultado['error'])){
            self::ActualizarTotalesVenta($id_venta);
            return $resultado;
        }else{
            var_dump($resultado);die;
        }
    }

    public static function EliminarVenta($id){

        $mysql = array(
            'tipo' => 'update',
            'tabla' => 'vnVentas',
            'campos' => array(
                array(
                    'campo' => 'eliminado',
                    'valor' => '1'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 'ventaId = '.$id, 
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
                'tabla' => 'vnVentasDet',
                'campos' => array(
                    array(
                        'campo' => 'eliminado',
                        'valor' => '1'
                    ),
                ),
                'where'=> array(
                    array(
                        'where'=> 'ventaId = '.$id, 
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