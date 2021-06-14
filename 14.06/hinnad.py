import datetime
import pytz
import urllib
import urllib.request
import urllib.error

def GetPrices():

    url = 'https://dashboard.elering.ee/api/nps/price/csv'

    today = datetime.datetime.now().astimezone(pytz.timezone('Europe/Tallinn'))-datetime.timedelta(0,0,0,0,0,3,0)
    tomorrow = today + datetime.timedelta(1,0,0,0,0,3,0)

    todaystr = today.strftime('20%y-%m-%dT%X.999Z')
    tomorrowstr = tomorrow.strftime('20%y-%m-%dT%X.999Z')
    todaystr = todaystr.replace(':', '%3A')
    tomorrowstr = tomorrowstr.replace(':', '%3A')
    print(todaystr+tomorrowstr)
    file = url+'?start='+todaystr+'&end='+tomorrowstr+'&fields=ee'
    path = 'hinnad.csv'
    
    try:
        urllib.request.urlretrieve(file, path)
    except urllib.error.HTTPError as ex:
        print('Problem:', ex)

if __name__=="__main__":
    GetPrices()