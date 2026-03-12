#pragma once

class UniqueIntPtr
{
  private:
    int *ptr;

  public:
    UniqueIntPtr(int *ptr) : ptr(ptr)
    {
    }
    ~UniqueIntPtr()
    {
        delete ptr;
    }
    UniqueIntPtr(const UniqueIntPtr &) = delete;
    UniqueIntPtr &operator=(const UniqueIntPtr &) = delete;
};
