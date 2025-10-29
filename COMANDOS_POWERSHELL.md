# 💻 Comandos Útiles para Laminas Framework

## 🚀 Ejecutar el proyecto

### Navegar al directorio del proyecto
```powershell
cd ruta/al/proyecto
```

### Iniciar servidor de desarrollo PHP
```powershell
php -S localhost:8080 -t public
```

### Una sola línea (PowerShell)
```powershell
cd ruta/al/proyecto; php -S localhost:8080 -t public
```

### Acceder a la aplicación
- **Página principal:** http://localhost:8080/
- **Gestión de estudiantes:** http://localhost:8080/estudiante
- **Información del sistema:** http://localhost:8080/info

## 🔧 Comandos de Composer

### Instalar dependencias
```powershell
composer install
```

### Verificar dependencias
```powershell
composer check-platform-reqs
```

### Actualizar dependencias
```powershell
composer update
```

### Limpiar autoloader
```powershell
composer dump-autoload
```

## 🌐 Verificar que funciona

1. **Ejecuta el servidor:**
   ```powershell
   php -S localhost:8080 -t public
   ```

2. **Abre el navegador:**
   - http://localhost:8080/
   - http://localhost:8080/estudiante
   - http://localhost:8080/info

## 🐛 Solución de problemas

### Error: "php no se reconoce"
```powershell
# Verificar que PHP esté instalado
php --version

# Si no está instalado, descargar desde:
# https://windows.php.net/download/
```

### Error: "composer no se reconoce"
```powershell
# Verificar que Composer esté instalado
composer --version

# Si no está instalado, descargar desde:
# https://getcomposer.org/download/
```

### Error: "Puerto en uso"
```powershell
# Usar otro puerto
php -S localhost:8081 -t public
```

## 📝 Notas importantes

- En PowerShell, usa `;` en lugar de `&&` para separar comandos
- Usa comillas dobles para rutas con espacios
- `Set-Location` es equivalente a `cd`
