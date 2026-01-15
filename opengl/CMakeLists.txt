cmake_minimum_required(VERSION 3.10)
project(OpenGL)

set(CMAKE_CXX_STANDARD 23)
set(CMAKE_CXX_STANDARD_REQUIRED ON)
set(CMAKE_EXPORT_COMPILE_COMMANDS ON)

# Directorios
set(CMAKE_RUNTIME_OUTPUT_DIRECTORY ${CMAKE_SOURCE_DIR}/bin)
include_directories(${CMAKE_SOURCE_DIR}/include)

# Buscar paquetes necesarios
find_package(glfw3 REQUIRED)
find_package(OpenGL REQUIRED)

# Recopilar archivos fuente
file(GLOB_RECURSE SOURCES "${CMAKE_SOURCE_DIR}/src/*.cpp")

# Crear ejecutable
add_executable(main ${SOURCES})

# Vincular librerías
target_link_libraries(main 
    glfw 
    OpenGL::GL
    ${CMAKE_DL_LIBS}
)
