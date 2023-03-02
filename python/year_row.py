# Program written by Jonathan sappington
# Assignment Year table

def main():    
    print("Year" + "\t" + "Value")
    print("--------------------")
    y = 2000

    for i in range(0,21):
        value = 2 * y - 150

        print(y,'\t',value)
        y+=1

    input("Press Enter to Exit:")
    

if __name__ == "__main__":
    main()
