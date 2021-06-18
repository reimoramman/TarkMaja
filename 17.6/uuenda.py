from datetime import datetime
import time
from datetime import datetime
import datetime
import csv
import datetime
import datetime
import csv
import datetime

eof=False
while(eof==False):
    uuenda()
    time.sleep(60)

def uuenda():
    listoflist= []
    now = datetime.datetime.now()
    fm = open("tingimused.txt", "r")
    tingimused = fm.readlines()
    for rida in tingimused:
        list = []
        andmed = rida.split(",")
        list.append(andmed[0])
        list.append(andmed[1])
        list.append(andmed[2])
        list.append(andmed[3])
        listoflist.append(list)
    
    
    

    f = open("status.csv", 'w')
    for elem in listoflist:
        listcheaptimes = 
        if (elem[2].split('-')[0]>=int(time.strftime('%HH'))):
            f.write(1)
        if (elem[2].split('-')[1]>=int(time.strftime('%HH'))):
            f.write(0)
    f.close()
    for elem in listoflist:


def timeOfWeek():
  dayNr = datetime.datetime.today().weekday()
  if dayNr<5:
    return('Weekday')
  else:
    return('Weekend')

#timeOfWeek()
#funktsioon timeOfWeek t22tab







def timeOfWeek():
  dayNr = datetime.datetime.today().weekday()
  if dayNr<5:
    return('Weekday')
  else:
    return('Weekend')

#timeOfWeek()
#funktsioon timeOfWeek t22tab



def splitPrices():
  cheapTimes=[]
  expensiveTimes=[]
  total=0
  halfOfTotal=0
  times=[]
  prices=[]
  with open ('hinnad.csv', 'rt') as todaysPrices:
    hinnad= csv.reader(todaysPrices)
    next(hinnad)
    for line in hinnad:
      hinnad=("\t".join(line))
      hinnad=hinnad.replace('"', "")
      hinnad=hinnad.replace(";",",")
      hinnad=hinnad.replace('\t', '.')
      times.append(hinnad[22:27])
      prices.append(float(hinnad[28:34]))

    for hind in prices:
      total+=hind

    halfOfTotal=total/23

    print(times)
    print(prices)
    print(total)
    print(halfOfTotal)

    i=0
    while i < 23:
      if prices[i] > halfOfTotal:
        expensiveTimes.append(prices[i])
        i+=1
      elif prices[i] <= halfOfTotal:
        cheapTimes.append(prices[i])
        i+=1
    prices, times = zip(*sorted(zip(prices, times)))
    print(times)


    print(expensiveTimes)
    print(cheapTimes)
    for t in times:
        t = t.split(":")[0]

    return times