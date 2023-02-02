
people = {"sue":22,"bob":19,"frank":23,"ned":25}

##people['frank'] = 55
##people['frank'] = people['frank'] + 5
people['jan'] = 20
##del people['frank']
##print(people['frank'])

##print(people.items())
##print(people.keys())
##print(people.values())
##
##print(people.get('frank'))
##print(people.get('frank',0))
##print(people)

##for key in people.keys():
##    print(key)
##
##for value in people.values():
##    print(value)
##
##for (key,value) in people.items():
##    print(key,value)

key = "frank"

if key in people:
    print(people[key])
