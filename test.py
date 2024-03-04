import requests
URL = 'http://localhost/www/2022/License-Plate-Detector/script.php'
PlateImage = {'file': open('detect.jpg', 'rb')}
# r = requests.post(url, files=files)
plateClean = "MH31FU38"
DATA = {'license':plateClean}
requests.post(url = URL, data = DATA, files=PlateImage)