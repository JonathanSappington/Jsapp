# Program written by jonathan sappington
# Assignment Caesar Cipher
import string

def main():
    punctuation = string.punctuation

    cipher = "HDJOHV*HDW*ILVK"
    new_cipher = ""

    key = -3

    # Seperates & reconfigures each character into a new string
    for char in cipher:
        # Converts each letter to the appropriate number and subtracts 3
        plain = ord(char) + key
        
        # Converts each number back into a different letter
        plain = chr(plain)

        # If punctuation found replace with space
        if plain in punctuation:
            plain = " "

        # Combines each character into one string
        new_cipher += plain

    # Prints recombined phrase
    print("Cipher =", cipher)
    print("Translated Cipher =", new_cipher)

    input("Press Enter to Exit: ")

if __name__ == "__main__":
    main()
