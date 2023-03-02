import numpy as np
import turtle, time, sys

def Read_OBJ(file):
    droppedFile = file
    print(droppedFile)

    amount = 3
    pos = []
    tri = []
    tri_num = []

    obj = open(droppedFile,"r")

    line = obj.readline()

    while line:
        record = line.split()

        if "v" in record:
            record.remove("v")
            
            for i in range(len(record)):
                pos.append(float(record[i]))

        if "f" in record:
            record.remove("f")
            
            seg = " ".join(record)

            if "//" in seg:
                amount = 2
            else:
                amount = 3
                
            seg = seg.split("/")
            seg = " ".join(seg)
            seg = seg.split()

            for i in range(0,len(seg),amount):
                tri.append(seg[i])
                
            tri.append("N " + str(int(len(seg) / amount)))
            
        line = obj.readline()
            
    obj.close()
    tri.pop()

    Draw_OBJ(pos,tri)

def Draw_OBJ(pos,tri):
    vertices = np.array(pos) * 100
    vertices = vertices.reshape(int(len(pos) / 3),3)

    obj_turtle = turtle.Turtle()
    screen = turtle.Screen()

    obj_turtle.speed(10)
    obj_turtle.penup()
    obj_turtle.setpos(vertices[int(tri[1]) - 1,0],vertices[int(tri[1]) - 1,1])
    obj_turtle.pendown()

    for i in range(0,len(tri)):
        if "N" == tri[i][0]:
            sets = int(tri[i].split()[1])
            
            obj_turtle.setpos(vertices[int(tri[i - sets]) - 1,0],vertices[int(tri[i - sets]) - 1,1])
            obj_turtle.penup()
            continue

        obj_turtle.setpos(vertices[int(tri[i]) - 1,0],vertices[int(tri[i]) - 1,1])
        obj_turtle.pendown()

if len(sys.argv) > 1:
    droppedFile = sys.argv[1]
else:
    droppedFile = "Untitled.obj"

Read_OBJ(droppedFile)
input("Render Finished Press Enter To Exit:")
