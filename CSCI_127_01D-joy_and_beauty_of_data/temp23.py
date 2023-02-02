import numpy as np

a = np.array([[3,4],
                         [5,6]])
b = np.array([[7,8],
                         [9,11]])

c = 3*a # scalar multiplication
c = a + 3
c = a + b
c = a**3
c = a*b
c = a@b
c = a.dot(b)

print(c)

##a = np.arange(35).reshape(5,7)
##print(a.ndim)
##print(a.shape)
##print(a.size)
##print(a.dtype)
##print(a.itemsize)
##print(a.data)



##print(a[1:3:,::2])
##print(a[1:3:,5::-2])
##print(a[:4:2,1:5:2])



##print(c)
##print(np.hstack((a,b)))

##a = np.array([[3,4],
##                         [5,6]])
##b = np.array([[7,8],
##                         [9,11]])

# Reshaping methods
##c = a.reshape(1,4)
##a.resize(1,4)
##a = a.T
##a = a.ravel()

##a = np.zeros((2,3), dtype = np.int8)
##a = np.ones((2,3), dtype = np.int8)
##a = np.empty((2,3), dtype = np.int8)
##a = np.arange(10)
##a = np.arange(5,17,2)
##a = np.linspace(5,17, 20).reshape(4,5)
##a = np.random.random(5)
##a = np.random.randint(5,17, size = (2,6))
##a[0,1] = 7
