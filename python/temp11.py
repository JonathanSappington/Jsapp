def converter(x,b):

    if x >= b:
        print(x%b)
        return converter(x//b,b)
    else:
        return(x%b)

print(converter(34,2))
print(converter(34,8))
