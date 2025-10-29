# 🏗️ ¿Por qué se estructura así el proyecto Laminas?

## 🎯 Principios de Diseño

### 1. **Separación de Responsabilidades**

```
public/           # ← Solo archivos públicos (CSS, JS, imágenes)
config/           # ← Configuración de la aplicación
module/           # ← Lógica de negocio (MVC)
vendor/           # ← Dependencias externas
```

**¿Por qué?** Cada directorio tiene un propósito específico y claro.

### 2. **Seguridad**

```
public/index.php  # ← ÚNICO punto de entrada público
```

**¿Por qué?** 
- Solo `public/` es accesible desde el navegador
- El resto del código está protegido
- Evita acceso directo a archivos sensibles

### 3. **Modularidad**

```
module/
└── Application/          # ← Tu módulo personalizado
    ├── src/Controller/   # ← Controladores
    ├── src/Model/        # ← Modelos (futuro)
    ├── src/Form/         # ← Formularios (futuro)
    ├── view/             # ← Vistas
    └── config/           # ← Configuración del módulo
```

**¿Por qué?** Puedes crear múltiples módulos independientes.

## 📁 Explicación detallada de cada directorio

### `/public/` - Directorio Público

```
public/
└── index.php    # Punto de entrada único
```

**¿Por qué aquí?**
- Solo este directorio es accesible desde el navegador
- Apache/Nginx apunta a esta carpeta
- Todo el código PHP está fuera del alcance público

**Ejemplo de configuración Apache:**
```apache
DocumentRoot /ruta/al/proyecto/public
```

### `/config/` - Configuración Global

```
config/
└── application.config.php    # Configuración principal
```

**¿Por qué separado?**
- Configuración que afecta a toda la aplicación
- Fácil de encontrar y modificar
- Separado del código de negocio

### `/module/` - Módulos de la Aplicación

```
module/
└── Application/              # Módulo principal
    ├── config/
    │   └── module.config.php # Configuración específica del módulo
    ├── src/
    │   └── Controller/       # Controladores MVC
    └── view/                 # Templates HTML
```

**¿Por qué modular?**
- Cada módulo es independiente
- Fácil de mantener y testear
- Reutilizable en otros proyectos

### `/vendor/` - Dependencias Externas

```
vendor/
├── laminas-mvc/      # Framework MVC
├── laminas-form/     # Formularios
├── laminas-db/       # Base de datos
└── ... más componentes
```

**¿Por qué aquí?**
- Composer instala aquí las dependencias
- Separado del código propio
- Fácil de actualizar con `composer update`

## 🔄 Flujo de una petición HTTP

```
1. Navegador → http://localhost:8080/
   ↓
2. Servidor web → public/index.php
   ↓
3. Bootstrap → config/application.config.php
   ↓
4. Router → module/Application/config/module.config.php
   ↓
5. Controller → module/Application/src/Controller/
   ↓
6. View → module/Application/view/
   ↓
7. Response → Navegador
```

## 🛡️ Ventajas de esta estructura

### 1. **Seguridad**
- Solo `public/` es accesible
- Código fuente protegido
- Configuración sensible fuera del alcance público

### 2. **Mantenibilidad**
- Cada cosa en su lugar
- Fácil de encontrar archivos
- Separación clara de responsabilidades

### 3. **Escalabilidad**
- Fácil agregar nuevos módulos
- Dependencias gestionadas por Composer
- Configuración modular

### 4. **Estándares**
- Sigue convenciones de PHP
- Compatible con PSR-4
- Estructura reconocida por la comunidad

## 📊 Comparación con otras estructuras

### Estructura Simple (Problemática)
```
proyecto/
├── index.php          # ← Accesible directamente
├── config.php         # ← Accesible directamente
├── includes/          # ← Accesible directamente
└── templates/         # ← Accesible directamente
```

**Problemas:**
- Todo es accesible desde el navegador
- Configuración expuesta
- Difícil de mantener

### Estructura Laminas (Correcta)
```
proyecto/
├── public/
│   └── index.php      # ← Único punto de entrada
├── config/            # ← Protegido
├── module/            # ← Protegido
└── vendor/            # ← Protegido
```

**Ventajas:**
- Solo `public/` es accesible
- Código fuente protegido
- Estructura profesional

## 🎓 ¿Por qué Laminas usa esta estructura?

### 1. **Herencia de Zend Framework**
- Laminas es la evolución de Zend Framework
- Estructura probada en producción
- Adoptada por la comunidad PHP

### 2. **Estándares PSR**
- PSR-4: Autoloading de clases
- PSR-7: Mensajes HTTP
- PSR-11: Contenedor de dependencias

### 3. **Mejores Prácticas**
- Separación de responsabilidades
- Inversión de dependencias
- Patrón MVC

## 🔧 Configuración del servidor web

### Apache (.htaccess)
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [QSA,L]
```

### Nginx
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

**¿Por qué?** Todas las peticiones van a `public/index.php`

## 📝 Resumen

La estructura de Laminas Framework está diseñada para:

1. **Seguridad** - Solo archivos públicos accesibles
2. **Mantenibilidad** - Código organizado y modular
3. **Escalabilidad** - Fácil agregar funcionalidades
4. **Estándares** - Sigue convenciones de la industria

Esta estructura es la **mejor práctica** para aplicaciones PHP profesionales y es utilizada por frameworks como:
- Laminas Framework
- Symfony (similar)
- Laravel (adaptada)

¿Te queda claro por qué se estructura así? ¿Quieres que profundice en alguna parte específica?
