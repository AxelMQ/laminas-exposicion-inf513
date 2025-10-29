# 🏭 ¿Qué son las Factories en Laminas?

## 🎯 El problema que tenías

**Error:** `Unable to resolve service "Application\Controller\IndexController" to a factory`

**Causa:** Laminas no sabía cómo crear instancias de tus controladores.

## 🔍 ¿Qué son las Factories?

### 1. **Patrón Factory**
Una Factory es una función que **crea objetos** cuando Laminas los necesita.

```php
// Factory simple
'Application\Controller\IndexController' => function($container) {
    return new \Application\Controller\IndexController();
},
```

### 2. **¿Por qué son necesarias?**

Laminas usa **Inyección de Dependencias**:
- No crea objetos directamente con `new`
- Usa factories para crear objetos cuando los necesita
- Permite inyectar dependencias automáticamente

## 🏗️ Cómo funcionan las Factories

### 1. **Flujo de creación:**
```
1. Usuario → http://localhost:8080/
2. Router → "Necesito IndexController"
3. ServiceManager → "Busco factory para IndexController"
4. Factory → "Creo nueva instancia de IndexController"
5. Controller → Ejecuta indexAction()
```

### 2. **Configuración en module.config.php:**
```php
'controllers' => [
    'factories' => [
        'Application\Controller\IndexController' => function($container) {
            return new \Application\Controller\IndexController();
        },
        'Application\Controller\EstudianteController' => function($container) {
            return new \Application\Controller\EstudianteController();
        },
    ],
],
```

## 🔧 Tipos de Factories

### 1. **Factory con función anónima (lo que usamos):**
```php
'Application\Controller\IndexController' => function($container) {
    return new \Application\Controller\IndexController();
},
```

### 2. **Factory con clase (más complejo):**
```php
'Application\Controller\IndexController' => 'Application\Factory\IndexControllerFactory',
```

### 3. **Factory lazy (automática):**
```php
'Application\Controller\IndexController' => 'Laminas\Mvc\Controller\LazyControllerFactory',
```

## 🎯 ¿Por qué usamos funciones anónimas?

### Ventajas:
- **Simple** - Fácil de entender
- **Directo** - No necesita clases adicionales
- **Funciona** - Resuelve el problema inmediatamente

### Ejemplo:
```php
// ✅ Simple y directo
'Application\Controller\IndexController' => function($container) {
    return new \Application\Controller\IndexController();
},

// ❌ Más complejo (necesita clase Factory)
'Application\Controller\IndexController' => 'Application\Factory\IndexControllerFactory',
```

## 🔍 ¿Qué es el parámetro $container?

### El ServiceManager:
```php
function($container) {
    // $container es el ServiceManager
    // Puedes obtener otros servicios:
    $db = $container->get('Database');
    $logger = $container->get('Logger');
    
    return new \Application\Controller\IndexController($db, $logger);
}
```

### Para controladores simples:
```php
function($container) {
    // No necesitamos dependencias, solo crear el controlador
    return new \Application\Controller\IndexController();
}
```

## 📚 Comparación con otros frameworks

### Laravel (Automático):
```php
class IndexController extends Controller
{
    // Laravel crea automáticamente la instancia
}
```

### Symfony (Automático):
```php
class IndexController extends AbstractController
{
    // Symfony crea automáticamente la instancia
}
```

### Laminas (Manual):
```php
// En module.config.php
'Application\Controller\IndexController' => function($container) {
    return new \Application\Controller\IndexController();
},
```

## 🚀 Estado actual

### ✅ Configuración correcta:
```php
'controllers' => [
    'factories' => [
        'Application\Controller\IndexController' => function($container) {
            return new \Application\Controller\IndexController();
        },
        'Application\Controller\EstudianteController' => function($container) {
            return new \Application\Controller\EstudianteController();
        },
    ],
],
```

### 🌐 URLs funcionando:
- http://localhost:8080/ - Página principal
- http://localhost:8080/estudiante - Gestión de estudiantes
- http://localhost:8080/info - Información del sistema

## 📝 Resumen

### ¿Qué son las Factories?
- **Funciones que crean objetos** cuando Laminas los necesita
- **Necesarias para inyección de dependencias**
- **Configuradas en module.config.php**

### ¿Por qué las necesitas?
- **Laminas no crea objetos directamente**
- **Usa factories para crear controladores**
- **Permite inyectar dependencias automáticamente**

### Configuración simple:
```php
'Application\Controller\IndexController' => function($container) {
    return new \Application\Controller\IndexController();
},
```

**Las Factories son la forma en que Laminas crea objetos. Sin ellas, no puede instanciar tus controladores.**
