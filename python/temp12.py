import turtle


def tree(len,t):

    if len > 5:
        t.forward(len)
        t.right(20)
        tree(len-10,t)
        t.left(40)
        tree(len-10,t)
        t.right(20)
        t.backward(len)
    
def main():
    t = turtle.Turtle()
    w = turtle.Screen()
    t.left(90)
    t.color("red")
    tree(75,t)


main()
