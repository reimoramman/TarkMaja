from datetime import datetime, timedelta, date
import urllib.request, json

import datetime


today = str(date.today())
tomorrow = datetime.date.today() + datetime.timedelta(days=1)
tomorrow1 = tomorrow.strftime('%Y-%m-%d')
yesterday = date.today() - datetime.timedelta(1)
yesterday1 = yesterday.strftime('%Y-%m-%d')

url1 = 'https://dashboard.elering.ee/api/nps/price?start='
url2 = '&end='
# Abiks tuli järgnev veebileht https://dashboard.elering.ee/documentation.html
with urllib.request.urlopen(url1+yesterday1+url2+tomorrow1) as url:
  jsonstring = json.loads(url.read().decode())
  data = (jsonstring['data'])
  eesti = data['ee']
  with open('hinnad.txt', 'w') as outfile:
    now = datetime.datetime.now()

    for i in range (21, 45) :
      eestiajad =(eesti[i])
      kellaaeg = (eestiajad['timestamp'])
      price = (eestiajad['price'])
      time2 = datetime.datetime.fromtimestamp(kellaaeg).isoformat()
      json.dump(price, outfile)
      json.dump(time2, outfile)
      outfile.write('\n')