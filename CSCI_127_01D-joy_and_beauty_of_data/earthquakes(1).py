# --------------------------------------
# CSCI 127                             |
# Assignment - Earthquakes             |
# Your Name  Jonathan Sappington        |
# --------------------------------------

def average_magnitude(file):
    # opens file and skips the first line
    data = open(file,"r")
    line = data.readline()
    line = data.readline()

    # Variable Setup
    total = 0
    count = 0
    
    while line:
        # Splits csv file into lists
        record = line.split(",")
        # Counts the total number of earthquakes
        count += 1
        # Finds the sum of all magnitudes
        total += float(record[-8])
        # Goes to next line
        line = data.readline()

    # Closes the file
    data.close()
    # Calculates the total average of magnitudes
    average = total / count

    return average

def earthquake_locations(file):
    # opens file and skips the first line
    data = open(file,"r")
    line = data.readline()
    line = data.readline()

    # New list for names
    l = []
    
    while line:
        # Splits csv file into lists
        record = line.split(",")
        # Checks if the name is already in the list if not it gets added
        if record[-5] not in l:
            l.append(record[-5])
        # Goes to the next line
        line = data.readline()

    #Sorts all the names into alphabetical order
    l.sort()
    # Closes the file
    data.close()

    for i in range(len(l)):
        print(str(i + 1) + ".", l[i])
        
    
def count_earthquakes(file,lower,upper):
    # Opens file and skips the first line
    data = open(file,"r")
    line = data.readline()
    line = data.readline()

    # Total of earthquakes
    total = 0
    
    while line:
        record = line.split(",")
        # Checks if the magnitude is less the maximum amount and more than the minimum amount
        if float(record[-8]) >= lower and float(record[-8]) <= upper:
            # If true add 1 to total number of earthquakes
            total += 1

        # Goes to the next line
        line = data.readline()

    #Closes the file
    data.close()
    return total

def main(file_name):
    # Grabs and prints the average magnitude
    magnitude = average_magnitude(file_name)
    print("The average earthquake magnitude is {:.2f}\n".format(magnitude))

    # Gets names of all locations hit by an earthquake
    earthquake_locations(file_name)
    
    # Ask for the minimum magnitude and the maximum magnitude
    print("")
    lower_bound = float(input("Enter a lower bound for the magnitude: "))
    upper_bound = float(input("Enter an upper bound for the magnitude: "))

    # Calculates and prints how many places were hit by earth quakes with a magnitude between the maximum and minimum magnitude
    how_many = count_earthquakes(file_name, lower_bound, upper_bound)
    print("Number of recorded earthquakes between {:.2f} and {:.2f} = {:d}".format(lower_bound, upper_bound, how_many))
    input("Press Enter to Exit: ")

# --------------------------------------
if __name__ == "__main__":
    main("earthquakes.csv")

