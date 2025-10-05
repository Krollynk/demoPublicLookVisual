<?php
// index.php (Front Controller)
session_start();

// Carga de clases principales
require_once __DIR__ . '/core/db_connection.php';
require_once __DIR__ . '/core/DatabaseExecutor.php';
require_once __DIR__ . '/core/ModelMapper.php';
require_once __DIR__ . '/core/QueryBuilder.php';
require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/core/Request.php';
require_once __DIR__ . '/core/Response.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/InicioController.php';
require_once __DIR__ . '/controllers/ClientesController.php';
require_once __DIR__ . '/controllers/LaboratoriosController.php';
require_once __DIR__ . '/controllers/FichaController.php';
require_once __DIR__ . '/controllers/VentasController.php';
require_once __DIR__ . '/controllers/OrdenesController.php';
require_once __DIR__ . '/functions/view_helper.php'; // Aquí está renderLayout()

$request = new Request();
$response = new Response();
$router = new Router();

// Rutas públicas
$router->get('/', function () {
    require 'views/login.php'; // Carga views/login.php dentro del layout general
});
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);

// Middleware básico para proteger rutas privadas
$requireAuth = function ($callback) {
    return function () use ($callback) {
        if (!isset($_SESSION['usuario'])) {
            header("Location: /");
            exit;
        }
        call_user_func($callback);
    };
};

// Rutas protegidas vistas
$router->get('/view_clientes', [InicioController::class, 'viewClientes']);
$router->get('/view_clientes_nuevo', [InicioController::class, 'viewClientesNuevo']);
$router->get('/view_clientes_editar', [InicioController::class, 'viewClientesEditar']);
$router->get('/view_laboratorios', [InicioController::class, 'viewLaboratorios']);
$router->get('/view_laboratorios_nuevo', [InicioController::class, 'viewLaboratoriosNuevo']);
$router->get('/view_laboratorios_editar', [InicioController::class, 'viewLaboratoriosEditar']);
$router->get('/view_ficha_clinica', [InicioController::class, 'viewFichaClinica']);
$router->get('/view_ficha_clinica_nuevo', [InicioController::class, 'viewFichaClinicaNuevo']);
$router->get('/view_ficha_clinica_det_editar', [InicioController::class, 'viewFichaClinicaDetEditar']);
$router->get('/view_ventas', [InicioController::class, 'viewVentas']);
$router->get('/view_ventas_nuevo', [InicioController::class, 'viewVentasNuevo']);
$router->get('/view_ventas_det_editar', [InicioController::class, 'viewVentasDetEditar']);
$router->get('/view_ordenes', [InicioController::class, 'viewOrdenes']);
$router->get('/view_ordenes_nuevo', [InicioController::class, 'viewOrdenesNuevo']);
$router->get('/view_ordenes_det_editar', [InicioController::class, 'viewOrdenesDetEditar']);
// Rutas protegidas procesos
$router->post('/guardar_cliente', [ClientesController::class, 'InsertCliente']);
$router->post('/actualizar_cliente', [ClientesController::class, 'UpdateClientesPorId']);
$router->post('/guardar_laboratorio', [LaboratoriosController::class, 'InsertLaboratorios']);
$router->post('/actualizar_laboratorio', [LaboratoriosController::class, 'UpdateLaboratoriosPorId']);
$router->post('/guardar_ficha', [FichaController::class, 'InsertFicha']);
$router->post('/actualizar_ficha', [FichaController::class, 'UpdateFichaPorId']);
$router->post('/guardar_venta', [VentasController::class, 'InsertVentas']);
$router->post('/guardar_venta_det', [VentasController::class, 'InsertVentasDet']);
$router->post('/guardar_orden', [OrdenesController::class, 'InsertOrdenes']);
$router->post('/actualizar_orden', [OrdenesController::class, 'UpdateOrdenesPorId']);

// Despachar la solicitud
$router->dispatch($request);