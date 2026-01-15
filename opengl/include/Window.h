#ifndef WINDOW_H
#define WINDOW_H

#include <GLFW/glfw3.h>

class Window {
private:
  GLFWwindow *window;
  int windowWidth;
  int windowHeight;
  const char *windowTitle;

public:
  Window(int width, int height, const char *title);
  ~Window();

  void run();
  void render();
  void close();
};

#endif
