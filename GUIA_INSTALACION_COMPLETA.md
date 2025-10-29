# 📋 Guía Completa de Instalación - Laminas Framework

## 🎯 Resumen Ejecutivo

Esta guía proporciona instrucciones detalladas para instalar y ejecutar el **Sistema de Gestión de Estudiantes** desarrollado con Laminas Framework en diferentes sistemas operativos.

## 📋 Prerrequisitos Generales

- **PHP 7.4+** (recomendado PHP 8.2+)
- **Composer** (gestor de dependencias)
- **Git** (para clonar el repositorio)
- **Servidor web** (Apache/Nginx) o servidor integrado de PHP

## 🖥️ Instalación por Sistema Operativo

### 🪟 Windows

#### Opción 1: XAMPP (Recomendado para principiantes)

1. **Descargar e instalar XAMPP:**
   - Visita: https://www.apachefriends.org/
   - Descarga la versión con PHP 8.2+
   - Instala en `C:\xampp\`

2. **Configurar PHP en PATH:**
   ```powershell
   # Agregar al PATH del sistema
   C:\xampp\php
   ```

3. **Instalar Composer:**
   - Descarga: https://getcomposer.org/download/
   - Ejecuta el instalador
   - Verifica: `composer --version`

#### Opción 2: PHP Manual

1. **Descargar PHP:**
   - Visita: https://windows.php.net/download/
   - Descarga PHP 8.2+ Thread Safe
   - Extrae en `C:\php\`

2. **Configurar PHP:**
   ```powershell
   # Agregar al PATH
   C:\php
   
   # Verificar instalación
   php --version
   ```

3. **Instalar Composer:**
   ```powershell
   # Descargar e instalar
   Invoke-WebRequest -Uri "https://getcomposer.org/installer" -OutFile "composer-setup.php"
   php composer-setup.php
   php -r "unlink('composer-setup.php');"
   ```

### 🐧 Linux/Fedora

#### Instalación completa con DNF

```bash
# 1. Actualizar el sistema
sudo dnf update -y

# 2. Instalar PHP y extensiones necesarias
sudo dnf install php php-cli php-json php-mbstring php-xml php-zip php-curl php-gd php-intl php-bcmath php-opcache -y

# 3. Instalar Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer

# 4. Instalar Git (si no está instalado)
sudo dnf install git -y

# 5. Verificar instalación
php --version
composer --version
git --version
```

#### Instalación en Ubuntu/Debian

```bash
# 1. Actualizar repositorios
sudo apt update

# 2. Instalar PHP y extensiones
sudo apt install php php-cli php-json php-mbstring php-xml php-zip php-curl php-gd php-intl php-bcmath php-opcache composer git -y

# 3. Verificar instalación
php --version
composer --version
```

### 🍎 macOS

#### Con Homebrew (Recomendado)

```bash
# 1. Instalar Homebrew (si no está instalado)
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

# 2. Instalar PHP y Composer
brew install php composer

# 3. Verificar instalación
php --version
composer --version
```

## 🚀 Instalación del Proyecto

### 1. Clonar el repositorio

```bash
# Clonar desde GitHub
git clone https://github.com/AxelMQ/laminas-exposicion-inf513.git

# Navegar al directorio
cd laminas-exposicion-inf513
```

### 2. Instalar dependencias

```bash
# Instalar dependencias de Composer
composer install

# Verificar que todo esté correcto
composer check-platform-reqs
```

### 3. Configurar permisos (Linux/macOS)

```bash
# Dar permisos correctos
chmod -R 755 public/
chmod -R 755 data/
chmod -R 755 module/
chmod -R 755 config/

