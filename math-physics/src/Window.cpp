#include "Window.h"
#include <raylib.h>

Window::Window(int w, int h, float scale, const char *title)
    : wWidth(w), wHeight(h), title(title), fps(60),
      bgColor(GetColor(0x112245ff)), scale(scale) {
  InitWindow(wWidth, wHeight, title);
  SetTargetFPS(fps);
  dt = 1.0f / fps;
}

bool Window::isOpen() { return !WindowShouldClose(); }

void Window::startFrame() {
  BeginDrawing();
  ClearBackground(bgColor);
}

void Window::endFrame() { EndDrawing(); }
void Window::close() { CloseWindow(); }
int Window::getFps() const { return fps; }
float Window::getDt() const { return dt; }
float Window::getScale() const { return scale; }
void Window::setFps(int fps) {
  this->fps = fps;
  dt = 1.0f / fps;
  SetTargetFPS(fps);
}
void Window::setColor(Color c) { bgColor = c; }
void Window::setScale(float scale) { this->scale = scale; }
