# Program Written by Jonathan Sappington
# Assignment Midterm Part 2
# Date 10/28/20

## --------------------------------------------Coldest Location---------------------------------------------

##def Coldest_Location(file):
##    data = open(file,"r")
##    average = []
##    temp = []
##    line = data.readline()
##    line = data.readline()
##    
##    while line:
##        record = line.split(",")
##        glue = ", "
##        location = glue.join(record[5:7])
##        
##        
##        average.append(location + "\t" + record[0] + "\t"+ "\t" + record[14])
##        temp.append(record[0])
##        line = data.readline()
##
##    print(average[temp.index(max(temp))])
##    data.close()
##
##print("Location" + "\t"+ "\t" + "Tempature" +  "\t" + "Year")
##Coldest_Location("weather.csv")

## ----------------------------------------Translator-------------------------------------------------

##German_to_English = {'mehr':'more', 'schrank':'cupboard', 'hast':'have', 'du':'you', 'nicht':'no', 'mehr':'more', 'alle':'all', 'tassen':'cups', 'im':'in'}
##
##German = 'du hast nicht mehr alle tassen im schrank'
##German_list = German.split()
##
##translated_text = []
##    
##for letter in German_list:
##        translated_text.append(German_to_English.get(letter,0))
##
##glue = " "
##text = glue.join(translated_text)
##
##print(text)

## -----------------------------------------Rock Class------------------------------------------------

class Rock():
    """ Creates a rock object """

    def __init__(self,M,V,C):
        self.mass = M
        self.volume = V
        self.color = C

    # Prints attributes
    def __str__(self):
        return "Mass = " + str(self.mass) + ", Volume = " + str(self.volume) + ", Color = " + str(self.color)  + ", Density = " + str(self.calc_density())

    # Calculates the rocks density
    def calc_density(self):
        return self.mass / self.volume

def main():
    # Creates a new rock object
    rock_1 = Rock(5,2,"black")
    print(rock_1)

if __name__ == "__main__":
    main()

## -----------------------------------------------------------------------------------------

input("Press Enter to Exit: ")
    
