<?php
class AuthController
{
    public static function showLogin()
    {
        include 'views/login.php';
    }

    public static function login(Request $request)
    {
        
        $user = $request->input('admUsuarioEmail');
        $pass = $request->input('admUsuarioPassword');

        $mysql = array(
            'tipo' => 'select',
            'tabla' => 'admUsuarios',
            'alias' => 't',
            'select' => [
                't.admUsuarioNombre',
                'rol.admRolDescripcion',
            ],
            'joins'=> array(
                array(
                    'tabla' => 'admRol',
                    'alias' => 'rol',
                    'on' => 't.admUsuarioRol = rol.admRolId'
                ),
            ),
            'where'=> array(
                array(
                    'where'=> 't.admUsuarioEmail = '.$user . ' and t.admUsuarioPassword = '.$pass,
                    'values'=> array(),
                    'type'=> 'add',
                ),
            ),
        );
        $executor = new DatabaseExecutor();
        $resultado = $executor->execute($mysql);

        // Lógica real de validación aquí
        if (count($resultado) == 1) {
            $_SESSION['usuario'] = $resultado[0]['admUsuarioNombre'];
            Response::redirect('/view_clientes');
        } else {
            $_SESSION['error_sesion'] = 'Credenciales inválidas';
            self::showLogin();
        }
    }

    public static function logout()
    {
        session_destroy();
        Response::redirect('/');
    }
}
