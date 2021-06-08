from os import stat
import datetime
from Kirje import Kirje


def Data():
    list = []
    fm = open("stat.txt", "r")
    statistika = fm.readlines()
    date = datetime.date.today()
    for rida in statistika:
        andmed = rida.split(",")
        if datetime.date(int(andmed[2][6:10]),int(andmed[2][3:5]),int(andmed[2][0:2]))>date-datetime.timedelta(30,0,0,0,0,0,0):
            list.append(Kirje(andmed[0],andmed[1],andmed[2],andmed[3],andmed[4]))
    return ToOneDate(list, date)

def ToOneDate(list, date):
    dict = {}
    for i in range(30):
        dict[date-datetime.timedelta(i+1,0,0,0,0,0,0)] = 0
    for i in range(29):
        for kirje in list:
            if date-datetime.date(int(kirje.aeg_lopp[6:10]),int(kirje.aeg_lopp[3:5]),int(kirje.aeg_lopp[0:2])) == datetime.timedelta(i,0,0,0,0,0,0):
                dict[date-datetime.timedelta(i,0,0,0,0,0,0)] += int(kirje.kulu)
    return dict

if __name__ == '__main__':

   ret= Data()
   print("ret:",ret)