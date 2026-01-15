def two_pointers(arr, target):
    if len(arr) == 0:
        return

    left = 0
    right = len(arr) -1
    res = list()

    while left != right:
        if arr[left] + arr[right] > target:
            right -= 1
        elif arr[left] + arr[right] < target:
            left += 1
        else:
            res.append(left)
            res.append(right)
            return res
    return res

def is_palindrome(text):
    left = 0
    right = len(text) -1

    while left <= right:
        if text[left] == ' ':
            left += 1
        if text[right] == ' ':
            right -= 1
        if text[left].lower() == text[right].lower():
            left += 1
            right -= 1
        else:
            return False
    return True
