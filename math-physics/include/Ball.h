#ifndef BALL_H
#define BALL_H

#include "raylib.h"

class Ball {
private:
  Vector2 position;
  Vector2 speed;
  Vector2 forces;
  float radius;
  float COR;
  float friction;

public:
  Ball(Vector2 initPos, float radius, float COR, float friction);
  void applyForce(Vector2 f);
  void resetForces();
  void draw(float scale, int wWidth, int wHeight);
  void update(float dt, float scale, int wWidth);
};

#endif
