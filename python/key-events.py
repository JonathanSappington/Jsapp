#Program written by Jonathan Sappington
#Assignment Key Events

import turtle

window = turtle.Screen()

drawer = turtle.Turtle()
drawer.speed(0)

def check():
    if drawer.xcor() >= 400 or drawer.ycor() >= 350:
        drawer.penup()
        drawer.home()
        drawer.pendown()
            
    elif drawer.xcor() < -350 or drawer.ycor() < -300:
        drawer.penup()
        drawer.home()
        drawer.pendown()

def east():
    drawer.setheading(0)
    drawer.forward(50)
    check()

def north():
    drawer.setheading(90)
    drawer.forward(50)
    check()

def west():
    drawer.setheading(180)
    drawer.forward(50)
    check()

def south():
    drawer.setheading(270)
    drawer.forward(50)
    check()

window.onkey(east, "Right")
window.onkey(north, "Up")
window.onkey(west, "Left")
window.onkey(south, "Down")
window.listen()

window.exitonclick()
