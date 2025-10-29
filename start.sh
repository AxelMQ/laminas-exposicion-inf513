#!/bin/bash

# 🚀 Script de inicio para Laminas Framework
# Sistema de Gestión de Estudiantes

echo "🎓 Sistema de Gestión de Estudiantes - Laminas Framework"
echo "========================================================"
echo ""

# Verificar que estamos en el directorio correcto
if [ ! -f "composer.json" ]; then
    echo "❌ Error: No se encontró composer.json"
    echo "   Asegúrate de estar en el directorio raíz del proyecto"
    exit 1
fi

echo "📁 Directorio actual: $(pwd)"
echo ""

# Verificar PHP
echo "🔍 Verificando PHP..."
if ! command -v php &> /dev/null; then
    echo "❌ Error: PHP no está instalado"
    echo "   Instala PHP con: sudo dnf install php php-cli -y"
    exit 1
fi

PHP_VERSION=$(php -r "echo PHP_VERSION;")
echo "✅ PHP $PHP_VERSION encontrado"
echo ""

# Verificar Composer
echo "🔍 Verificando Composer..."
if ! command -v composer &> /dev/null; then
    echo "❌ Error: Composer no está instalado"
    echo "   Instala Composer desde: https://getcomposer.org/download/"
    exit 1
fi

COMPOSER_VERSION=$(composer --version | head -n1)
echo "✅ $COMPOSER_VERSION encontrado"
echo ""

# Instalar dependencias si es necesario
if [ ! -d "vendor" ]; then
    echo "📦 Instalando dependencias de Composer..."
    composer install
    echo ""
fi

# Verificar permisos
echo "🔐 Verificando permisos..."
if [ ! -w "data" ]; then
    echo "⚠️  Configurando permisos para el directorio data..."
    mkdir -p data
    chmod 755 data
fi

if [ ! -w "public" ]; then
    echo "⚠️  Configurando permisos para el directorio public..."
    chmod 755 public
fi

echo "✅ Permisos configurados"
echo ""

# Mostrar URLs disponibles
echo "🌐 URLs disponibles:"
echo "   • Página principal:    http://localhost:8080/"
echo "   • Gestión estudiantes: http://localhost:8080/estudiante"
echo "   • Información sistema: http://localhost:8080/info"
echo ""

# Iniciar servidor
echo "🚀 Iniciando servidor de desarrollo..."
echo "   Presiona Ctrl+C para detener el servidor"
echo "   ========================================"
echo ""

php -S localhost:8080 -t public
