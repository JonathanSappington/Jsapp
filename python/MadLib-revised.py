# Program written by Jonathan Sappington
# Assingment MadLib

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
