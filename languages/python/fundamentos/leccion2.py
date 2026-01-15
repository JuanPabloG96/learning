# Ejercicio 1
nums = [1,2,3,4,5,6,7,8,9,10]
print(nums[0])
print(nums[len(nums) -1])
print(nums[3:7])

# Ejercicio 2
temperaturas = []
temperaturas.append(22)
temperaturas.append(25)
temperaturas.append(23)
temperaturas.append(20)
temperaturas.append(24)

promedio = sum(temperaturas) / len(temperaturas)

print(promedio)

# Ejercicio 3
decenas = [10,20,30,40,50]
decenas.remove(30)
decenas.append(60)

print(decenas)

# Ejercicio 4
cubos = [x**3 for x in range(1,11)]
print(cubos)

# Ejercicio 5
nums = [x for x in range(1,21)]
divisibles_por_3 = [x for x in nums if x % 3 == 0]
print(nums)
print(divisibles_por_3)

# Ejercicio 6
datos = [5, 12, 3, 18, 7, 22, 9]
print(max(datos))
print(min(datos))
print(sum(datos))
print(sum(datos)/ len(datos))
