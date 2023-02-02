x = -10
error = 10

print('x' + '\t' + 'y1' + '\t' + 'y2' + '\t' + 'error')

while error > .1:
    y1 = 2*x+1
    y2 = -.5*x-3

    error = abs(y1-y2)
    #print(x,'\t',y1,'\t',y2,'\t',error)
    x+=.1

print(x,'\t',y1,'\t',y2,'\t',error)
