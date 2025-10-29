# 🎓 Sistema de Gestión de Estudiantes - Laminas Framework

## 📋 Información del Proyecto

**Universidad:** Universidad Autónoma "Gabriel René Moreno"  
**Facultad:** Ingeniería en Ciencias de la Computación y Telecomunicación  
**Materia:** INF513-SC - Exposiciones  
**Modalidad:** Exposición  
**Gestión:** 2025-2  
**Línea de Investigación:** Tecnologías Web y Frameworks de Desarrollo  

## 🚀 Descripción

Sistema web desarrollado con **Laminas Framework** que demuestra las capacidades de este framework modular para PHP. El proyecto implementa una arquitectura MVC robusta y muestra las mejores prácticas en el desarrollo de aplicaciones web empresariales.

## ✨ Características Implementadas

- 🏗️ **Arquitectura MVC** - Separación clara de responsabilidades
- 📦 **Framework Modular** - Solo instala los componentes necesarios
- 🎨 **Interfaz Responsive** - Diseño moderno con Bootstrap 5
- 🔒 **Seguridad Integrada** - Escape de HTML y validación de datos
- 📱 **Diseño Adaptativo** - Compatible con dispositivos móviles
- ⚡ **Alto Rendimiento** - Optimizado para aplicaciones empresariales
- 🌍 **Multiplataforma** - Detección automática del sistema operativo

## 🛠️ Tecnologías Utilizadas

### Backend
- **PHP 8.2+** - Lenguaje de programación
- **Laminas Framework 3.8+** - Framework modular para PHP
- **Composer** - Gestor de dependencias

### Frontend
- **Bootstrap 5.1.3** - Framework CSS
- **Font Awesome 6.0** - Iconografía
- **HTML5** - Estructura semántica

## 🚀 Instalación y Configuración

### Prerrequisitos
- **PHP 7.4+** (recomendado PHP 8.2+)
- **Composer** - Gestor de dependencias
- **Servidor Web** (Apache/Nginx) o PHP Built-in Server

### Instalación Rápida

```bash
# 1. Clonar el repositorio
git clone https://github.com/AxelMQ/laminas-exposicion-inf513.git
cd laminas-exposicion-inf513

# 2. Instalar dependencias
composer install

# 3. Ejecutar servidor de desarrollo
php -S localhost:8080 -t public
```

### Acceso a la Aplicación
- **Página principal:** http://localhost:8080/
- **Gestión de estudiantes:** http://localhost:8080/estudiante
- **Información del sistema:** http://localhost:8080/info

## 📁 Estructura del Proyecto

```
laminas-exposicion-inf513/
├── 📁 config/
│   └── application.config.php          # Configuración principal
├── 📁 module/
│   └── 📁 Application/
│       ├── 📁 config/
│       │   └── module.config.php       # Configuración del módulo
│       ├── 📁 src/
│       │   └── 📁 Controller/
│       │       ├── IndexController.php # Controlador principal
│       │       └── EstudianteController.php # Controlador de estudiantes
│       └── 📁 view/
│           ├── 📁 layout/
│           │   └── layout.phtml        # Layout principal
│           ├── 📁 application/
│           │   ├── 📁 index/
│           │   │   ├── index.phtml     # Vista principal
│           │   │   └── info.phtml      # Vista de información
│           │   └── 📁 estudiante/
│           │       └── index.phtml     # Vista de estudiantes
│           └── 📁 error/
│               ├── 404.phtml           # Error 404
│               └── index.phtml         # Error general
├── 📁 public/
│   └── index.php                       # Punto de entrada
├── 📁 vendor/                          # Dependencias (ignorado en Git)
├── composer.json                       # Configuración de dependencias
├── composer.lock                       # Versiones bloqueadas
├── .gitignore                          # Archivos ignorados por Git
└── README.md                           # Este archivo
```

## 🎯 Funcionalidades Implementadas

### 🏠 Página Principal
- **Ruta:** `/`
- **Controlador:** `IndexController::indexAction()`
- **Descripción:** Página de bienvenida con información del sistema
- **Características:**
  - Interfaz moderna con Bootstrap
  - Navegación intuitiva
  - Información del proyecto

### ℹ️ Página de Información
- **Ruta:** `/info`
- **Controlador:** `IndexController::infoAction()`
- **Descripción:** Detalles técnicos del sistema
- **Características:**
  - Información de PHP y Laminas Framework
  - Detección automática del sistema operativo
  - Arquitectura del proyecto
  - Características técnicas

### 👥 Gestión de Estudiantes
- **Ruta:** `/estudiante`
- **Controlador:** `EstudianteController::indexAction()`
- **Descripción:** CRUD de estudiantes (interfaz preparada)
- **Características:**
  - Listado de estudiantes de ejemplo
  - Interfaz responsive
  - Botones de acción (agregar, editar, eliminar)

## 🔧 Configuración Técnica

