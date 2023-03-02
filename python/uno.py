#Program written by Jonathan Sappington
#Assignment UNO

import random

def  legal_play(f_value, f_color, s_value, s_color):
    
    if f_value == s_value or f_color == s_color: # Decides whether a play is legal or illegal
         print("legal play")
    else:
         print("illegal play")

    print()

def main():
    s_cardnum = 0
    
    while s_cardnum < 3: # Loops game until computer has played three cards
        
        s_num = random.randrange(1, 10) # Randomly generated color and number
        s_colors = random.choice(("red","green","blue","yellow"))

        print(s_num, s_colors)
        
        f_num = input("Enter a number: ") # Player inputed color and number
        f_colors = input("Enter a color: ")

        legal_play(f_num, f_colors, s_num, s_colors)
        s_cardnum += 1 # Computer has played one card

if __name__ == "__main__":
    main()
