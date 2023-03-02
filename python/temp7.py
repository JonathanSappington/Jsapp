import math

e = 0
n = 0
error = 1

while error > .0000000000001:
    e_prev = e
    e = e + 1 /math.factorial(n)
    error = abs(e - e_prev)
    n += 1

print('e =',e,'\t',n,'\t', error)
print(math.e)
