from flask import Flask, render_template, Response, request
import cv2
import math
from ultralytics import YOLO

# Initialize Flask app
app = Flask(__name__)

# Load YOLO model
model = YOLO('best.pt')

# Define class names (adjust based on your model)
classNames = ['1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'Hello', 'I', 'IloveYou', 'J', 'K', 'L', 'M', 'N', 'No', 'O', 'P', 'Please', 'Q', 'R', 'S', 'T', 'Thanks', 'U', 'V', 'W', 'X', 'Y', 'Yes', 'Z', 'undefined']

# Initialize webcam
cap = cv2.VideoCapture(0)
cap.set(3, 640)
cap.set(4, 480)

# Global variable to track if video streaming is active
streaming_active = False

def generate_frames():
    detected_classes = []  # List to store detected class names

    while True:
        if streaming_active:
            success, img = cap.read()  # Capture frame from webcam
            if not success:
                break

            # Make predictions using YOLO
            results = model(img, stream=True)

            # Clear the previous classes
            detected_classes.clear()

            # Process predictions
            for r in results:
                boxes = r.boxes

                for box in boxes:
                    x1, y1, x2, y2 = box.xyxy[0]
                    x1, y1, x2, y2 = int(x1), int(y1), int(x2), int(y2)

                    # Draw bounding box
                    cv2.rectangle(img, (x1, y1), (x2, y2), (255, 0, 255), 3)

                    # Class name and confidence
                    confidence = math.ceil((box.conf[0] * 100)) / 100
                    cls = int(box.cls[0])

                    # Add class to the list of detected classes
                    detected_classes.append(classNames[cls])

                    # Display class name on frame
                    font = cv2.FONT_HERSHEY_SIMPLEX
                    cv2.putText(img, classNames[cls], (x1, y1), font, 1, (255, 0, 0), 2)

            # Convert image to byte format for web transmission
            ret, buffer = cv2.imencode('.jpg', img)
            if not ret:
                continue
            frame = buffer.tobytes()

            # Yield the frame for streaming
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n\r\n')

    # Return detected classes for display
    return detected_classes

@app.route('/video_feed')
def video_feed():
    return Response(generate_frames(), mimetype='multipart/x-mixed-replace; boundary=frame')

@app.route('/')
def index():
    return render_template('index.html', detected_classes=[])

@app.route('/start_stream', methods=['POST'])
def start_stream():
    global streaming_active
    streaming_active = True
    return render_template('index.html', detected_classes=[])

@app.route('/stop_stream', methods=['POST'])
def stop_stream():
    global streaming_active
    streaming_active = False
    return render_template('index.html', detected_classes=[])

@app.route('/get_classes', methods=['GET'])
def get_classes():
    detected_classes = generate_frames()
    return {'classes': detected_classes}

if __name__ == '__main__':
    app.run(debug=True)
