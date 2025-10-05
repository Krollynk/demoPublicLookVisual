<?php
class InicioController
{
    public static function requireAuth()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: /');
            exit;
        }
    }

    public static function viewClientes()
    {
        $_SESSION['modulo'] = "CLIENTES";
        $_SESSION['accion'] = "ver";
        $controller = new ClientesController();
        $resultado = $controller->getClientes();
        self::requireAuth();
        renderLayout('view_clientes', $resultado);
    }
    public static function viewClientesEditar(Request $request)
    {
        if(empty($request->query('id'))) {
            Response::json(['success'=>false,'mensaje'=>'Debe seleccionar un cliente']);
            return;
        }
        $controller = new ClientesController();
        $resultado = $controller->GetClientesPorId($request->query('id'));
        $_SESSION['modulo'] = "CLIENTES";
        $_SESSION['accion'] = "editar";
        self::requireAuth();
        renderLayout('view_clientes_editar', $resultado);
    }
    public static function viewClientesNuevo()
    {
        $_SESSION['modulo'] = "CLIENTES";
        $_SESSION['accion'] = "nuevo";
        self::requireAuth();
        renderLayout('view_clientes_nuevo');
    }
    public static function viewLaboratorios()
    {
        $_SESSION['modulo'] = "LABORATORIOS";
        $_SESSION['accion'] = "ver";
        $controller = new LaboratoriosController();
        $data = $controller->GetLaboratorios();
        self::requireAuth();
        renderLayout('view_laboratorios', $data);
    }
    public static function viewLaboratoriosEditar(Request $request)
    {
        if(empty($request->query('id'))) {
            Response::json(['success'=>false,'mensaje'=>'Debe seleccionar un laboratorio']);
            return;
        }
        $controller = new LaboratoriosController();
        $resultado = $controller->GetLaboratoriosPorId($request->query('id'));
        $_SESSION['modulo'] = "LABORATORIOS";
        $_SESSION['accion'] = "editar";
        self::requireAuth();
        renderLayout('view_laboratorios_editar', $resultado);
    }
    public static function viewLaboratoriosNuevo()
    {
        $_SESSION['modulo'] = "LABORATORIOS";
        $_SESSION['accion'] = "nuevo";
        self::requireAuth();
        renderLayout('view_laboratorios_nuevo');
    }
    public static function viewFichaClinica()
    {
        $_SESSION['modulo'] = "FICHAS CLÍNICAS";
        $_SESSION['accion'] = "ver";
        $controller = new FichaController();
        $resultado = $controller->GetFichasClinicas();
        self::requireAuth();
        renderLayout('view_ficha_clinica', $resultado);
    }
    public static function viewFichaClinicaDetEditar(Request $request)
    {
        if(empty($request->query('id'))) {
            Response::json(['success'=>false,'mensaje'=>'Debe seleccionar una ficha clínica']);
            return;
        }
        $controller = new FichaController();
        $resultado = $controller->GetFichaClinicaPorId($request->query('id'));
        $_SESSION['modulo'] = "FICHAS CLÍNICAS";
        $_SESSION['accion'] = "editar";
        self::requireAuth();
        renderLayout('view_ficha_clinica_det_editar', $resultado);
    }
    public static function viewFichaClinicaNuevo()
    {
        $_SESSION['modulo'] = "FICHAS CLÍNICAS";
        $_SESSION['accion'] = "nuevo";
        self::requireAuth();
        renderLayout('view_ficha_clinica_nuevo');
    }
    public static function viewVentas()
    {
        $_SESSION['modulo'] = "VENTAS";
        $_SESSION['accion'] = "ver";
        $controller = new VentasController();
        $resultado = $controller->GetVentas();
        self::requireAuth();
        renderLayout('view_ventas', $resultado);
    }
    public static function viewVentasNuevo()
    {
        $_SESSION['modulo'] = "VENTAS";
        $_SESSION['accion'] = "nuevo";
        self::requireAuth();
        renderLayout('view_ventas_nuevo');
    }
    public static function viewVentasDetEditar(Request $request)
    {
        if(empty($request->query('id'))) {
            Response::json(['success'=>false,'mensaje'=>'Debe seleccionar una ficha clínica']);
            return;
        }
        $controller = new VentasController();
        $resultado = $controller->GetVentasPorId($request->query('id'));
        $_SESSION['modulo'] = "VENTAS";
        $_SESSION['accion'] = "nuevo";
        self::requireAuth();
        renderLayout('view_ventas_det_editar', $resultado);
    }
    public static function viewOrdenes(Request $request)
    {
        $_SESSION['modulo'] = "ORDENES";
        $_SESSION['accion'] = "nuevo";
        $controller = new OrdenesController();
        $resultado = $controller->GetOrdenes();
        self::requireAuth();
        renderLayout('view_ordenes', $resultado);
    }
    public static function viewOrdenesNuevo(Request $request)
    {
        $_SESSION['modulo'] = "ORDENES";
        $_SESSION['accion'] = "nuevo";
        self::requireAuth();
        renderLayout('view_ordenes_nuevo');
    }
    public static function viewOrdenesDetEditar(Request $request)
    {
        if(empty($request->query('id'))) {
            Response::json(['success'=>false,'mensaje'=>'Debe seleccionar una orden']);
            return;
        }
        $controller = new OrdenesController();
        $resultado = $controller->GetOrdenPorId($request->query('id'));
        $_SESSION['modulo'] = "ORDENES";
        $_SESSION['accion'] = "editar";
        self::requireAuth();
        renderLayout('view_ordenes_det_editar', $resultado);
    }
}