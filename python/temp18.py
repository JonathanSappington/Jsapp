data = open("Scores.txt","r")
##data_out = open("Scores_out.txt","w")
data_out = open("Scores_out.csv","w")
##next(data)
line = data.readline()
record = line.split()
print(record[0] + "," + record[1])
data_out.write(record[0] + "," + record[1] + "\n")
line = data.readline()

while line:
    line = line.rstrip("/n")
    record = line.split()
    record.append('Elmo')
##    print(record[0] + "\t" + record[1])
    print(record[0] + "," + record[1] + ',' + record[4])
##    data_out.write(record[0] + "\t" + record[1] + "\n")
    data_out.write(record[0] + "," + record[1] + "," + record[4] + "\n")
    
    line = data.readline()

data.close()
data_out.close()
