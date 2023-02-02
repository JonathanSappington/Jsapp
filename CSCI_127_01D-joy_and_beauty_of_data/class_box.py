# Program Written by Jonathan Sappington
# Assignment Class Box
# Date 10\13\20

class Box():
    """ Creates box object """

    def __init__(self,Length,Width,Height,Color):
        self.length = Length
        self.width = Width
        self.height = Height
        self.color = Color

    def __str__(self):
        return "Length: " + str(self.length) + " ft" + " Width: " + str(self.width) + " ft" + " Height: " + str(self.height) + " ft" + " Color: " + self.color

    def calcVolume(self):
        return self.length * self.width * self.height

    def calcMultVolume(self, Boxes):
        return (self.length * self.width * self.height) * Boxes
    
    def getLength(self):
        return self.length

    def getWidth(self):
        return self.width

    def getHeight(self):
        return self.height

    def getColor(self):
        return self.color

    def setLength(self,Length):
        self.length = Length

    def setWidth(self,Width):
        self.width = Width

    def setHeight(self,Height):
        self.height = Height

    def setColor(self,Color):
        self.color = Color
        
def main():
    box_a = Box(3,4,5,"red")
    box_b = Box(5,6,7,"blue")
    print("Box A Attributes: ",box_a)
    print("Box A Volume =",box_a.calcVolume(),"ft")
    print("The volume of 30 Box A Boxes =",box_a.calcMultVolume(30),"ft")

    box_a.setLength(6)
    print("New Box A Length =",box_a.getLength())
    print()
    input("Press Enter to Exit:")

if __name__ == "__main__":
    main()
