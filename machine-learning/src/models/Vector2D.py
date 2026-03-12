import numpy as np

class Vector2D:
    def __init__(self, x, y):
        self.x = x
        self.y = y

    def magnitud(self):
        return np.sqrt(self.x**2 + self.y**2)
