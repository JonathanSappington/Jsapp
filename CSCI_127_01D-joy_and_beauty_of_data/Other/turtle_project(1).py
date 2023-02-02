# Program written by Jonathan Sappington
# Assignment Turtle Graphics

import turtle

win = turtle.Screen()
bob = turtle.Turtle()

win.bgcolor("lightgreen")
bob.shape("turtle")

colors = [(255,255,255),'blue','purple']
pos_x = [-150,150,100]
pos_y = [0,150,-150]
size = [5,10,7]

def make_house(x,y,size,color):
    bob.penup()
    bob.goto(x,y)
    bob.pendown()

    bob.pencolor(color)

    bob.fillcolor(color)
    bob.begin_fill()
    bob.filling()

    for i in range(2):
        bob.left(90)
        bob.forward(5 * size)
        bob.left(45)
        bob.forward(5 * size)

    bob.left(90)
    bob.forward(5 * size)

    bob.end_fill()

def make_sun(x,y,size,color):
    bob.penup()
    bob.goto(x,y)
    bob.pendown()

    bob.pencolor("red")
    
    bob.fillcolor(color)
    bob.begin_fill()
    bob.filling()

    bob.circle(size)

    bob.end_fill()


for i in range(3):
    make_house(pos_x[i],pos_y[i],size[i],colors[i])

make_sun(-200,200,30,'yellow')

win.exitonclick()
