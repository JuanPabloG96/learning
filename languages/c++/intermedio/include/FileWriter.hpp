#pragma once

#include <cstdio>
#include <iostream>
#include <string>
class FileWriter
{
  private:
    FILE *file;

  public:
    FileWriter(const char *filename) : file(nullptr)
    {
        file = fopen(filename, "w");

        if (!file)
            std::cout << "Error opening the file" << std::endl;
    }
    ~FileWriter()
    {
        if (file)
            std::fclose(file);
        std::cout << "File closed" << std::endl;
    }
    void write(const std::string &text)
    {
        if (!file)
            return;

        if (std::fputs(text.c_str(), file) == EOF)
        {
            std::cout << "Fail to write to file" << std::endl;
        }
        else
            std::cout << "File written succesfully" << std::endl;
    }
};
