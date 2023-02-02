# Program written by jonathan sappington
# Assignment Splicing

def main():
    x = "NICK"
    y = "DE JAVU"
    z = "Bob! "

    # Splices certain characters from the string
    new_x = x[:3]
    new_y = y[1:4]
    new_z = z[-4:-1]

     # combines all the strings together
    s = new_x + new_y + new_z
    s = s.lower()
    s = s.capitalize()
    s = s.center(40)

    # Prints new phrase
    print(s)
    input("Press Enter to Exit: ")
    

if __name__ == "__main__":
    main()
