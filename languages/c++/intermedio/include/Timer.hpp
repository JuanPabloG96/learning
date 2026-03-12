#pragma once

#include <iostream>

class Timer
{
  public:
    Timer()
    {
        std::cout << "Timer started" << std::endl;
    }
    ~Timer()
    {
        std::cout << "Timer ended" << std::endl;
    }
};
