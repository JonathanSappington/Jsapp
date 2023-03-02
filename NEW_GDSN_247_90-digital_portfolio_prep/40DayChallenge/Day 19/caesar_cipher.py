import string

def main():
    punctuation = string.punctuation

    cipher = "HDJOHV*HDW*ILVK"
    new_cipher = ""

    key = -3

    for char in cipher:
        plain = ord(char) + key
        
        plain = chr(plain)

        if plain in punctuation:
            plain = " "

        new_cipher += plain

    print("Cipher =", cipher)
    print("Translated Cipher =", new_cipher)

    input("Press Enter to Exit: ")

if __name__ == "__main__":
    main()
