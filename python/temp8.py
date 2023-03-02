# Program written by Jonathan sappington
# Assignment Random*_ Pattern

import random

def main():
    y = ""
    c = 0

    while c < 5:
        x = random.random()
            
        if x > 0.5:
            y += "*"
        elif x <= 0.5:
            y += "_"

        if len(y) >= 6:
            print(y)
            c += 1
            y = ""

    input("Press Enter to Exit:")

if __name__ == "__main__":
    main()
