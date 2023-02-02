# Program written by Jonathan sappington
# Assignment Squareroot

import math

def main():
    n = input('Enter a number: ')
    n = float(n)
    
    sqrt_n = .5*n
    error = 10

    print("First attempt:",sqrt_n)

    while error > 0.0000001:
        sqrt_prev = sqrt_n
        sqrt_n = (sqrt_n + n / sqrt_n) / 2
        
        error = abs(sqrt_n - sqrt_prev)

    print("Final attempt:",sqrt_n)
    print("Library attempt:",math.sqrt(n))
    input("Press Enter to Exit:")

if __name__ == "__main__":
    main()
