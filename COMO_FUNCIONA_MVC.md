# 🏗️ Cómo funciona el MVC en este proyecto Laminas

## 🎯 Flujo completo del MVC

### 1. **Petición HTTP** → `public/index.php`
```
Usuario → http://localhost:8080/info
```

### 2. **Bootstrap** → `config/application.config.php`
```php
'modules' => [
    'Laminas\Router',  // Carga el sistema de rutas
    'Application',     // Carga tu módulo
],
```

### 3. **Router** → `module/Application/config/module.config.php`
```php
'info' => [
    'type' => 'Literal',
    'options' => [
        'route' => '/info',
        'defaults' => [
            'controller' => 'Application\Controller\IndexController',
            'action' => 'info',
        ],
    ],
],
```
**Resultado:** "La URL `/info` va al `IndexController::infoAction()`"

### 4. **Controller** → `module/Application/src/Controller/IndexController.php`
```php
public function infoAction()
{
    return new ViewModel([
        'php_version' => phpversion(),
        'laminas_version' => '3.8.0',
        'servidor' => 'Windows + XAMPP',  // ← Datos hardcodeados
        'framework' => 'Laminas Framework',
        'caracteristicas' => [
            'Arquitectura MVC',
            'Formularios con validación',
            // ... más características
        ]
    ]);
}
```
**Resultado:** Prepara datos para la vista

### 5. **View** → `module/Application/view/application/index/info.phtml`
```php
<h1><?= $this->escapeHtml($titulo) ?></h1>
<p>PHP Version: <?= $this->escapeHtml($php_version) ?></p>
<p>Servidor: <?= $this->escapeHtml($servidor) ?></p>
```
**Resultado:** Renderiza HTML con los datos

### 6. **Layout** → `module/Application/view/layout/layout.phtml`
```php
<!DOCTYPE html>
<html>
<head>
    <title><?= $this->headTitle() ?></title>
</head>
<body>
    <nav>...</nav>
    <?= $this->content ?>  <!-- ← Vista insertada aquí -->
    <footer>...</footer>
</body>
</html>
```
**Resultado:** HTML completo enviado al navegador

## 🔄 Flujo visual del MVC

```
┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐
│      VIEW       │    │   CONTROLLER    │    │      MODEL      │
│                 │    │                 │    │                 │
│  - info.phtml   │◄──►│  - infoAction() │◄──►│  - Datos        │
│  - layout.phtml │    │  - ViewModel    │    │  - phpversion() │
│  - Bootstrap    │    │  - Lógica       │    │  - Hardcodeados │
└─────────────────┘    └─────────────────┘    └─────────────────┘
```

## 📊 Separación de responsabilidades

### 🎨 **Vista (View)**
- **Archivos:** `.phtml` en `view/`
- **Responsabilidad:** Mostrar datos al usuario
- **Tecnologías:** HTML, CSS, Bootstrap, PHP
- **Ejemplo:**
```php
<h1><?= $this->escapeHtml($titulo) ?></h1>
<p>PHP Version: <?= $this->escapeHtml($php_version) ?></p>
```

### 🎮 **Controlador (Controller)**
- **Archivos:** `.php` en `src/Controller/`
- **Responsabilidad:** Procesar peticiones y preparar datos
- **Tecnologías:** PHP, Laminas MVC
- **Ejemplo:**
```php
public function infoAction()
{
    return new ViewModel([
        'php_version' => phpversion(),
        'servidor' => 'Windows + XAMPP',
    ]);
}
```

### 📦 **Modelo (Model)**
- **Archivos:** `.php` en `src/Model/` (futuro)
- **Responsabilidad:** Acceso a datos y lógica de negocio
- **Tecnologías:** PHP, Base de datos
- **Ejemplo actual:** Datos hardcodeados en el controlador

## 🔍 Análisis del código actual

### ✅ Lo que está bien implementado:
1. **Separación clara** - Vista, Controlador, Layout separados
2. **Rutas configuradas** - URLs mapeadas a controladores
3. **Factories** - Controladores se crean correctamente
4. **Layout común** - HTML reutilizable
5. **Seguridad** - Uso de `escapeHtml()`

### ⚠️ Lo que se puede mejorar:
1. **Datos hardcodeados** - Información del servidor estática
2. **Sin Modelo** - No hay capa de datos
3. **Sin base de datos** - No hay persistencia

## 🎯 Respuesta a tu pregunta

### ¿Por qué hay datos hardcodeados?

**Actualmente:**
```php
'servidor' => 'Windows + XAMPP',  // ← Hardcodeado
```

**Problema:** No se adapta a diferentes sistemas operativos.

### ¿Cómo hacerlo dinámico?

**Solución:** Detectar el sistema operativo automáticamente:

```php
public function infoAction()
{
    $os = php_uname('s');  // Sistema operativo
    $server = $_SERVER['SERVER_SOFTWARE'] ?? 'PHP Built-in Server';
    
    return new ViewModel([
        'php_version' => phpversion(),
        'laminas_version' => '3.8.0',
        'servidor' => $os . ' + ' . $server,  // ← Dinámico
        'framework' => 'Laminas Framework',
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
```

## 🚀 Próximos pasos

### 1. **Hacer dinámica la detección del servidor**
### 2. **Crear modelos** para acceso a datos
### 3. **Implementar base de datos** para persistencia
### 4. **Agregar formularios** con validación

¿Quieres que implemente la detección dinámica del sistema operativo?
