#include "Window.h"
#include <GLFW/glfw3.h>

Window::Window(int width, int height, const char *title)
    : windowWidth(width), windowHeight(height), windowTitle(title) {
  if (!glfwInit())
    return;
  window = glfwCreateWindow(windowWidth, windowHeight, windowTitle, NULL, NULL);
  if (!window) {
    glfwTerminate();
  }
}

Window::~Window() {
  if (window) {
    glfwDestroyWindow(window);
  }
}

void Window::run() {
  glfwMakeContextCurrent(window);
  render();
  close();
}
void Window::render() {
  while (!glfwWindowShouldClose(window)) {
    glClear(GL_COLOR_BUFFER_BIT);
    glfwSwapBuffers(window);
    glfwPollEvents();
  }
}

void Window::close() { glfwTerminate(); }
