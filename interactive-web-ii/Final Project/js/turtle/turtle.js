/// <reference path="./lib/Intellisense/js-turtle_hy.ts" />
//DOCUMENTATION: https://hanumanum.github.io/js-turtle/
/*
showGrid(20);      
forward(distance)  
right(angle)       
left(angle) 	   
goto(x,y) 	       
clear() 	       
penup() 	       
pendown() 	       
reset() 	       
angle(angle)	   
width(width)       

color(r,g,b)
color([r,g,b])
color("red")
color("#ff0000")
*/


showGrid(50); 
setSpeed(200);

width(5);
color("blue");
forward(120);

width(1);
left(65);
color("red");
forward(150);

goto(184,-208);
width(2);
right(100);
color("green");
forward(150);

function Read_OBJ()
{
    data = open("Untitled.obj","r");
    line = data.readline();
    
    while (line)
	{
        record = line.split()
        if ("v" in record)
		{
            record.remove("v");
            vertices.append(record);
		}

        if ("f" in record)
		{
            record.remove("f")
            segment = " ".join(record)
            record = segment.split()

            for (i in record)
			{
                if (i != "")
				{
                    var string = "";
					
                    for (x in i)
					{
                        if (x != "/")
                            string += x;
                        else
                            break;
					}
							
                    faces.append(string);
				}
			}

            faces.append("end");
		}
            
        line  = data.readline();
	}
    Draw_OBJ(0,0);
}
        
function Draw_OBJ(x,y)
{   
    delay(0);
    tracer(0, 0);

    setSpeed(0);
    ht();
    penup();
    setPos((float(vertices[int(faces[0]) - 1][0]) + x) * 100, 
    			(float(vertices[int(faces[0]) - 1][1]) + y) * 100);
    pendown();
    
    var start_seg = 0;

    var cur_steps = 0;
    var steps = -1;
    
    for (i in range(len(faces)))
	{
        if (faces[i] == "end")
		{
            setPos(
                (float(vertices[int(faces[start_seg]) - 1][0]) + x) * 100,
                (float(vertices[int(faces[start_seg]) - 1][1]) + y) * 100);
                
            penup();
            start_seg = i + 1;

            if (cur_steps == steps)
			{
                turtle.update()
                cur_steps = 0
			}
                
            if (steps > 0)
                cur_steps += 1;
            continue;
		}
            
        setPos((float(vertices[int(faces[i]) - 1][0]) + x) * 100, 
        			(float(vertices[int(faces[i]) - 1][1]) + y) * 100);
        pendown();
	}
}

vertices = []
faces = []
Read_OBJ();


