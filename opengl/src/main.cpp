// #include "Window.h"
#include <GLFW/glfw3.h>
#include <iostream>
#include <math.h>

float screenWidth = 800.0f;
float screenHeight = 600.0f;

GLFWwindow *startGLFW();

int main() {
  // Window window(800, 600, "OpenGL Window");
  // window.run();

  GLFWwindow *window = startGLFW();
  glfwMakeContextCurrent(window);

  // Configurar proyección 2D
  glMatrixMode(GL_PROJECTION);
  glLoadIdentity();
  glOrtho(0, screenWidth, 0, screenHeight, -1, 1);

  glMatrixMode(GL_MODELVIEW);
  glLoadIdentity();

  float centerX = screenWidth / 2.0f;
  float centerY = screenHeight / 2.0f;
  float radius = 50.0f;
  int res = 10;

  while (!glfwWindowShouldClose(window)) {
    glClear(GL_COLOR_BUFFER_BIT);
    glBegin(GL_TRIANGLE_FAN);
    glVertex2d(centerX, centerY);

    for (int i = 0; i <= res; ++i) {
      float angle = 2.0f * 3.14159265 * (static_cast<float>(i) / res);
      float x = centerX + cos(angle) * radius;
      float y = centerY + sin(angle) * radius;
      glVertex2d(x, y);
    }

    glEnd();

    glfwSwapBuffers(window);
    glfwPollEvents();
  }

  return 0;
}

GLFWwindow *startGLFW() {
  if (!glfwInit()) {
    std::cerr << "Failed to initialize GLFW" << std::endl;
    return nullptr;
  }

  GLFWwindow *window = glfwCreateWindow(800, 600, "OpenGL Window", NULL, NULL);
  return window;
}
