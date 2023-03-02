
def multiply(m,n):
    return m*n      #local variable

def add(p,q):
    return p+q

def do_math(a,b): # define function - parameter
    y = add(multiply(2,a), 1)
    return y

def main():
    x = 3
    y = 5
    z = do_math(x,y) # call & assign function
    print(z)
    print(p)

p = 17      # global variable
main()
