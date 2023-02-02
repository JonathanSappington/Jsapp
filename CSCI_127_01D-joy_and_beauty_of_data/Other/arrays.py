# Program Written by Jonathan Sappington
# Assignment Arrays
#Date 10/29/20

import numpy as np

def main():
    print("-------------V Array-------------")
    v = np.random.randint(1,101, size = 10)    # Creates a 1D array with 10 indexs with random numbers from 1 to 100
    v_odd = v[1::2]    # Gets only the odd indexs from the v array
    v_reverse = v[::-1]    # Gets the reverse column order of the v array

    print("Original:")
    print(v)
    print("")
    print("Odd Index Order:")
    print(v_odd)
    print("")
    print("Reverse Order:")
    print(v_reverse)

    print("-------------M Array-------------")
    m = np.linspace(6,21,25).reshape(5,5)   # Creates a 2D array with 25 indexs from 6 to 21 in a 5x5 matrix
    m_column_reverse = m[::,::-1]    # Gets the reverse order of all columns
    m_row_reverse = m[::-1,::]    # Gets the reverse order of all rows
    m_both_reverse = m[::-1,::-1]    # Gets the reverse order of all columns and rows
    m_transpose = m.T    # Switches the rows with the columns
    m_cut = m[1:4:,1:4:]    # Cuts the first and last column and row

    print("Original:")
    print(m)
    print("")
    print("Reverse Column Order:")
    print(m_column_reverse)
    print("")
    print("Reverse Row Order:")
    print(m_row_reverse)
    print("")
    print("Reverse Row & Column Order:")
    print(m_both_reverse)
    print("")
    print("Transposed Order:")
    print(m_transpose)
    print("")
    print("Column & Row Cut:")
    print(m_cut)

    print("-------------P Array-------------")
    # Creates a 3D array that has 64 sequential numbers that are multiples of 4
    p = np.arange(0,256,4).reshape(4,4,4)

    p_layer = p[1,::,::]

    print("Original")
    print(p)
    print("")
    print("Second Layer Only:")
    print(p_layer)

    print()
    input("Press Enter to Exit:")

if __name__ == "__main__":
    main()
