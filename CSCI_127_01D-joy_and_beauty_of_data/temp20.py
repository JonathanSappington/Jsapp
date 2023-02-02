class Point():
    """ Coordinates and stuff """

    def __init__(self,X,Y,Color):
        self.x = X
        self.y = Y
        self.color = Color

    def __str__(self):
        return "X: " + str(self.x) + " Y: " + str(self.y) + " Color: " + self.color

    def mult(self):
        return self.x + self.y

    def mid(self,other):
        midx = (self.x + other.x)/2
        midy = (self.y + other.y)/2
        return (midx - midy)

    def exp(self, e):
        return self.x ** e
        
    
    def getX(self):
        return self.x

    def getY(self):
        return self.y

    def getColor(self):
        return self.color

    def setX(self,X):
        self.x = X

    def setY(self,Y):
        self.y = Y

    def setColor(self,Color):
        self.color = Color

p1 = Point(1,2,"red")
p2 = Point(7,5,'blue')

x = int(input("Enter number: "))
print('exp =',p2.exp(x))

print("midpoint =",p1.mid(p2))

print(p1)

p1.setX(20)
p1.setY(30)
p1.setColor("yellow")

print("Mult =", p1.mult())
print(p1)
