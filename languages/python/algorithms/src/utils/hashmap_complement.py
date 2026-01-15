def find_target_array(arr, target):
    if (len(arr) == 0):
        return
    
    map = dict()
    res = list()

    for index, value in enumerate(arr):
        if target - value in map:
            res.append(map.get(target - value))
            res.append(index)
            return res

        map.update({value: index})

def find_duplicates(arr):
    saved_nums = set()

    for num in arr:
        if num in saved_nums:
            return True
        saved_nums.add(num)

    return False

def find_complements(arr, k):
    if len(arr) == 0:
        return

    past_num = set()
    res = list()

    for num in arr:
        if num - k in past_num:
            pair = (num, num-k)
            res.append(pair)
        if num + k in past_num:
            pair = (num+k, num)
            res.append(pair)
        past_num.add(num)

    return res
