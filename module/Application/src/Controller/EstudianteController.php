<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class EstudianteController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel([
            'titulo' => 'Gestión de Estudiantes',
            'subtitulo' => 'CRUD de Estudiantes - Laminas Framework',
            'mensaje' => 'Esta funcionalidad está en desarrollo. Próximamente podrás gestionar estudiantes aquí.',
            'estudiantes' => [
                [
                    'id' => 1,
                    'nombre' => 'Juan Pérez',
                    'carrera' => 'Ingeniería de Sistemas',
                    'semestre' => '8vo'
                ],
                [
                    'id' => 2,
                    'nombre' => 'María García',
                    'carrera' => 'Ingeniería de Sistemas',
                    'semestre' => '6to'
                ],
                [
                    'id' => 3,
                    'nombre' => 'Carlos López',
                    'carrera' => 'Ingeniería de Sistemas',
                    'semestre' => '10mo'
                ]
            ]
        ]);
    }
    
    public function agregarAction()
    {
        return new ViewModel([
            'titulo' => 'Agregar Estudiante',
            'subtitulo' => 'Formulario de Registro',
            'mensaje' => 'Formulario para agregar nuevos estudiantes (en desarrollo)'
        ]);
    }
    
    public function editarAction()
    {
        $id = $this->params()->fromRoute('id');
        return new ViewModel([
            'titulo' => 'Editar Estudiante',
            'subtitulo' => 'Modificar Información',
            'mensaje' => "Formulario para editar estudiante ID: {$id} (en desarrollo)",
            'id' => $id
        ]);
    }
    
    public function eliminarAction()
    {
        $id = $this->params()->fromRoute('id');
        return new ViewModel([
            'titulo' => 'Eliminar Estudiante',
            'subtitulo' => 'Confirmar Eliminación',
            'mensaje' => "¿Estás seguro de eliminar el estudiante ID: {$id}? (en desarrollo)",
            'id' => $id
        ]);
    }
}
