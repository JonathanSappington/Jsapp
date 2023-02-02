
class Box():
    """ Creates box object """

    def __init__(self,Length,Width,Height):
        self.length = Length
        self.width = Width
        self.height = Height

    def __str__(self):
        return str(self.length) + "x" + str(self.width) + "x" + str(self.height)

class Gift(Box):
    def __init__(self,L,W,H,Color):
        super().__init__(L,W,H)
        self.color = Color

    def __str__(self):
        return super().__str__() + " color: " + self.color

class Shipping(Box):
    def __init__(self,L,W,H,Weight):
        super().__init__(L,W,H)
        self.weight = Weight

    def __str__(self):
        return super().__str__() + " " + str(self.weight) + "kg " + "vol: " + str(self.vol())

    def vol(self):
        return self.length * self.width * self.height

a = Box(3,4,5)
b = Gift(5,6,7,"red")
c = Shipping(7,8,9,10)

z = [a,b,c]

print(a)
print(b)
print(c)

for i in z:
    print(i)
