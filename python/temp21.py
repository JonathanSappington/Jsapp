

n1 = 3
d1 = 8
n2 = 5
d2 = 6

# add
n = n1 * d2 + n2 * d1
d = d1 * d2

# mult
##n = n1 * n2
##d = d1 * d2

n_orig = n
d_orig = d

while n % d != 0:
    old_n = n
    old_d = d
    n = old_d
    d = old_n % old_d

print(d)

n_new = n_orig // d
d_new = d_orig // d

print(n_new,"/",d_new)
