

# --------------------------------------
# CSCI 127                             |
# ascii_code                           |                   |
# Your Name   Jonathan Sappington                         |
# --------------------------------------

def create_dictionary(file_name):
    # Opens File and sets up new variables
    data = open(file_name,'r')
    dictionary = {}
    li = []
    line = data.readline()

    # Iterates through the csv file
    while line:
        # Removes all \n and joins the file into a list
        line = line.replace('\n','')
        li = line.split(',')

        # Replaces any string called space or comma with " " or ","
        if "space" in li[1]:
            li[1] = " "

        if "comma" in li[1]:
            li[1] = ","

        # Adds letter and it's corresponding ascii code to dictionary
        dictionary[li[1]] = li[0]
        line = data.readline()
    data.close()
    return dictionary
    

def translate(sentence, dictionary, file_name):
    # Opens file and creates new variables
    data = open(file_name,'w')
    li = []
    
    for letter in sentence:
        # Finds each letter and it's corresponding ascii code and adds it to the list
        li.append(letter + " " + dictionary.get(letter,"UNKOWN") + "\n")

    for i in li:
        # Adds the new data to the txt file
        data.write(i)
        
    data.close()

# --------------------------------------

def main(file_name):
    dictionary = create_dictionary(file_name)
    sentence = "Buck lived at a big house in the sun-kissed Santa Clara Valley. Judge Miller's place, it was called!"
    translate(sentence, dictionary, "output-1.txt")
    sentence = "Bozeman, MT  59717"
    translate(sentence, dictionary, "output-2.txt")
    sentence = "The value is ~$25.00"
    translate(sentence, dictionary, "output-3.txt")

# --------------------------------------

main("ascii-codes.csv")
