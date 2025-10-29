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

## ✨ Características Principales

- 🏗️ **Arquitectura MVC** - Separación clara de responsabilidades
- 📦 **Framework Modular** - Solo instala los componentes necesarios
- 🎨 **Interfaz Responsive** - Diseño moderno con Bootstrap 5
- 🔒 **Seguridad Integrada** - Escape de HTML y validación de datos
- 📱 **Diseño Adaptativo** - Compatible con dispositivos móviles
- ⚡ **Alto Rendimiento** - Optimizado para aplicaciones empresariales

## 🛠️ Tecnologías Utilizadas

### Backend
- **PHP 8.2+** - Lenguaje de programación
- **Laminas Framework 3.8+** - Framework modular para PHP
- **Composer** - Gestor de dependencias

### Frontend
- **Bootstrap 5.1.3** - Framework CSS
- **Font Awesome 6.0** - Iconografía
- **HTML5** - Estructura semántica

### Herramientas de Desarrollo
- **Composer** - Gestión de dependencias
- **PSR-4** - Estándar de autoloading
- **Git** - Control de versiones

## 📁 Estructura del Proyecto

```
laminas-exposicion-inf513/
├── 📁 config/
│   └── application.config.php          # Configuración principal
├── 📁 data/                            # Directorio de datos
├── 📁 module/
│   └── 📁 Application/
│       ├── 📁 config/
│       │   └── module.config.php       # Configuración del módulo
│       ├── 📁 src/
│       │   └── 📁 Controller/
│       │       └── IndexController.php # Controlador principal
│       └── 📁 view/
│           └── 📁 application/
│               └── 📁 index/
│                   ├── index.phtml     # Vista principal
│                   └── info.phtml      # Vista de información
├── 📁 public/
│   └── index.php                       # Punto de entrada
├── 📁 vendor/                          # Dependencias (Composer)
├── composer.json                       # Configuración de dependencias
├── composer.lock                       # Versiones bloqueadas
└── README.md                          # Este archivo
```

## 🚀 Instalación y Configuración

### Prerrequisitos

- **PHP 7.4+** (recomendado PHP 8.2+)
- **Composer** - Gestor de dependencias
- **Servidor Web** (Apache/Nginx) o PHP Built-in Server

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone [URL_DEL_REPOSITORIO]
   cd laminas-exposicion-inf513
   ```

2. **Instalar dependencias**
   ```bash
   composer install
   ```

3. **Configurar permisos** (Linux/Mac)
   ```bash
   chmod -R 755 data/
   chmod -R 755 public/
   ```

4. **Ejecutar el servidor de desarrollo**
   ```bash
   php -S localhost:8080 -t public
   ```

5. **Acceder a la aplicación**
   ```
   http://localhost:8080
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
  - Arquitectura del proyecto
  - Características técnicas

### 👥 Gestión de Estudiantes (En Desarrollo)
- **Ruta:** `/estudiante`
- **Controlador:** `EstudianteController` (por implementar)
- **Descripción:** CRUD completo para estudiantes
- **Características planificadas:**
  - Listado de estudiantes
  - Formularios de registro
  - Validación de datos
  - Búsqueda y filtros

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
        'Laminas\Router',
        'Laminas\Validator',
        'Application',
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

### 🚧 En Desarrollo
- [ ] Controlador de Estudiantes
- [ ] Modelos de datos
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
6. 🔄 Documentar mejores prácticas de implementación

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

# Limpiar caché
composer dump-autoload
```

### Producción
```bash
# Instalar solo dependencias de producción
composer install --no-dev --optimize-autoloader

# Generar mapa de templates
php vendor/bin/templatemap_generator.php
```

## 📚 Recursos Adicionales

### Documentación Oficial
- [Laminas Framework](https://docs.laminas.dev/)
- [Composer](https://getcomposer.org/doc/)
- [PHP Standards](https://www.php-fig.org/psr/)

### Tutoriales Recomendados
- [Laminas MVC Quick Start](https://docs.laminas.dev/laminas-mvc/quick-start/)
- [Laminas Form Guide](https://docs.laminas.dev/laminas-form/)
- [Laminas DB Guide](https://docs.laminas.dev/laminas-db/)

## 👥 Contribuidores

**Integrantes del Grupo:**
- [Nombre del integrante 1] - [Código de registro]
- [Nombre del integrante 2] - [Código de registro]  
- [Nombre del integrante 3] - [Código de registro]

**Docente Responsable:** [Nombre del docente]

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 📞 Contacto

Para preguntas sobre este proyecto académico, contactar a:
- **Email:** [email@universidad.edu.bo]
- **Universidad:** Universidad Autónoma "Gabriel René Moreno"
- **Materia:** INF513-SC - Exposiciones

---

## 🎯 Próximos Pasos

1. **Implementar CRUD de Estudiantes**
2. **Agregar validación de formularios**
3. **Integrar base de datos**
4. **Crear pruebas unitarias**
5. **Optimizar rendimiento**

---

*Desarrollado con ❤️ para la exposición de INF513-SC - Laminas Framework*
