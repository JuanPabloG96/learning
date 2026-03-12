#include "Monster.hpp"
#include <iostream>
#include <memory>

int main()
{
    std::unique_ptr<Monster> monster = std::make_unique<Monster>();
    monster->roar();

    std::unique_ptr<int> ptr = std::make_unique<int>(20);
    std::unique_ptr<int> ptr2 = std::move(ptr);

    if (ptr == nullptr)
    {
        std::cout << *ptr2 << "\n";
    }
}
