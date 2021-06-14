import datetime
import pytz
import urllib
import urllib.request
import urllib.error

def GetPrices():

    url = 'https://dashboard.elering.ee/api/nps/price/csv'

    today = datetime.datetime.now().astimezone('Europe/Tallinn')
    tomorrow = today + datetime.timedelta(1,0,0,0,0,0,0)

    todaystr = today.strftime('20%y-%m-%d %X')
    tomorrowstr = tomorrow.strftime('20%y-%m-%d %X')
    todaystr = todaystr.replace(':', '%3A')
    tomorrowstr = tomorrowstr.replace(':', '%3A')
    todaystr = todaystr.replace(' ', '%20')
    tomorrowstr = tomorrowstr.replace(' ', '%20')

    file = url+'?start='+todaystr+'&end='+tomorrowstr+'&fields=ee'
    path = 'hinnad.csv'
    
    try:
        urllib.request.urlretrieve(file, path)
    except urllib.error.HTTPError as ex:
        print('Problem:', ex)

if __name__=="__main__":
    GetPrices()