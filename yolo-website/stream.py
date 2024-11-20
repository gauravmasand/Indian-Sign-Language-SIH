#install opencv-python
#install ultralytics

import cv2
import math 

cap = cv2.VideoCapture(0)
cap.set(3, 640)
cap.set(4, 480)

#now pass it to yolo fine tuned model for object detection

from ultralytics import YOLO

model = YOLO('best.pt')

classNames = ['1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'Hello', 'I', 'IloveYou', 'J', 'K', 'L', 'M', 'N', 'No', 'O', 'P', 'Please', 'Q', 'R', 'S', 'T', 'Thanks', 'U', 'V', 'W', 'X', 'Y', 'Yes', 'Z', 'undefined']

while True:
    success, img = cap.read()
    results = model(img, stream=True)

    # coordinates
    for r in results:
        boxes = r.boxes

        for box in boxes:
            # bounding box
            x1, y1, x2, y2 = box.xyxy[0]
            x1, y1, x2, y2 = int(x1), int(y1), int(x2), int(y2) # convert to int values

            # put box in cam
            cv2.rectangle(img, (x1, y1), (x2, y2), (255, 0, 255), 3)

            # confidence
            confidence = math.ceil((box.conf[0]*100))/100
            print("Confidence --->",confidence)

            # class name
            cls = int(box.cls[0])
            print("Class name -->", classNames[cls])

            # object details
            org = [x1, y1]
            font = cv2.FONT_HERSHEY_SIMPLEX
            fontScale = 1
            color = (255, 0, 0)
            thickness = 2

            cv2.putText(img, classNames[cls], org, font, fontScale, color, thickness)

    cv2.imshow('Webcam', img)
    if cv2.waitKey(1) == ord('q'):
        break

cap.release()
cv2.destroyAllWindows()