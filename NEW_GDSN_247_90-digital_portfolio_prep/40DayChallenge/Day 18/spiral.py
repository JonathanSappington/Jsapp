import turtle

def exponet(next_x,cur_x, red, blue, green, size):
    x = (next_x + cur_x) / 1.93

    color = draw.pencolor()

    draw.pencolor((red,blue,green))
    draw.width(size * x)
    draw.right(25)
    draw.forward(x)

    exponet(x, next_x, red + 0.0025, blue + 0.001, green + 0.001, size + 0.0025)

draw = turtle.Turtle()
draw.speed(0.2)
screen = turtle.Screen()
draw.pencolor((0.01,0,0))

exponet(1, 0, 0.01, 0.01, 0.01,0)
