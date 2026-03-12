class Sensor:
    def __init__(self, nombre, umbral):
        self.nombre = nombre
        self.umbral = umbral

    def detectar(self, lectura):
        return lectura > self.umbral
