import string

def clean_text(file_name):
    file = open(file_name,'r')
    modified_text = ''
    
    for line in file:
        line = line.lower()
        for letter in line:
            if letter in string.ascii_lowercase or " ":
                modified_text += letter

    file.close()
    return modified_text
    
def count_text(text):
    dictionary = {}

    for letter in text:
        dictionary[letter] = dictionary.get(letter,0) + 1
        
        
    return dictionary

def  print_dictionary(dictionary):
    for key in dictionary:
        print(key,dictionary[key])

def main(file_name):
    text = clean_text(file_name)
    dictionary = count_text(text)
    print(dictionary)
    print_dictionary(dictionary)
    

main("raven.txt")
