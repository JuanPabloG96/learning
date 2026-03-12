#pragma once

#include "Engine.hpp"
#include <memory>

class Car
{
  private:
    std::unique_ptr<Engine> engine;

  public:
    Car() : engine(std::unique_ptr<Engine>())
    {
    }
    void Drive()
    {
        engine->start();
        std::cout << "Driving\n";
    }
};
