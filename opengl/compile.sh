#!/bin/bash

# Limpiar build anterior (opcional)
rm -rf build/*

cd build

# Generar archivos de compilación
cmake ..

# Compilar con bear para generar compile_commands.json
bear -- make -j$(nproc)

cd ..

echo "✓ Compilación completada"
echo "✓ compile_commands.json generado"
echo "Ejecutable en: ./bin/main"

# abrir el archivo de compilación
./bin/main

