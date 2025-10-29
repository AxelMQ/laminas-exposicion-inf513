# 📄 ¿Qué son los archivos .phtml en Laminas?

## ✅ SÍ, es completamente normal

Los archivos `.phtml` son las **vistas** (templates) en Laminas Framework.

## 🎯 ¿Qué significa .phtml?

- **P** = **PHP**
- **html** = **HTML**
- **.phtml** = **Archivo que mezcla PHP y HTML**

## 📁 Estructura de vistas en tu proyecto

```
module/Application/view/
├── layout/
│   └── layout.phtml          # ← Layout principal (HTML común)
├── application/
│   ├── index/
│   │   ├── index.phtml       # ← Vista de la página principal
│   │   └── info.phtml        # ← Vista de información
│   └── estudiante/
│       └── index.phtml       # ← Vista de gestión de estudiantes
└── error/
    ├── 404.phtml             # ← Vista de error 404
    └── index.phtml           # ← Vista de error general
```

## 🔍 ¿Cómo funcionan?

### 1. **Layout principal** (`layout.phtml`)
```php
<!DOCTYPE html>
<html>
<head>
    <title><?= $this->headTitle() ?></title>
</head>
<body>
    <nav>...</nav>
    <?= $this->content ?>  <!-- ← Aquí se inserta el contenido -->
    <footer>...</footer>
</body>
</html>
```

### 2. **Vista específica** (`index.phtml`)
```php
<div class="container">
    <h1><?= $this->escapeHtml($titulo) ?></h1>
    <p><?= $this->escapeHtml($mensaje) ?></p>
</div>
```

### 3. **Resultado final** (lo que ve el usuario)
```html
<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Estudiantes</title>
</head>
<body>
    <nav>...</nav>
    <div class="container">
        <h1>Sistema de Gestión de Estudiantes</h1>
        <p>¡Bienvenido al sistema!</p>
    </div>
    <footer>...</footer>
</body>
</html>
```

## 🎨 ¿Por qué usar .phtml?

### Ventajas:
1. **Mezcla PHP y HTML** - Fácil de escribir
2. **Reutilizable** - Layout común para todas las páginas
3. **Seguro** - `escapeHtml()` previene XSS
4. **Flexible** - Puedes usar lógica PHP en las vistas

### Ejemplo de uso:
```php
<!-- Mostrar lista de estudiantes -->
<?php foreach ($estudiantes as $estudiante): ?>
    <div class="estudiante">
        <h3><?= $this->escapeHtml($estudiante['nombre']) ?></h3>
        <p>Carrera: <?= $this->escapeHtml($estudiante['carrera']) ?></p>
    </div>
<?php endforeach; ?>
```

## 🔧 ¿Cómo se procesan?

### Flujo de renderizado:

1. **Controller** → Envía datos a la vista
```php
return new ViewModel([
    'titulo' => 'Gestión de Estudiantes',
    'estudiantes' => $estudiantes
]);
```

2. **Vista** → Procesa los datos
```php
<h1><?= $this->escapeHtml($titulo) ?></h1>
<?php foreach ($estudiantes as $estudiante): ?>
    <!-- Mostrar cada estudiante -->
<?php endforeach; ?>
```

3. **Layout** → Envuelve todo en HTML completo
```php
<!DOCTYPE html>
<html>
<body>
    <?= $this->content ?>  <!-- ← Vista insertada aquí -->
</body>
</html>
```

4. **Resultado** → HTML final enviado al navegador

## 📚 Comparación con otros frameworks

### Laravel (Blade)
```blade
<h1>{{ $titulo }}</h1>
@foreach($estudiantes as $estudiante)
    <p>{{ $estudiante->nombre }}</p>
@endforeach
```

### Laminas (.phtml)
```php
<h1><?= $this->escapeHtml($titulo) ?></h1>
<?php foreach ($estudiantes as $estudiante): ?>
    <p><?= $this->escapeHtml($estudiante['nombre']) ?></p>
<?php endforeach; ?>
```

### Symfony (Twig)
```twig
<h1>{{ titulo }}</h1>
{% for estudiante in estudiantes %}
    <p>{{ estudiante.nombre }}</p>
{% endfor %}
```

## 🛡️ Seguridad en .phtml

### Siempre usar `escapeHtml()`:
```php
<!-- ❌ PELIGROSO - Vulnerable a XSS -->
<h1><?= $titulo ?></h1>

<!-- ✅ SEGURO - Escapa HTML -->
<h1><?= $this->escapeHtml($titulo) ?></h1>
```

### Otros helpers de escape:
```php
<?= $this->escapeHtml($contenido) ?>        <!-- HTML -->
<?= $this->escapeHtmlAttr($atributo) ?>     <!-- Atributos HTML -->
<?= $this->escapeJs($javascript) ?>         <!-- JavaScript -->
<?= $this->escapeCss($css) ?>               <!-- CSS -->
```

## 🎯 Resumen

### ✅ Los archivos .phtml son:
- **Vistas/templates** de Laminas Framework
- **Completamente normales** y estándar
- **Mezcla de PHP y HTML**
- **Seguros** con `escapeHtml()`
- **Reutilizables** con layouts

### 📁 En tu proyecto:
- `layout.phtml` - Layout común
- `index.phtml` - Página principal
- `info.phtml` - Página de información
- `estudiante/index.phtml` - Gestión de estudiantes
- `error/404.phtml` - Error 404

### 🔧 Configuración correcta:
```php
'modules' => [
    'Application',  // Solo tu módulo
],
```

**Los archivos .phtml son la parte de la vista en el patrón MVC de Laminas Framework. Es la forma estándar de crear templates.**
