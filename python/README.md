## Future Annuity

The program calculates the total annuity based on the number of payments, interest percentage, total years, and deposited amount.

```

def p_rate(i,n):
    r = i/n/100
    return r

def t_years(n,y):
    return n*y

def f_value(pmt,r,t):
    f = pmt * ((1 + r)**t - 1)  / r
    return f

def main():
    r = p_rate(i,n)
    t = t_years(n,y)

    print()
    print("Future annuity = $",round(f_value(pmt,r,t),2))
    input("Press Enter to Exit: ")

n = input("Enter number of payments: ")
i = input("Enter an interest percentage: ")
y = input("Enter the total amount of years: ")
pmt = input("Enter the deposited amount: ")

n = float(n)
i = float(i)
y = float(y)
pmt = float(pmt)

main()

```

## Key Events

The program allows a user to use arrow keys to move a turtle in different directions. If the turtle hits the border of the screen, it returns to the center of the screen.

```

import turtle

window = turtle.Screen()

drawer = turtle.Turtle()
drawer.speed(0)

def check():
    if drawer.xcor() >= 400 or drawer.ycor() >= 350:
        drawer.penup()
        drawer.home()
        drawer.pendown()

    elif drawer.xcor() < -350 or drawer.ycor() < -300:
        drawer.penup()
        drawer.home()
        drawer.pendown()

def east():
    drawer.setheading(0)
    drawer.forward(50)
    check()

def north():
    drawer.setheading(90)
    drawer.forward(50)
    check()

def west():
    drawer.setheading(180)
    drawer.forward(50)
    check()

def south():
    drawer.setheading(270)
    drawer.forward(50)
    check()

window.onkey(east, "Right")
window.onkey(north, "Up")
window.onkey(west, "Left")
window.onkey(south, "Down")
window.listen()

window.exitonclick()

```

## MadLib

The program prompts the user for certain words and inputs them into a mad lib phrase.

```

name = input("Enter a name: ")
p_noun = input("Enter a plural noun: ")
noun = input("Enter a plural noun: ")
num_1 = input("Enter a integer: ")
num_2 = input("Enter a integer: ")
num_3 = input("Enter a float: ")
boolean = input("Enter True/False: ")

num_1 = int(num_1)
num_2 = int(num_2)
num_3 = float(num_3)
boolean = bool(boolean)

print()
print("Hello and welcome to " + name + " Park!")
print("This park handles approximately", num_1, "different species of " + noun + ".")
print("With a total of", num_2, "different areas to choose from.")
print("The best spot to bring the whole family, with only a ", num_3, "% chance of being in danger.")
print("Note: The allegations of " + p_noun + " being harmed are totally", boolean, ".")
print()

input("Press Enter To Exit:")

```

## Midterm

The program calculates the total amount of snowfall before 2000 based on a list of snowfall amounts and years.

```

def main():
    s = [[1992, 115], [2001,98], [2003, 84], [1995,96],
         [1999,55], [2019,120], [2012,65]]

    t = []

    for i in range(len(s)):
        if s[i][0] < 2000:
            t.append(s[i][1])

    print("Total snowfall before 2000:",sum(t))
    input("Press Enter to Exit:")

if __name__ == "__main__":
    main()

```

## Pyramid Volume Calculation

The program calculates the volume of a pyramid based on the length, width, and height.

```

l = input("Length = ")
w = input("Width  = ")
h = input("Height = ")

l = int(l)
w = int(w)
h = int(h)

v = (1/3)*l*w*h

print("Pyramid volume = ", round(v))

```

## Rainfall

The program reads in a list of rainfall amounts and years, adjusts the years if necessary, and reformats the rainfall amounts for printing.

```

def main():
    print("year", "\\t","RainFall (in)")

    rainfall = [["2001",18.2],["03",21.5],["04",1.74],["05",20.2]
                ,["06",203],["2007",23.1],["10",1.93],["13",18.7],["16",176],
                ["17",16.5],["2019",18.8]]

    for i in range(len(rainfall)):
        if "20" not in rainfall[i][0]:
            rainfall[i][0] = "20" + rainfall[i][0]

        if rainfall[i][1] < 10:
            rainfall[i][1] *= 10
            rainfall[i][1] = str(rainfall[i][1])
            rainfall[i][1] += "\\t" + "c"

        elif rainfall[i][1] > 99:
            rainfall[i][1] /= 10
            rainfall[i][1] = str(rainfall[i][1])
            rainfall[i][1] += "\\t" + "c"

        print(rainfall[i][0], "\\t", rainfall[i][1])

    input("Press Enter to Exit: ")

if __name__ == "__main__":
    main()

```

## Random Pattern

The program generates a random pattern of asterisks and underscores.

```

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

if __name__ == "__main__":
    main()

input("Press Enter to Exit:")

```

## Raven

The program reads in a text file and removes all non-letter characters and whitespace, then counts the frequency of each word and prints the results.

```

import string

def clean_text(file_name):

    file = open(file_name,'r')
    text = ''

    for line in file:
        line = line.lower()
        for letter in line:
            if letter in string.ascii_lowercase or letter == " ":
                text += letter

    modified_text = text.split()
    file.close()
    return modified_text

def count_text(text):

    dictionary = {}

    for word in text:
        dictionary[word] = dictionary.get(word,0) + 1

    return dictionary

def  print_dictionary(dictionary):

    for key, value in dictionary.items():
        print(key,value)
    print()

    v = list(dictionary.values())
    k = list(dictionary.keys())

    print("Most used word")
    print("Word:",k[v.index(max(v))],"\\t","Uses:",max(v))

def main(file_name):
    text = clean_text(file_name)
    dictionary = count_text(text)
    print_dictionary(dictionary)

    print()
    input("Press Enter to Exit:")

if __name__ == "__main__":
    main("raven.txt")

```

## Square Root

The program calculates the square root of a given number using the Babylonian method.

```

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

```

## Splicing

The program splices certain characters from a string and combines them to form a new phrase.

```

def main():
    x = "NICK"
    y = "DE JAVU"
    z = "Bob! "

    new_x = x[:3]
    new_y = y[1:4]
    new_z = z[-4:-1]

    s = new_x + new_y + new_z
    s = s.lower()
    s = s.capitalize()
    s = s.center(40)

    print(s)
    input("Press Enter to Exit: ")

if __name__ == "__main__":
    main()

```

## Squares

The program generates a random float less than 1, a random even int between 10 and 20, and a random int between 1 and 5.

```

import random

x = 10 * random.random()
print(x)

y = random.randrange(10,20,20)
print(y)

y = random.randint(1,5)
print(y)

```

## Math Functions

The program demonstrates the use of several math functions.

```

import math

a = 16

z = math.gcd(12,18)
print(z)

```
![alt text](https://github.com/JonathanSappington/Jsapp/blob/main/virtual-reality/Terrain/snap01.PNG?raw=true)