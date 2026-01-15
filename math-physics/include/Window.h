#ifndef WINDOW_H
#define WINDOW_H

#include "raylib.h"

class Window {
private:
  int wWidth, wHeight;
  const char *title;
  int fps;
  float dt;
  float scale;
  Color bgColor;

public:
  Window(int w, int h, float scale, const char *title);
  bool isOpen();
  void startFrame();
  void endFrame();
  void close();
  int getFps() const;
  float getDt() const;
  float getScale() const;
  void setFps(int fps);
  void setColor(Color c);
  void setScale(float scale);
};

#endif
