#pragma once

#include <cstddef>

class IntBuffer
{
  private:
    int *data;
    size_t size;

  public:
    IntBuffer(size_t size) : size(size)
    {
        data = new int[size];
    }
    ~IntBuffer()
    {
        delete[] data;
    }
    int get(size_t index)
    {
        return data[index];
    }
    void set(size_t index, int value)
    {
        data[index] = value;
    }
};
