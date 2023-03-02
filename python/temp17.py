
x = ['a',4,'b',8,'c',13]

data = []
k = 0

for i in range(int(len(x) / 2)):
    data.append([])

    for j in range(2):
        data[i].append(x[k])
        k += 1

print(data)



##a = (3,5,'hi')
##a = 3,5
##b = 6,7
##c = (9,11)
##
##a,b,c = b,c,a
##
##print(a)
##print(b)
##print(c)


##a = "hi there how are you doing"
##print(a)
##
####b = list(a)
####print(b)
##
##b = a.split() # default split space
##print(b)
##
##glue = '_'
##
##c = glue.join(b)
##print(c)
