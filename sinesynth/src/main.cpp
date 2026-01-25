#include "AudioFile.h"
#include <cmath>
#include <iostream>
#include <vector>

int main() {
  double sampleRate = 48000.0;
  int durationInSeconds = 7;
  int numSamples = (int)(sampleRate * durationInSeconds);
  std::vector<float> frecuencias = {261.63, 293.66, 329.63, 349.23,
                                    392.00, 440.00, 493.88, 523.25};
  float amplitud = 0.5f;

  struct Nota {
    std::string nombre;
    float frecuencia;
  };

  std::vector<Nota> tablaNotas = {
      {"do7", 4186.01},  {"si6", 3951.07},   {"la#6", 3729.31},
      {"la6", 3520.00},  {"sol#6", 3322.44}, {"sol6", 3135.96},
      {"fa#6", 2959.96}, {"fa6", 2793.83},   {"mi6", 2637.02},
      {"re#6", 2489.02}, {"re6", 2349.32},   {"do#6", 2217.46},
      {"do6", 2093.00},  {"si5", 1975.53},   {"la#5", 1864.66},
      {"la5", 1760.00},  {"sol#5", 1661.22}, {"sol5", 1567.98},
      {"fa#5", 1479.98}, {"fa5", 1396.91},   {"mi5", 1318.51},
      {"re#5", 1244.51}, {"re5", 1174.66},   {"do#5", 1108.73},
      {"do5", 1046.50},  {"si4", 987.77},    {"la#4", 932.33},
      {"la4", 880.00},   {"sol#4", 830.61},  {"sol4", 783.99},
      {"fa#4", 739.99},  {"fa4", 698.46},    {"mi4", 659.25},
      {"re#4", 622.25},  {"re4", 587.33},    {"do#4", 554.37},
      {"do4", 523.25},   {"si3", 493.88},    {"la#3", 466.16},
      {"la3", 440.00},   {"sol#3", 415.31},  {"sol4", 392.00},
      {"fa#3", 370.00},  {"fa3", 349.23},    {"mi3", 329.63},
      {"re#3", 311.13},  {"re3", 293.67},    {"do#3", 277.18},
      {"do3", 261.63},   {"si2", 246.94},    {"la#2", 233.08},
      {"la2", 220.00},   {"sol#2", 207.65},  {"sol3", 196.00},
      {"fa#2", 185.00},  {"fa2", 174.61},    {"mi2", 164.81},
      {"re#2", 155.56},  {"re2", 146.83},    {"do#2", 138.59},
      {"do2", 130.81},   {"si1", 123.47},    {"la#1", 116.54},
      {"la1", 110.00},   {"sol#1", 103.83},  {"sol2", 98.00},
      {"fa#1", 92.50},   {"fa1", 87.31},     {"mi1", 82.41},
      {"re#1", 77.78},   {"re1", 73.42},     {"do#1", 69.30},
      {"do1", 65.41},    {"si0", 61.74},     {"la#0", 58.27},
      {"la0", 55.00},    {"sol#0", 51.91},   {"sol1", 49.00},
      {"fa#0", 46.25},   {"fa0", 43.65},     {"mi0", 41.20},
      {"re#0", 38.89},   {"re0", 36.71},     {"do#0", 34.65},
      {"do0", 32.70},    {"si-1", 30.87},    {"la#-1", 29.14},
      {"la-1", 27.50}};

  AudioFile<float>::AudioBuffer buffer;
  buffer.resize(1);
  buffer[0].resize(numSamples);

  int samplesPerNote = numSamples / frecuencias.size();

  for (int i = 0; i < numSamples; i++) {
    double t = i / sampleRate;

    int currentNoteIndex = i / samplesPerNote;

    if (currentNoteIndex >= frecuencias.size()) {
      currentNoteIndex = frecuencias.size() - 1;
    }

    // Aplicamos la función seno: A * sin(2 * PI * f * t)
    buffer[0][i] =
        amplitud * std::sin(2.0 * M_PI * frecuencias[currentNoteIndex] * t);
  }

  AudioFile<float> audioFile;
  audioFile.setAudioBuffer(buffer);
  audioFile.setSampleRate((uint32_t)sampleRate);
  audioFile.save("sonido_puro.wav");

  std::cout
      << "¡Hecho! Se ha generado 'sonido_puro.wav' en tu carpeta de ejecución."
      << std::endl;

  return 0;
}
