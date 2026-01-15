#include "Ball.h"
#include "Window.h"

int main() {
  Vector2 initPos = {3.0f, 2.0f};
  float radius = 0.1f;
  float restitution = 0.8;
  float friction = 0.99;
  Vector2 gravity = {0, -9.81f};
  Vector2 pulse = {3000.f, 1500};

  bool firstTime = true;

  const int wWidth = 1280;
  const int wHeight = 720;
  const float meters_screen_height = 3.0f;
  float scale = wHeight / meters_screen_height;

  Window window(wWidth, wHeight, scale, "Testing");
  Ball ball(initPos, radius, restitution, friction);

  while (window.isOpen()) {
    window.startFrame();
    ball.resetForces();

    if (firstTime) {
      ball.applyForce(pulse);
      firstTime = false;
    }

    ball.applyForce(gravity);
    ball.update(window.getDt(), window.getScale(), wWidth);
    ball.draw(window.getScale(), wWidth, wHeight);
    window.endFrame();
  }
  window.close();

  return 0;
}
