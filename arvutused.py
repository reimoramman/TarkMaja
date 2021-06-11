from datetime import datetime, timedelta, date
import urllib.request, json
import os
import datetime
import time
import csv
import re


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
  dayTotal=0
  with open ('hinnad.csv', 'rt') as todaysPrices:
    hinnad= csv.reader(todaysPrices)
    next(hinnad)
    for line in hinnad:
      hinnad=("\t".join(line))
      hinnad1=re.sub(r"[\n\t\s]*", "", hinnad)
      print(hinnad+hinnad1)

splitPrices()

myString = "I want to Remove all white \t spaces, new lines \n and tabs \t"
output   = re.sub(r"[\n\t\s]*", "", myString)
print(myString+output)