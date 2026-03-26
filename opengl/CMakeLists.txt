cmake_minimum_required(VERSION 3.10)
project(OpenGL)
set(CMAKE_CXX_STANDARD 23)
set(CMAKE_CXX_STANDARD_REQUIRED ON)
set(CMAKE_EXPORT_COMPILE_COMMANDS ON)

set(CMAKE_RUNTIME_OUTPUT_DIRECTORY ${CMAKE_SOURCE_DIR}/bin)

include_directories(${CMAKE_SOURCE_DIR}/include)  # sin cambios, ya cubre glad/ y KHR/

find_package(glfw3 REQUIRED)
find_package(OpenGL REQUIRED)

file(GLOB_RECURSE SOURCES "${CMAKE_SOURCE_DIR}/src/*.cpp")  # glad.c se incluye solo

add_executable(main ${SOURCES})

target_link_libraries(main
    glfw
    OpenGL::GL
    ${CMAKE_DL_LIBS}
)
