<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel([
            'titulo' => 'Sistema de Gestión de Estudiantes',
            'subtitulo' => 'Laminas Framework - INF513-SC',
            'mensaje' => '¡Bienvenido al sistema de gestión de estudiantes desarrollado con Laminas Framework!'
        ]);
    }
    
    public function infoAction()
    {
        // Detección dinámica del sistema operativo
        $os = php_uname('s');
        $server_software = $_SERVER['SERVER_SOFTWARE'] ?? 'PHP Built-in Server';
        $architecture = php_uname('m');
        
        // Detectar el servidor web
        if (strpos($server_software, 'Apache') !== false) {
            $server_type = 'Apache';
        } elseif (strpos($server_software, 'nginx') !== false) {
            $server_type = 'Nginx';
        } elseif (strpos($server_software, 'PHP') !== false) {
            $server_type = 'PHP Built-in Server';
        } else {
            $server_type = 'Desconocido';
        }
        
        return new ViewModel([
            'php_version' => phpversion(),
            'laminas_version' => '3.8.0',
            'sistema_operativo' => $os,
            'arquitectura' => $architecture,
            'servidor_web' => $server_type,
            'servidor_completo' => $os . ' + ' . $server_type,
            'framework' => 'Laminas Framework',
            'directorio_actual' => getcwd(),
            'memoria_limit' => ini_get('memory_limit'),
            'max_execution_time' => ini_get('max_execution_time'),
            'caracteristicas' => [
                'Arquitectura MVC',
                'Formularios con validación',
                'CRUD completo',
                'Búsqueda y filtros',
                'Interfaz responsive',
                'Modular y flexible'
            ]
        ]);
    }
}
