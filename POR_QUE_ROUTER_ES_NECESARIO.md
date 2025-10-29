# 🛣️ ¿Por qué Laminas\Router es necesario?

## 🎯 El problema

**Error:** `Unable to resolve service "Router" to a factory`

**Causa:** Laminas MVC necesita el módulo Router para funcionar.

## 🔍 ¿Por qué es necesario?

### 1. **Laminas MVC depende de Router**

Laminas MVC (Model-View-Controller) necesita saber:
- ¿Qué URL se está solicitando?
- ¿Qué controlador debe ejecutar?
- ¿Qué acción debe llamar?

**Sin Router, MVC no puede funcionar.**

### 2. **Flujo de una petición**

```
1. Usuario → http://localhost:8080/estudiante
2. Router → "Esta URL va al EstudianteController"
3. MVC → Ejecuta EstudianteController::indexAction()
4. Vista → Renderiza la respuesta
```

**Sin Router, el paso 2 falla.**

### 3. **Router proporciona el servicio "Router"**

```php
// Laminas MVC busca este servicio
$router = $serviceManager->get('Router');

// Si no está disponible → ERROR
```

## 📚 ¿Qué hace Laminas\Router?

### 1. **Mapea URLs a controladores**

```php
// En module.config.php
'router' => [
    'routes' => [
        'home' => [
            'type' => 'Literal',
            'options' => [
                'route' => '/',
                'defaults' => [
                    'controller' => 'Application\Controller\IndexController',
                    'action' => 'index',
                ],
            ],
        ],
        'estudiante' => [
            'type' => 'Segment',
            'options' => [
                'route' => '/estudiante[/:action[/:id]]',
                'defaults' => [
                    'controller' => 'Application\Controller\EstudianteController',
                    'action' => 'index',
                ],
            ],
        ],
    ],
],
```

### 2. **Resuelve rutas dinámicas**

```
/estudiante → EstudianteController::indexAction()
/estudiante/agregar → EstudianteController::agregarAction()
/estudiante/editar/5 → EstudianteController::editarAction() con id=5
```

### 3. **Proporciona servicios**

- `Router` - Servicio principal de enrutamiento
- `RoutePluginManager` - Gestión de tipos de rutas
- `HttpRouter` - Enrutador HTTP específico

## 🔧 Configuración correcta

### ✅ Configuración que funciona:
```php
'modules' => [
    'Laminas\Router',  // ✅ Necesario para enrutamiento
    'Application',     // ✅ Tu módulo personalizado
],
```

### ❌ Configuración que NO funciona:
```php
'modules' => [
    'Application',  // ❌ Sin Router, no puede enrutar URLs
],
```

## 🎓 ¿Por qué otros módulos no son necesarios?

### Módulos opcionales:
- `Laminas\Form` - Solo si usas formularios
- `Laminas\Db` - Solo si usas base de datos
- `Laminas\Validator` - Solo si usas validación

### Módulos necesarios:
- `Laminas\Router` - **SIEMPRE necesario** para MVC
- `Application` - Tu módulo personalizado

## 🚀 Estado actual

### ✅ Configuración correcta:
```php
'modules' => [
    'Laminas\Router',  // ✅ Proporciona servicio Router
    'Application',     // ✅ Tu módulo con rutas
],
```

### 🌐 URLs funcionando:
- http://localhost:8080/ - Página principal
- http://localhost:8080/estudiante - Gestión de estudiantes
- http://localhost:8080/info - Información del sistema

## 📝 Resumen

### ¿Por qué Router es necesario?
1. **Laminas MVC lo requiere** - Sin Router, MVC no puede funcionar
2. **Proporciona el servicio Router** - Que MVC necesita para enrutar URLs
3. **Mapea URLs a controladores** - Es la base del sistema de rutas
4. **Es un módulo real** - Tiene configuración de módulo propia

### Configuración mínima correcta:
```php
'modules' => [
    'Laminas\Router',  // ✅ Necesario para MVC
    'Application',     // ✅ Tu módulo
],
```

**Router es el único módulo de Laminas que es absolutamente necesario para que funcione un proyecto MVC básico.**
