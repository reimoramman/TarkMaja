from os import stat
import datetime
from Kirje import Kirje
from collections import Counter


def Data():
    list = []
    fm = open("stat.txt", "r")
    statistika = fm.readlines()
    date = datetime.date.today()
    for rida in statistika:
        andmed = rida.split(",")
        if datetime.date(int(andmed[3][6:10]),int(andmed[3][3:5]),int(andmed[3][0:2]))>date-datetime.timedelta(30,0,0,0,0,0,0):
            list.append(Kirje(andmed[0],andmed[1],andmed[2],andmed[3],andmed[4],andmed[5]))
    

    result = ToOneDate(list, date)
    
    f = open("sorted.csv", 'w')
    f.write(result)
    f.close()

def ToOneDate(list, date):
    list2 = []
    e   = 0
    for kirje2 in list:
        list2[e] = kirje2.device_id
        e+=1
    devices = len(Counter(templist).keys())
    dic = {}
    for j in range(devices-1):

        dic[j] = 0
        dict = {}
        for i in range(30):
            dict[date-datetime.timedelta(i+1,0,0,0,0,0,0)] = 0
        for i in range(29):
            for kirje in list:
                if date-datetime.date(int(kirje.aeg_lopp[6:10]),int(kirje.aeg_lopp[3:5]),int(kirje.aeg_lopp[0:2])) == datetime.timedelta(i,0,0,0,0,0,0):
                    dict[date-datetime.timedelta(i,0,0,0,0,0,0)] += int(kirje.kulu)
        
        dic[j] = dict
        
    return dic

if __name__ == '__main__':

   ret= Data()
   print("ret:",ret)