
def gold(x):
    x_prev = x
    x = 1 +1/x
    error = abs(x-x_prev)

    if  error > .000000000001:
        print('x =',x)
        return gold(x)
    else:
        return x

print('x=',gold(3))
