# Program written by Jonathan Sappington
# Assignment Future Annuity

def p_rate(i,n):
    r = i/n/100     # Divides the interest by the number of payments then it gets divided by a 100 to get a percentage.
    return r

def t_years(n,y):
    return n*y      # Multiplies the number of payments by the total years to get the total  number of payments.

def f_value(pmt,r,t):
    f = pmt * ((1 + r)**t - 1)  / r     # Uses the rate and the total years to calculte the total annuity.
    return f

def main():
    r = p_rate(i,n)
    t = t_years(n,y)

    print()
    print("Future annuity = $",round(f_value(pmt,r,t),2)) # Calls and prints the total annuity and rounds to the second decimal place.
    input("Press Enter to Exit: ")

n = input("Enter number of payments: ")       # Number of payments
i = input("Enter an interest percentage: ")    # Interest
y = input("Enter the total amount of years: ")# Total years
pmt = input("Enter the deposited amount: ")# Depsoit

n = float(n)
i = float(i)
y = float(y)
pmt = float(pmt)

main()
