#!/bin/bash

# Limpiar build anterior (opcional)
mkdir -p build
mkdir -p bin
rm -rf build/*

cd build

# Generar archivos de compilación
cmake ..

# Compilar con bear para generar compile_commands.json
bear -- make

cd ..

echo "✓ Compilación completada"
