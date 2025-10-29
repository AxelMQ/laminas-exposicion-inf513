# 🚀 Cómo Crear un Proyecto Laminas Framework desde Cero

## 🎯 Introducción

Esta guía explica paso a paso cómo crear un nuevo proyecto con Laminas Framework desde cero, incluyendo la configuración inicial, estructura de archivos y primeros pasos.

## 📋 Prerrequisitos

- **PHP 7.4+** (recomendado PHP 8.2+)
- **Composer** instalado y funcionando
- **Git** (opcional pero recomendado)

## 🛠️ Creación del Proyecto

### Método 1: Usando el Skeleton de Laminas (Recomendado)

#### 1. Crear el proyecto base
```bash
# Crear proyecto con skeleton de Laminas
composer create-project laminas/laminas-mvc-skeleton mi-proyecto-laminas

# Navegar al directorio
cd mi-proyecto-laminas
```

#### 2. Verificar la instalación
```bash
# Verificar que todo esté correcto
composer check-platform-reqs

# Iniciar servidor de desarrollo
php -S localhost:8080 -t public
```

#### 3. Acceder al proyecto
- Abrir navegador en: http://localhost:8080
- Deberías ver la página de bienvenida de Laminas

### Método 2: Instalación Manual (Avanzado)

#### 1. Crear directorio del proyecto
```bash
mkdir mi-proyecto-laminas
cd mi-proyecto-laminas
```

#### 2. Inicializar Composer
```bash
composer init
# Seguir las instrucciones interactivas
```

#### 3. Instalar Laminas MVC
```bash
composer require laminas/laminas-mvc
composer require laminas/laminas-router
composer require laminas/laminas-view
composer require laminas/laminas-servicemanager
composer require laminas/laminas-modulemanager
```

#### 4. Crear estructura básica
```bash
mkdir -p config
mkdir -p module/Application/src/Controller
mkdir -p module/Application/view
mkdir -p public
mkdir -p data
```

## 📁 Estructura del Proyecto Creado

```
mi-proyecto-laminas/
├── 📁 config/
│   ├── application.config.php      # Configuración principal
│   └── development.config.php      # Configuración de desarrollo
├── 📁 data/
│   └── cache/                      # Cache del sistema
├── 📁 module/
│   └── 📁 Application/
│       ├── 📁 config/
│       │   └── module.config.php   # Configuración del módulo
│       ├── 📁 src/
│       │   └── 📁 Controller/
│       │       └── IndexController.php
│       ├── 📁 view/
│       │   └── 📁 application/
│       │       └── 📁 index/
│       │           └── index.phtml
│       └── Module.php              # Clase del módulo
├── 📁 public/
│   ├── index.php                   # Punto de entrada
│   └── .htaccess                   # Configuración Apache
├── 📁 vendor/                      # Dependencias (ignorar en Git)
├── 📄 composer.json                # Dependencias PHP
├── 📄 composer.lock                # Versiones bloqueadas
└── 📄 .gitignore                   # Archivos a ignorar en Git
```

## ⚙️ Configuración Inicial

### 1. Archivo `config/application.config.php`
```php
<?php
return [
    'modules' => [
        'Laminas\Router',
        'Application',
    ],
    'module_listener_options' => [
        'module_paths' => [
            './module',
            './vendor',
        ],
        'config_glob_paths' => [
            'config/autoload/{{,*.}global,{,*.}local}.php',
        ],
        'config_cache_enabled' => false,
        'config_cache_key' => 'application.config.cache',
        'module_map_cache_enabled' => false,
        'module_map_cache_key' => 'application.module.cache',
        'cache_dir' => 'data/cache',
        'check_dependencies' => true,
    ],
];
```

### 2. Archivo `module/Application/config/module.config.php`
```php
<?php
namespace Application;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
```

### 3. Archivo `module/Application/Module.php`
```php
<?php
namespace Application;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
```

