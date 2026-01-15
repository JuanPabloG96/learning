#include "Ball.h"
#include <raylib.h>

Ball::Ball(Vector2 initPos, float radius, float COR, float friction)
    : position(initPos), radius(radius), COR(COR), friction(friction) {}

void Ball::applyForce(Vector2 f) {
  forces.x += f.x;
  forces.y += f.y;
}

void Ball::resetForces() { forces = {0, 0}; }

void Ball::draw(float scale, int wWidth, int wHeight) {
  Vector2 position_screen = {position.x * scale,
                             wHeight - (position.y * scale)};
  float radius_screen = radius * scale;

  DrawCircle(position_screen.x, position_screen.y, radius_screen,
             GetColor(0xffffffff));
}

void Ball::update(float dt, float scale, int wWidth) {
  speed.x += forces.x * dt;
  speed.y += forces.y * dt;

  position.x += speed.x * dt;
  position.y += speed.y * dt;

  if (position.y - radius <= 0) {
    position.y = radius;
    speed.y = -speed.y * COR;
    speed.x = speed.x * friction;
  }
  if (position.x - radius <= 0 || position.x >= wWidth / scale) {
    if (position.x - radius <= 0)
      position.x = radius;
    else
      position.x = (wWidth / scale) - radius;
    speed.x = -speed.x * COR;
    speed.y *= friction;
  }
}
