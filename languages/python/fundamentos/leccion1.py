# Ejercicio 1
nombre = "juan pablo"
edad = 29
altura = 1.87
me_gusta_programar = True

print(f"Mi nombre es {nombre}, tengo {edad}, mido {altura}")
if me_gusta_programar:
    print("me gusta programar")
else:
    print("no me gusta programar")

# Ejercicio 2
dias_vividos = edad * 365
print(dias_vividos)

# Ejercicio 3
num1 = 34
num2 = 28

suma = num1 + num2
resta = num1 - num2
multiplicacion = num1 * num2
division = num1 / num2
division_entera = num1 // num2

print(suma, resta, multiplicacion, division, division_entera)

# Ejercicio 4
apellido = "gama"
nombre_completo = nombre + apellido
print(nombre_completo)

# Ejercicio 5
x = 10
#res = x + "5" crea un error tipografico no es posible sumar numero con string
res = x + int("5") # funciona correctamente al convertir primero el string a numero
