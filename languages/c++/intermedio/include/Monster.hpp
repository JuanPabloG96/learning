#pragma once

#include <iostream>

class Monster
{
  private:
    int hp = 100;

  public:
    void roar()
    {
        std::cout << "ROAR\n";
        std::cout << "vida: " << hp << "\n";
    }
};
