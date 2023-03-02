import random, numpy
import json
 
# Opening JSON file
f = open('first-names.json')
d = open('names.json')
# returns JSON object as
# a dictionary
data = json.load(f)
names = json.load(d)

d_list = []
error = 0

for i in range(50):
    m = random.randint(1,13)
    d = random.randint(1,29)
    fn = random.randint(0,len(data) - 1)
    ln = random.randint(0,len(names) - 1)

    date = str(random.randint(2018,2022)) + '-' + ("0" + str(m)  if m < 10 else str(m)) + '-' + ("0" + str(d)  if d < 10 else str(d))
    output = "(" + data[fn] + ", " + names[ln] + ", " + "406" + str(random.randint(0,9)) + str(random.randint(0,9)) + str(random.randint(0,9)) + str(random.randint(0,9)) + str(random.randint(0,9)) + str(random.randint(0,9)) + str(random.randint(0,9)) + ", " + data[fn] + names[ln] + "@gmail.com" ", " + date + ", " + ")"

    if i == 49:
        d_list.append(output + ";")
        break
    d_list.append(output + ",")
    print(d_list[i])

f.close()
