# 🐧 Comandos para Linux/Fedora

## 📋 Prerrequisitos

### Instalar PHP y Composer
```bash
# Actualizar el sistema
sudo dnf update -y

# Instalar PHP y extensiones necesarias
sudo dnf install php php-cli php-json php-mbstring php-xml php-zip php-curl php-gd php-intl php-bcmath php-opcache -y

# Instalar Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer

# Verificar instalación
php --version
composer --version
```

### Instalar dependencias del sistema (opcional)
```bash
# Para desarrollo web
sudo dnf groupinstall "Development Tools" -y
sudo dnf install git vim nano -y
```

## 🚀 Ejecutar el proyecto

### Navegar al directorio del proyecto
```bash
cd /ruta/al/proyecto
```

### Instalar dependencias de PHP
```bash
composer install
```

### Iniciar servidor de desarrollo PHP
```bash
php -S localhost:8080 -t public
```

### Una sola línea
```bash
cd /ruta/al/proyecto && php -S localhost:8080 -t public
```

### Acceder a la aplicación
- **Página principal:** http://localhost:8080/
- **Gestión de estudiantes:** http://localhost:8080/estudiante
- **Información del sistema:** http://localhost:8080/info

## 🔧 Comandos de Composer

### Instalar dependencias
```bash
composer install
```

### Verificar dependencias
```bash
composer check-platform-reqs
```

### Actualizar dependencias
```bash
composer update
```

### Limpiar autoloader
```bash
composer dump-autoload
```

### Instalar dependencia específica
```bash
composer require laminas/laminas-mvc-plugin-flashmessenger
```

## 🌐 Configuración de permisos

### Dar permisos correctos a directorios
```bash
# Desde la raíz del proyecto
chmod -R 755 public/
chmod -R 755 data/
chmod -R 755 module/
chmod -R 755 config/

# Si tienes problemas de permisos
sudo chown -R $USER:$USER .
```

### Crear directorio de datos si no existe
```bash
mkdir -p data
chmod 755 data
```

## 🐛 Solución de problemas

### Error: "php no se reconoce"
```bash
# Verificar que PHP esté instalado
which php
php --version

# Si no está instalado
sudo dnf install php php-cli -y
```

### Error: "composer no se reconoce"
```bash
# Verificar que Composer esté instalado
which composer
composer --version

# Si no está instalado, reinstalar
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
```

### Error: "Permission denied"
```bash
# Dar permisos al usuario actual
sudo chown -R $USER:$USER .

# Dar permisos de ejecución
chmod +x public/index.php
```

### Error: "Puerto en uso"
```bash
# Verificar qué proceso usa el puerto
sudo netstat -tlnp | grep :8080

# Matar el proceso si es necesario
sudo kill -9 PID_DEL_PROCESO

# O usar otro puerto
php -S localhost:8081 -t public
```

### Error: "Class not found"
```bash
# Regenerar autoloader
composer dump-autoload

# Verificar que vendor/ existe
ls -la vendor/
```

### Error: "JSON decode error"
```bash
# Verificar que el archivo JSON existe y es válido
ls -la data/estudiantes.json
cat data/estudiantes.json | python -m json.tool
```

## 🔍 Verificación del sistema

### Verificar PHP y extensiones
```bash
php -m | grep -E "(json|mbstring|xml|zip|curl|gd)"
```

### Verificar Composer
```bash
composer diagnose
```

### Verificar permisos
```bash
ls -la public/
ls -la data/
```

## 📝 Comandos útiles adicionales

### Ver logs del servidor
```bash
# En otra terminal, mientras el servidor está corriendo
tail -f /var/log/php_errors.log
```

### Verificar configuración de PHP
```bash
php -i | grep -E "(memory_limit|max_execution_time|upload_max_filesize)"
```

### Limpiar cache (si existe)
```bash
# Si tienes cache de Laminas
rm -rf data/cache/*
```

### Backup de datos
```bash
# Hacer backup del archivo de estudiantes
cp data/estudiantes.json data/estudiantes_backup_$(date +%Y%m%d_%H%M%S).json
```

## 🚀 Script de inicio rápido

Crear un script `start.sh`:
```bash
#!/bin/bash
echo "🚀 Iniciando proyecto Laminas Framework..."
echo "📁 Directorio: $(pwd)"
echo "🔧 Instalando dependencias..."
composer install
echo "🌐 Iniciando servidor en http://localhost:8080"
echo "⏹️  Presiona Ctrl+C para detener"
php -S localhost:8080 -t public
```

Hacer ejecutable:
```bash
chmod +x start.sh
./start.sh
```

## 📋 Checklist de verificación

- [ ] PHP 7.4+ instalado
- [ ] Composer instalado
- [ ] Dependencias instaladas (`composer install`)
- [ ] Permisos correctos en directorios
- [ ] Servidor iniciado (`php -S localhost:8080 -t public`)
- [ ] Aplicación accesible en navegador
- [ ] Sin errores en consola del navegador
