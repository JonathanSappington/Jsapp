# Program Written by Jonathan Sappington
# Assignment RainFall

def main():
    print("year", "\t","RainFall (in)")

    # Inaccurate rainfall data
    rainfall = [["2001",18.2],["03",21.5],["04",1.74],["05",20.2]
                ,["06",203],["2007",23.1],["10",1.93],["13",18.7],["16",176],
                ["17",16.5],["2019",18.8]]

    # loops through rain data
    for i in range(len(rainfall)):

        # If year is missing 20 at the beginning add 20
        if "20" not in rainfall[i][0]:
            rainfall[i][0] = "20" + rainfall[i][0]

        # if rainfall is less than average move decimal to the right
        if rainfall[i][1] < 10:
            rainfall[i][1] *= 10
            rainfall[i][1] = str(rainfall[i][1])
            rainfall[i][1] += "\t" + "c"

        # if rainfall is more than average move decimal to the left
        elif rainfall[i][1] > 99:
            rainfall[i][1] /= 10
            rainfall[i][1] = str(rainfall[i][1])
            rainfall[i][1] += "\t" + "c"

        # Prints correct rain data
        print(rainfall[i][0], "\t", rainfall[i][1])

    input("Press Enter to Exit: ")

if __name__ == "__main__":
    main()
