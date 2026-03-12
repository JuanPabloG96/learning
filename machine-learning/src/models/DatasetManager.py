class DatasetManager:
    def __init__(self, ruta):
        self.ruta = ruta

    def __verificar_archivo(self):
        return True

    def cargar_datos(self):
        print(f"Cargando datos desde {self.ruta}")
