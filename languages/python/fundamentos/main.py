def exist (n: int, numbers: list[int]) -> bool:
    for i in range(len(numbers)):
        if numbers[i] == n:
            return True

    return False
