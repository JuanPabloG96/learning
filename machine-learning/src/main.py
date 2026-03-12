import numpy as np

entradas = np.array([2.0, 1.5, 1.2])
pesos = np.array([0.7, 0.2, -1.0])

res = 0

for i in range(len(entradas)):
    res += entradas[i] * pesos[i]

print(res, np.dot(entradas, pesos))


