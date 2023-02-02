# Program written by Jonathan Sappington
# Assignment Raven

import string

def clean_text(file_name):
    # Opens file and creates empty list
    file = open(file_name,'r')    
    text = ''

    # itorates through each line of the txt
    for line in file:
        # Transform all letters in to lowercase
        line = line.lower()
        # Iterates through each letter
        for letter in line:
            # Checks whether each letter is a lower case or a space if so add to text
            if letter in string.ascii_lowercase or letter == " ":
                text += letter

    # Splits text into a list
    modified_text = text.split()
    file.close()
    return modified_text
    
def count_text(text):
    # Empty dictionary
    dictionary = {}

    # Checks every word in the text list
    for word in text:
        dictionary[word] = dictionary.get(word,0) + 1
        
    return dictionary

def  print_dictionary(dictionary):
    # Iterates through each key and value and is then printed
    for key, value in dictionary.items():
        print(key,value)
    print()

    # Transforms the key and values of the dictionary into lists
    v = list(dictionary.values())
    k = list(dictionary.keys())
    # Prints off the word with the most uses
    print("Most used word")
    print("Word:",k[v.index(max(v))],"\t","Uses:",max(v))

def main(file_name):
    text = clean_text(file_name)
    dictionary = count_text(text)
    print_dictionary(dictionary)

    print()
    input("Press Enter to Exit:")
    
if __name__ == "__main__":
    main("raven.txt")