# Crear directorio de datos si no existe
mkdir -p data
chmod 755 data
```

## 🌐 Ejecución del Proyecto

### Método 1: Servidor integrado de PHP (Recomendado)

```bash
# Iniciar servidor
php -S localhost:8080 -t public
```

### Método 2: Script automatizado (Linux/macOS)

```bash
# Hacer ejecutable y ejecutar
chmod +x start.sh
./start.sh
```

### Método 3: Con XAMPP/WAMP (Windows)

1. Copia el proyecto a `C:\xampp\htdocs\laminas-exposicion-inf513\`
2. Inicia Apache desde el panel de XAMPP
3. Accede a: http://localhost/laminas-exposicion-inf513/public/

## 🔍 Verificación de la Instalación

### URLs disponibles:
- **Página principal:** http://localhost:8080/
- **Gestión de estudiantes:** http://localhost:8080/estudiante
- **Información del sistema:** http://localhost:8080/info

### Verificaciones a realizar:

1. **✅ Página principal carga correctamente**
   - Título: "Sistema de Gestión de Estudiantes"
   - Navegación funcional
   - Diseño responsive

2. **✅ Gestión de estudiantes funciona**
   - Lista de estudiantes visible
   - Botones de acción funcionan
   - Búsqueda en tiempo real

3. **✅ Formularios operativos**
   - Agregar estudiante
   - Editar estudiante
   - Eliminar con confirmación

4. **✅ Sin errores en consola**
   - No hay errores JavaScript
   - No hay errores PHP en logs

## 🐛 Solución de Problemas Comunes

### Error: "php no se reconoce"

**Windows:**
```powershell
# Verificar PATH
$env:PATH -split ';' | Where-Object { $_ -like "*php*" }

# Agregar PHP al PATH si es necesario
[Environment]::SetEnvironmentVariable("PATH", $env:PATH + ";C:\php", "User")
```

**Linux/macOS:**
```bash
# Verificar instalación
which php
php --version

# Si no está instalado, reinstalar
# Fedora: sudo dnf install php php-cli -y
# Ubuntu: sudo apt install php php-cli -y
# macOS: brew install php
```

### Error: "composer no se reconoce"

**Todos los sistemas:**
```bash
# Verificar instalación
composer --version

# Si no está instalado, reinstalar
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
```

### Error: "Permission denied" (Linux/macOS)

```bash
# Dar permisos correctos
sudo chown -R $USER:$USER .
chmod -R 755 public/ data/ module/ config/
```

### Error: "Puerto en uso"

```bash
# Verificar qué usa el puerto
# Windows: netstat -ano | findstr :8080
# Linux/macOS: sudo netstat -tlnp | grep :8080

# Usar otro puerto
php -S localhost:8081 -t public
```

### Error: "Class not found"

```bash
# Regenerar autoloader
composer dump-autoload

# Verificar que vendor/ existe
ls -la vendor/
```

## 📊 Comparativa de Sistemas Operativos

| Característica | Windows | Linux/Fedora | macOS |
|----------------|---------|--------------|-------|
| **Facilidad de instalación** | ⭐⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐⭐⭐ |
| **Rendimiento** | ⭐⭐⭐ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ |
| **Soporte de extensiones** | ⭐⭐⭐ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ |
| **Herramientas de desarrollo** | ⭐⭐⭐ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ |
| **Documentación** | ⭐⭐⭐⭐ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ |

## 📝 Notas Importantes

### Para Desarrollo:
- Usa el servidor integrado de PHP (`php -S`)
- Los archivos en `vendor/` no se suben a Git
- La configuración local va en `config/autoload/local.php`

### Para Producción:
- Usa Apache/Nginx con PHP-FPM
- Configura permisos de seguridad estrictos
- Usa HTTPS con certificados SSL
- Implementa cache y optimizaciones

### Estructura del Proyecto:
```
laminas-exposicion-inf513/
├── 📁 config/                 # Configuración
├── 📁 data/                   # Datos (JSON)
├── 📁 module/Application/     # Módulo principal
│   ├── 📁 src/Controller/     # Controladores
│   └── 📁 view/              # Vistas
├── 📁 public/                # Punto de entrada
├── 📁 vendor/                # Dependencias
├── 📄 composer.json          # Dependencias PHP
├── 📄 start.sh              # Script de inicio (Linux/macOS)
└── 📄 README.md             # Documentación principal
```

## 🎯 Conclusión

El proyecto está diseñado para funcionar en cualquier sistema operativo con PHP 7.4+. La instalación más sencilla es con XAMPP en Windows, mientras que Linux/Fedora ofrece el mejor rendimiento y flexibilidad para desarrollo.

**Tiempo estimado de instalación:**
- Windows (XAMPP): 15-20 minutos
- Linux/Fedora: 10-15 minutos
- macOS (Homebrew): 10-15 minutos