### Dependencias Principales
```json
{
    "require": {
        "php": "^7.4 || ^8.0",
        "laminas/laminas-mvc": "^3.7",
        "laminas/laminas-form": "^3.0",
        "laminas/laminas-db": "^2.15",
        "laminas/laminas-validator": "^2.16",
        "laminas/laminas-inputfilter": "^2.17",
        "laminas/laminas-router": "^3.7"
    }
}
```

### Configuración de Módulos
```php
// config/application.config.php
return [
    'modules' => [
        'Laminas\Router',  // Sistema de rutas
        'Application',     // Módulo personalizado
    ],
    // ... más configuración
];
```

## 🏗️ Arquitectura del Sistema

### Patrón MVC
```
┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐
│      VIEW       │    │   CONTROLLER    │    │      MODEL      │
│                 │    │                 │    │                 │
│  - Templates    │◄──►│  - Lógica       │◄──►│  - Datos        │
│  - Bootstrap    │    │  - Peticiones   │    │  - Validación   │
│  - HTML/CSS     │    │  - Respuestas   │    │  - Persistencia │
└─────────────────┘    └─────────────────┘    └─────────────────┘
```

### Flujo de Peticiones
1. **Petición HTTP** → `public/index.php`
2. **Bootstrap** → Carga de configuración y módulos
3. **Router** → Resolución de rutas
4. **Controller** → Procesamiento de lógica
5. **View** → Renderizado de respuesta
6. **Response** → Envío al cliente

## 📊 Estado del Proyecto

### ✅ Completado
- [x] Configuración inicial de Laminas Framework
- [x] Estructura MVC básica
- [x] Página principal funcional
- [x] Página de información del sistema
- [x] Interfaz responsive con Bootstrap
- [x] Configuración de rutas
- [x] Gestión de dependencias con Composer
- [x] Layout común y templates de error
- [x] Detección automática del sistema operativo
- [x] Documentación completa

### 🚧 En Desarrollo
- [ ] Modelos de datos para estudiantes
- [ ] Formularios con validación
- [ ] Integración con base de datos
- [ ] Sistema de autenticación

### 📋 Pendiente
- [ ] Pruebas unitarias
- [ ] Documentación de API
- [ ] Optimización de rendimiento
- [ ] Despliegue en producción

## 🎓 Objetivos Académicos

### Objetivo General
Analizar las características técnicas, arquitectura modular y capacidades de implementación de Laminas Framework para determinar su idoneidad en el desarrollo de aplicaciones web empresariales.

### Objetivos Específicos
1. ✅ Evaluar la arquitectura modular de Laminas Framework
2. ✅ Examinar los componentes principales del framework
3. ✅ Implementar una aplicación de demostración
4. 🔄 Comparar con otros frameworks PHP populares
5. 🔄 Identificar ventajas y desventajas específicas
6. ✅ Documentar mejores prácticas de implementación

## 🔍 Análisis Técnico

### Ventajas de Laminas Framework
- **Modularidad:** Solo instala componentes necesarios
- **Flexibilidad:** Control total sobre la arquitectura
- **Estándares:** Cumple con PSR-4, PSR-7, PSR-11
- **Madurez:** Evolución de Zend Framework
- **Comunidad:** Soporte activo y documentación extensa

### Casos de Uso Ideales
- Aplicaciones empresariales complejas
- Sistemas que requieren alta personalización
- Proyectos de larga duración
- Integración con sistemas legacy

## 🚀 Comandos Útiles

### Desarrollo
```bash
# Iniciar servidor de desarrollo
php -S localhost:8080 -t public

# Verificar dependencias
composer check-platform-reqs

# Actualizar dependencias
composer update

# Limpiar autoloader
composer dump-autoload
```

### Git
```bash
# Clonar repositorio
git clone https://github.com/AxelMQ/laminas-exposicion-inf513.git

# Instalar dependencias
composer install

# Ejecutar aplicación
php -S localhost:8080 -t public
```

## 📚 Documentación Adicional

El proyecto incluye documentación detallada:

- `ANALISIS_ESTRUCTURA.md` - Análisis completo de la estructura
- `COMO_FUNCIONA_MVC.md` - Explicación del patrón MVC
- `EXPLICACION_ERRORES.md` - Solución de problemas comunes
- `INSTRUCCIONES_EJECUCION.md` - Guía de instalación y ejecución
- `MODULOS_VS_BIBLIOTECAS.md` - Diferencia entre módulos y bibliotecas
- `QUE_SON_LAS_FACTORIES.md` - Explicación de las factories

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 📞 Contacto

Para preguntas sobre este proyecto académico, contactar a:
- **GitHub:** [AxelMQ](https://github.com/AxelMQ)
- **Universidad:** Universidad Autónoma "Gabriel René Moreno"
- **Materia:** INF513-SC - Exposiciones

---

*Desarrollado con ❤️ para la exposición de INF513-SC - Laminas Framework*
