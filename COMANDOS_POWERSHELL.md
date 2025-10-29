# 💻 Comandos para PowerShell (Windows)

## 🚀 Ejecutar el proyecto

### Opción 1: Comando simple
```powershell
cd "C:\Users\VICTUS\Documents\proyectos\TECNOWEB\Exposicion\laminas\laminas-exposicion-inf513"
php -S localhost:8080 -t public
```

### Opción 2: Usando variables
```powershell
$proyecto = "C:\Users\VICTUS\Documents\proyectos\TECNOWEB\Exposicion\laminas\laminas-exposicion-inf513"
cd $proyecto
php -S localhost:8080 -t public
```

### Opción 3: Una sola línea (sin &&)
```powershell
Set-Location "C:\Users\VICTUS\Documents\proyectos\TECNOWEB\Exposicion\laminas\laminas-exposicion-inf513"; php -S localhost:8080 -t public
```

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
