import cv2
import imutils
import requests
import pytesseract
URL = "https://www.techvegan.in/license-detector/script.php"
cameraPort = 0
pytesseract.pytesseract.tesseract_cmd = 'C:\Program Files\Tesseract-OCR\\tesseract'
key = cv2. waitKey(1)
webcam = cv2.VideoCapture(cameraPort)
while True:
        try:
                check, frame = webcam.read()
                print(check) #prints true as long as the webcam is running
                print(frame) #prints matrix values of each framecd 
                cv2.imshow("Capturing", frame)
                key = cv2.waitKey(1)
                if key == ord('s'): 
                        cv2.imwrite(filename='detect.jpg', img=frame)
                        webcam.release()
                        # img_new = cv2.imread('detect.jpg', cv2.IMREAD_GRAYSCALE)
                        # img_new = cv2.imshow("Captured Image", img_new)
                        # cv2.waitKey(1650)
                        cv2.destroyAllWindows()
                        # print("Processing image...")
                        # img_ = cv2.imread('detect.jpg', cv2.IMREAD_ANYCOLOR)
                        # print("Converting RGB image to grayscale...")
                        # gray = cv2.cvtColor(img_, cv2.COLOR_BGR2GRAY)
                        # print("Converted RGB image to grayscale...")
                        # print("Resizing image to 28x28 scale...")
                        # img_ = cv2.resize(gray,(28,28))
                        # print("Resized...")
                        # img_resized = cv2.imwrite(filename='detect-grey.png', img=img_)
                        # print("Image saved!")
                        break
                elif key == ord('q'):
                        print("Turning off camera.")
                        webcam.release()
                        print("Camera off.")
                        print("Program ended.")
                        cv2.destroyAllWindows()
                        break
        except(KeyboardInterrupt):
                print("Turning off camera.")
                webcam.release()
                print("Camera off.")
                print("Program ended.")
                cv2.destroyAllWindows()
                break

image = cv2.imread('detect.jpg')
image = imutils.resize(image, width=300 )
#cv2.imshow("original image", image)
#cv2.waitKey(0)
gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
#cv2.imshow("greyed image", gray_image)
#cv2.waitKey(0)
gray_image = cv2.bilateralFilter(gray_image, 11, 17, 17) 
#cv2.imshow("smoothened image", gray_image)
#cv2.waitKey(0)
edged = cv2.Canny(gray_image, 30, 200) 
#cv2.imshow("edged image", edged)
#cv2.waitKey(0)
cnts,new = cv2.findContours(edged.copy(), cv2.RETR_LIST, cv2.CHAIN_APPROX_SIMPLE)
image1=image.copy()
cv2.drawContours(image1,cnts,-1,(0,255,0),3)
#cv2.imshow("contours",image1)
cv2.waitKey(0)
cnts = sorted(cnts, key = cv2.contourArea, reverse = True) [:30]
screenCnt = None
image2 = image.copy()
cv2.drawContours(image2,cnts,-1,(0,255,0),3)
#cv2.imshow("Top 30 contours",image2)
cv2.waitKey(0)
i=7
for c in cnts:
        perimeter = cv2.arcLength(c, True)
        approx = cv2.approxPolyDP(c, 0.018 * perimeter, True)
        if len(approx) == 4: 
                screenCnt = approx
                x,y,w,h = cv2.boundingRect(c) 
                new_img=image[y:y+h,x:x+w]
                cv2.imwrite('./'+str(i)+'.png',new_img)
                i+=1
                break
cv2.drawContours(image, [screenCnt], -1, (0, 255, 0), 3)
#cv2.imshow("image with detected license plate", image)
cv2.waitKey(0)

Cropped_loc = './7.png'
#cv2.imshow("cropped", cv2.imread(Cropped_loc))
plate = pytesseract.image_to_string(Cropped_loc, lang='eng')
plateClean = plate.replace("\n","")
# HTTPS Request
print("Number plate is:", plate)
PlateImage = {'file': open('detect.jpg', 'rb')}
# r = requests.post(url, files=files)
DATA = {'license':plateClean}
requests.post(url = URL, data = DATA, files=PlateImage)
print("Number plate is:", plate)
cv2.waitKey(0)
cv2.destroyAllWindows()
