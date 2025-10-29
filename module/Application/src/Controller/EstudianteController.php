<?php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class EstudianteController extends AbstractActionController
{
    private $dataFile = 'data/estudiantes.json';
    
    // Cargar datos desde JSON
    private function loadEstudiantes()
    {
        try {
            if (!file_exists($this->dataFile)) {
                // Crear archivo con datos iniciales
                $estudiantes = [
                    1 => [
                        'id' => 1,
                        'nombre' => 'Juan Pérez',
                        'carrera' => 'Ingeniería de Sistemas',
                        'semestre' => '8vo',
                        'email' => 'juan.perez@email.com',
                        'telefono' => '+591 7 12345678',
                        'ci' => '12345678'
                    ],
                    2 => [
                        'id' => 2,
                        'nombre' => 'María García',
                        'carrera' => 'Ingeniería de Sistemas',
                        'semestre' => '6to',
                        'email' => 'maria.garcia@email.com',
                        'telefono' => '+591 7 87654321',
                        'ci' => '87654321'
                    ],
                    3 => [
                        'id' => 3,
                        'nombre' => 'Carlos López',
                        'carrera' => 'Ingeniería de Sistemas',
                        'semestre' => '10mo',
                        'email' => 'carlos.lopez@email.com',
                        'telefono' => '+591 7 11223344',
                        'ci' => '11223344'
                    ]
                ];
                $this->saveEstudiantes($estudiantes);
                return $estudiantes;
            }
            
            $json = file_get_contents($this->dataFile);
            if ($json === false) {
                throw new \Exception('No se pudo leer el archivo de datos');
            }
            
            $estudiantes = json_decode($json, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Error al decodificar JSON: ' . json_last_error_msg());
            }
            
            return $estudiantes ?: [];
            
        } catch (\Exception $e) {
            // Log del error (en producción usarías un logger real)
            error_log('Error cargando estudiantes: ' . $e->getMessage());
            
            // Retornar array vacío en caso de error
            return [];
        }
    }
    
    // Guardar datos en JSON
    private function saveEstudiantes($estudiantes)
    {
        try {
            // Crear directorio si no existe
            $dir = dirname($this->dataFile);
            if (!is_dir($dir)) {
                if (!mkdir($dir, 0755, true)) {
                    throw new \Exception('No se pudo crear el directorio de datos');
                }
            }
            
            $json = json_encode($estudiantes, JSON_PRETTY_PRINT);
            if ($json === false) {
                throw new \Exception('Error al codificar JSON: ' . json_last_error_msg());
            }
            
            if (file_put_contents($this->dataFile, $json) === false) {
                throw new \Exception('No se pudo escribir el archivo de datos');
            }
            
        } catch (\Exception $e) {
            // Log del error
            error_log('Error guardando estudiantes: ' . $e->getMessage());
            
            // En caso de error, podrías mostrar un mensaje al usuario
            // o usar una estrategia de fallback
            throw $e;
        }
    }
    
    // Obtener siguiente ID
    private function getNextId($estudiantes)
    {
        if (empty($estudiantes)) {
            return 1;
        }
        return max(array_keys($estudiantes)) + 1;
    }

    public function indexAction()
    {
        $request = $this->getRequest();
        $success = $request->getQuery('success');
        $error = $request->getQuery('error');
        
        $estudiantes = $this->loadEstudiantes();
        
        return new ViewModel([
            'titulo' => 'Gestión de Estudiantes',
            'subtitulo' => 'CRUD de Estudiantes - Laminas Framework',
            'mensaje' => 'Gestiona los estudiantes del sistema. Puedes agregar, editar, eliminar y buscar estudiantes.',
            'estudiantes' => array_values($estudiantes),
            'success' => $success,
            'error' => $error
        ]);
    }
    
    public function agregarAction()
    {
        return new ViewModel([
            'titulo' => 'Agregar Estudiante',
            'subtitulo' => 'Formulario de Registro',
            'mensaje' => 'Complete el formulario para agregar un nuevo estudiante al sistema.'
        ]);
    }
    
    public function guardarAction()
    {
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $data = $request->getPost();
            
            // Debug: Log de los datos recibidos
            error_log('Datos recibidos: ' . print_r($data->toArray(), true));
            
            // Validación del servidor
            $errors = [];
            
            if (empty($data['nombre']) || strlen(trim($data['nombre'])) < 3) {
                $errors[] = 'El nombre debe tener al menos 3 caracteres.';
            }
            
            if (empty($data['carrera'])) {
                $errors[] = 'Debe seleccionar una carrera.';
            }
            
            if (empty($data['semestre'])) {
                $errors[] = 'Debe seleccionar un semestre.';
            }
            
            if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'El email no tiene un formato válido.';
            }
            
            if (!empty($data['ci']) && (!is_numeric($data['ci']) || strlen($data['ci']) < 7)) {
                $errors[] = 'El C.I. debe ser numérico y tener al menos 7 dígitos.';
            }
            
            // Si hay errores, mostrar formulario con errores
            if (!empty($errors)) {
                return new ViewModel([
                    'titulo' => 'Agregar Estudiante',
                    'subtitulo' => 'Formulario de Registro',
                    'mensaje' => 'Complete el formulario para agregar un nuevo estudiante al sistema.',
                    'errors' => $errors,
                    'formData' => $data
                ]);
            }
            
            try {
                // Cargar estudiantes existentes
                $estudiantes = $this->loadEstudiantes();
                
                // Guardar estudiante
                $nuevoEstudiante = [
                    'id' => $this->getNextId($estudiantes),
                    'nombre' => trim($data['nombre']),
                    'carrera' => $data['carrera'],
                    'semestre' => $data['semestre'],
                    'email' => trim($data['email'] ?? ''),
                    'telefono' => trim($data['telefono'] ?? ''),
                    'ci' => trim($data['ci'] ?? '')
                ];
                
                $estudiantes[$nuevoEstudiante['id']] = $nuevoEstudiante;
                $this->saveEstudiantes($estudiantes);
                
                // Debug: Log de éxito
                error_log('Estudiante guardado exitosamente: ' . print_r($nuevoEstudiante, true));
                
                // Mensaje de éxito (sin FlashMessenger por ahora)
                // $this->flashMessenger()->addSuccessMessage('¡Estudiante guardado exitosamente!');
                
            } catch (\Exception $e) {
                // En caso de error, mostrar formulario con mensaje de error
                return new ViewModel([
                    'titulo' => 'Agregar Estudiante',
                    'subtitulo' => 'Formulario de Registro',
                    'mensaje' => 'Complete el formulario para agregar un nuevo estudiante al sistema.',
                    'errors' => ['Error al guardar el estudiante: ' . $e->getMessage()],
                    'formData' => $data
                ]);
            }
            
            // Redirigir con mensaje de éxito (FlashMessenger ya agregó el mensaje)
            return $this->redirect()->toRoute('estudiante');
        }
        
        return $this->redirect()->toRoute('estudiante');
    }
    
    public function editarAction()
    {
        $id = (int) $this->params()->fromRoute('id');
        $estudiantes = $this->loadEstudiantes();
        
        $estudiante = $estudiantes[$id] ?? null;
        
        if (!$estudiante) {
            return $this->redirect()->toRoute('estudiante', [], ['query' => ['error' => 'no_encontrado']]);
        }
        
        return new ViewModel([
            'titulo' => 'Editar Estudiante',
            'subtitulo' => 'Modificar Información',
            'mensaje' => 'Modifique los datos del estudiante según sea necesario.',
            'estudiante' => $estudiante
        ]);
    }
    
    public function actualizarAction()
    {
        $id = (int) $this->params()->fromRoute('id');
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $data = $request->getPost();
            
            // Cargar estudiantes existentes
            $estudiantes = $this->loadEstudiantes();
            
            // Verificar que el estudiante existe
            if (!isset($estudiantes[$id])) {
                return $this->redirect()->toRoute('estudiante', [], ['query' => ['error' => 'no_encontrado']]);
            }
            
            // Validación del servidor
            $errors = [];
            
            if (empty($data['nombre']) || strlen(trim($data['nombre'])) < 3) {
                $errors[] = 'El nombre debe tener al menos 3 caracteres.';
            }
            
            if (empty($data['carrera'])) {
                $errors[] = 'Debe seleccionar una carrera.';
            }
            
            if (empty($data['semestre'])) {
                $errors[] = 'Debe seleccionar un semestre.';
            }
            
            if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'El email no tiene un formato válido.';
            }
            
            if (!empty($data['ci']) && (!is_numeric($data['ci']) || strlen($data['ci']) < 7)) {
                $errors[] = 'El C.I. debe ser numérico y tener al menos 7 dígitos.';
            }
            
            // Si hay errores, mostrar formulario con errores
            if (!empty($errors)) {
                return new ViewModel([
                    'titulo' => 'Editar Estudiante',
                    'subtitulo' => 'Modificar Información',
                    'mensaje' => 'Modifique los datos del estudiante según sea necesario.',
                    'estudiante' => $estudiantes[$id],
                    'errors' => $errors,
                    'formData' => $data
                ]);
            }
            
            try {
                // Actualizar estudiante
                $estudiantes[$id] = [
                    'id' => $id,
                    'nombre' => trim($data['nombre']),
                    'carrera' => $data['carrera'],
                    'semestre' => $data['semestre'],
                    'email' => trim($data['email'] ?? ''),
                    'telefono' => trim($data['telefono'] ?? ''),
                    'ci' => trim($data['ci'] ?? '')
                ];
                
                $this->saveEstudiantes($estudiantes);
                
                // Mensaje de éxito (sin FlashMessenger por ahora)
                // $this->flashMessenger()->addSuccessMessage('¡Estudiante actualizado exitosamente!');
                
            } catch (\Exception $e) {
                // En caso de error, mostrar formulario con mensaje de error
                return new ViewModel([
                    'titulo' => 'Editar Estudiante',
                    'subtitulo' => 'Modificar Información',
                    'mensaje' => 'Modifique los datos del estudiante según sea necesario.',
                    'estudiante' => $estudiantes[$id],
                    'errors' => ['Error al actualizar el estudiante: ' . $e->getMessage()],
                    'formData' => $data
                ]);
            }
            
            // Redirigir con mensaje de éxito (FlashMessenger ya agregó el mensaje)
            return $this->redirect()->toRoute('estudiante');
        }
        
        return $this->redirect()->toRoute('estudiante');
    }
    
    public function eliminarAction()
    {
        $id = (int) $this->params()->fromRoute('id');
        
        try {
            // Cargar estudiantes existentes
            $estudiantes = $this->loadEstudiantes();
            
            // Verificar que el estudiante existe
            if (!isset($estudiantes[$id])) {
                return $this->redirect()->toRoute('estudiante', [], ['query' => ['error' => 'no_encontrado']]);
            }
            
            // Obtener nombre del estudiante para el mensaje
            $nombreEstudiante = $estudiantes[$id]['nombre'];
            
            // Eliminar estudiante
            unset($estudiantes[$id]);
            $this->saveEstudiantes($estudiantes);
            
            // Redirigir con mensaje de éxito
            return $this->redirect()->toRoute('estudiante', [], ['query' => ['success' => 'eliminado', 'nombre' => urlencode($nombreEstudiante)]]);
            
        } catch (\Exception $e) {
            // En caso de error, redirigir con mensaje de error
            return $this->redirect()->toRoute('estudiante', [], ['query' => ['error' => 'eliminar_error']]);
        }
    }
}