### 4. Archivo `public/index.php`
```php
<?php
use Laminas\Mvc\Application;
use Laminas\Stdlib\ArrayUtils;

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

if (! class_exists(Application::class)) {
    throw new RuntimeException(
        "Unable to load application.\n"
        . "- Type `composer install` if you want to install dependencies\n"
        . "- Type `composer require laminas/laminas-mvc` if you want to install Laminas MVC"
    );
}

$appConfig = require 'config/application.config.php';

if (file_exists('config/development.config.php')) {
    $appConfig = ArrayUtils::merge($appConfig, require 'config/development.config.php');
}

Application::init($appConfig)->run();
```

## 🎯 Primeros Pasos

### 1. Crear un Controlador
```php
<?php
// module/Application/src/Controller/IndexController.php
namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel([
            'message' => '¡Hola desde Laminas Framework!'
        ]);
    }
}
```

### 2. Crear una Vista
```html
<!-- module/Application/view/application/index/index.phtml -->
<h1><?= $this->escapeHtml($message) ?></h1>
<p>Bienvenido a tu primer proyecto Laminas Framework</p>
```

### 3. Crear un Layout
```html
<!-- module/Application/view/layout/layout.phtml -->
<!DOCTYPE html>
<html>
<head>
    <title>Mi Proyecto Laminas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?= $this->content ?>
    </div>
</body>
</html>
```

## 🔧 Comandos Útiles

### Desarrollo
```bash
# Iniciar servidor de desarrollo
php -S localhost:8080 -t public

# Verificar dependencias
composer check-platform-reqs

# Actualizar dependencias
composer update

# Regenerar autoloader
composer dump-autoload
```

### Git (Opcional)
```bash
# Inicializar repositorio
git init

# Agregar archivos
git add .

# Primer commit
git commit -m "Initial commit: Laminas Framework project"

# Conectar con repositorio remoto
git remote add origin https://github.com/usuario/mi-proyecto-laminas.git
git push -u origin main
```

## 📦 Agregar Módulos Adicionales

### Módulos Comunes
```bash
# Formularios
composer require laminas/laminas-form

# Validación
composer require laminas/laminas-validator

# Base de datos
composer require laminas/laminas-db

# Autenticación
composer require laminas/laminas-authentication

# Autorización
composer require laminas/laminas-permissions-rbac

# API REST
composer require laminas/laminas-api-tools
```

### Configurar Módulos
```php
// config/application.config.php
'modules' => [
    'Laminas\Router',
    'Laminas\Form',
    'Laminas\Validator',
    'Laminas\Db',
    'Application',
],
```

## 🐛 Solución de Problemas Comunes

### Error: "Class not found"
```bash
# Regenerar autoloader
composer dump-autoload
```

### Error: "Module not found"
```bash
# Verificar que el módulo esté en composer.json
composer require laminas/laminas-module-name
```

### Error: "Route not found"
```bash
# Verificar configuración de rutas en module.config.php
# Asegurarse de que el controlador existe
```

### Error: "View not found"
```bash
# Verificar que el archivo .phtml existe
# Verificar configuración en template_map
```

## 🎯 Próximos Pasos

### 1. Crear más Controladores
- Agregar rutas en `module.config.php`
- Crear controladores en `src/Controller/`
- Crear vistas correspondientes

### 2. Agregar Base de Datos
- Instalar `laminas/laminas-db`
- Configurar conexión
- Crear modelos

### 3. Implementar Autenticación
- Instalar `laminas/laminas-authentication`
- Crear sistema de login
- Proteger rutas

### 4. Agregar API REST
- Instalar `laminas/laminas-api-tools`
- Crear endpoints
- Documentar API

## 📚 Recursos Adicionales

- **Documentación oficial:** https://docs.laminas.dev/
- **Tutoriales:** https://docs.laminas.dev/tutorials/
- **Ejemplos:** https://github.com/laminas/laminas-mvc-skeleton
- **Comunidad:** https://discourse.laminas.dev/

## ✅ Verificación Final

Después de seguir esta guía, deberías tener:

- [ ] Proyecto Laminas funcionando
- [ ] Servidor de desarrollo corriendo
- [ ] Página de bienvenida visible
- [ ] Estructura de archivos correcta
- [ ] Controlador y vista básicos
- [ ] Layout configurado

¡Tu proyecto Laminas Framework está listo para desarrollo!
