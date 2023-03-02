import random

cur_trial = []
trials = []

t = 0
c = 0
m_attempts = 50000

matching = [0,0,0,0,0,0,0,0,0,0,0,0,0]

while t < m_attempts:
    for i in range(13):
        cur_trial.append(random.randint(0,1))
        
    print("Trial ", t, cur_trial, "Does match:", cur_trial == matching)

    if cur_trial == matching:
        c += 1

    trials.append(cur_trial)

    cur_trial = []
    t += 1

print("Number of Attempts", t) 
print("Matching Attempts", c) 
print("Possiblity of Matching", (c / t * 100)) 
input
