# Program Written by Jonathan Sappington
# Assignment Midterm
# Date 09/29/20

def main():
    # List of snow fall
    s = [[1992, 115], [2001,98], [2003, 84], [1995,96],
         [1999,55], [2019,120], [2012,65]]

    # New empty list
    t = []

    for i in range(len(s)):
        # If the year is less than 2000 it appends the snowfall amount to list
        if s[i][0] < 2000:
            t.append(s[i][1])

    #Prints sum of all snowfall before 2000
    print("Total snowfall before 2000:",sum(t))
    input("Press Enter to Exit:")

if __name__ == "__main__":
    main()


##x = -1
##error = 1
##
##print('x' + '\t' + 'y1' + '\t' + 'y2' + '\t' + 'error')
##
##while error > 0.2:
##    y1 = -2*x+3
##    y2 = x**2-3
##
##    error = abs(y1-y2)
##    print(x,'\t',y1,'\t',y2,'\t',error)
##    print(error)
##    x+=.01
##
##print(x,'\t',y1,'\t',y2,'\t',error)


##import turtle, random
##
##win = turtle.Screen()
##bob = turtle.Turtle()
##
##bob.fillcolor(random.random(),random.random(),random.random())
##bob.begin_fill()
##bob.filling()
##for i in range(0,7):
##    bob.forward(random.randrange(20,100))
##    bob.right(random.randrange(10,90))
##bob.home()
##bob.end_fill()

    
##roster = ['bert','ernie','bigbird','oscar', 'cookie monster', 'kermit']
##
##roster.sort()
##roster.reverse()
##
##print(roster)


##alphabet = 'abcdefghijklmnopqrstuvwxyz ' 
##word = alphabet[-4:-1] + alphabet[0:5] + alphabet[9:12]
##print(word)

