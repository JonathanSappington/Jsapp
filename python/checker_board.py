# Program Written by Jonathan Sappington
# Assignment Checker Board
#Date 10/29/20

import numpy as np

def checker_value(first_value,second_value):
    # Creates matrix full of 0s
    board = np.zeros((8,8), dtype = np.int8)

    board[::2,::2] = first_value # turns columns and rows 0, 2, 4, 6 into the first value (e.g. 1,3,4)
    board[1::2,1::2] = first_value # turns columns and rows 1, 3, 5, 7 into the first value  (e.g. 1,3,4)

    board[::2,1::2] = second_value # turns columns 1, 3, 5, 7 and rows 0, 2, 4, 6 into the second value (e.g. 0,7)
    board[1::2,::2] = second_value  # turns columns 0, 2, 4, 6 and rows 1, 3, 5, 7 into the second value (e.g. 0,7)
    return board

def main():
    # Creates an alternating checker board pattern
    board_1 = checker_value(1,0)
    board_2 = checker_value(3,0)
    board_3 = checker_value(4,7)
    
    print("\n 1s and 0s")
    print(board_1)
    print("\n 3s and 0s")
    print(board_2)
    print("\n 4s and 7s")
    print(board_3)

    print("")
    input("Press Enter to Exit")

if __name__ == "__main__":
    main()
