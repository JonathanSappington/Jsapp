
def make_list():
    old_list = [11,13,15,17,19,21,22,23,24]
    for x in range(len(old_list)):
        new_list = [x**3 for x in old_list if x % 3 == 0]
    return new_list
    

new_list = make_list()
print(new_list)
