from datetime import datetime, timedate, date

def timeOfWeek():
  dayNr = datetime.datatime.today().weekday()
  if dayNr<5:
    return('Weekday')
  else:
    return('Weekend')