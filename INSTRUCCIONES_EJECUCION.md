# 🚀 Cómo Ejecutar el Proyecto Laminas Framework

## 📋 Prerrequisitos

Antes de ejecutar el proyecto, asegúrate de tener instalado:

- **PHP 7.4+** (recomendado PHP 8.2+)
- **Composer** (gestor de dependencias)
- **Servidor web** (Apache/Nginx) o usar el servidor integrado de PHP

## 🔧 Instalación

### 1. Instalar dependencias

```bash
composer install
```

### 2. Verificar instalación

```bash
composer check-platform-reqs
```

## 🚀 Ejecución

### Opción 1: Servidor integrado de PHP (Recomendado para desarrollo)

```bash
# Desde la raíz del proyecto
php -S localhost:8080 -t public
```

**Acceder a:** http://localhost:8080

### Opción 2: Usando el script de Composer

```bash
composer serve
```

### Opción 3: Con XAMPP/WAMP

1. Copia el proyecto a la carpeta `htdocs` de XAMPP
2. Accede a: http://localhost/laminas-exposicion-inf513/public

## 🌐 URLs disponibles

- **Página principal:** http://localhost:8080/
- **Gestión de estudiantes:** http://localhost:8080/estudiante
- **Información del sistema:** http://localhost:8080/info

## 🐛 Solución de problemas

### Error: "Class not found"
```bash
composer dump-autoload
```

### Error: "Permission denied"
```bash
# En Linux/Mac
chmod -R 755 data/
chmod -R 755 public/
```

### Error: "Port already in use"
```bash
# Usar otro puerto
php -S localhost:8081 -t public
```

## 📁 Estructura de archivos importantes

```
laminas-exposicion-inf513/
├── public/
│   └── index.php          # ← Punto de entrada
├── config/
│   └── application.config.php
├── module/
│   └── Application/
│       ├── src/Controller/
│       └── view/
└── vendor/                # ← Dependencias (ignorar en Git)
```

## 🔍 Verificación

Si todo funciona correctamente, deberías ver:

1. **Página principal** con título "Sistema de Gestión de Estudiantes"
2. **Navegación** funcional entre páginas
3. **Diseño responsive** con Bootstrap
4. **Sin errores** en la consola del navegador

## 📝 Notas importantes

- El servidor integrado de PHP es solo para desarrollo
- Para producción, usa Apache/Nginx
- Los archivos en `vendor/` no se suben a Git
- La configuración local va en `config/autoload/local.php`
