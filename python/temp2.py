import turtle

win = turtle.Screen()
bob = turtle.Turtle()

win.bgcolor("lightgreen")

bob.shape("turtle")

bob.pencolor("blue")

bob.forward(50)
bob.left(90)
bob.forward(75)
bob.right(45)
bob.penup()

bob.goto(-200,100)

bob.pencolor(.5,.8,0)
bob.pensize(5)

bob.pendown()

bob.fillcolor("yellow")
bob.begin_fill()
bob.circle(30)
bob.filling()
bob.end_fill()

win.exitonclick()


##def do_math(x):
##    y = 2*x+4
##    
##    return y
##
##for i in range(20):
##    print(do_math(i))

##for i in ['John','Fred','Michael','Bruce']:
##    print(i)

##for i in [1,3,5,7,11,13]:
##    print(i)

##for i in range(4,28,2):
##    print(i)

##for i in range(5):
##    print(i)
