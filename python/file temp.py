data = open("scores.csv","r")

##line = data.read()
line = data.readline()
line = data.readline()
##print(line)


while line:
    record = line.split()
    print(line)
    print(record)
    line = data.readline()
    

##for line in data:
##    record = line.split()
##    print(record)
##    
##    if len(record) > 2:
##        print(record[3])
##    
data.close()
