import cv2
import dlib
import numpy as np
from scipy.spatial import distance
from playsound import playsound
import jarvis

# calculate the Euclidean distance between two facial landmarks
def euclidean_dist(pt1, pt2):
    return distance.euclidean(pt1, pt2)

def sound_alarm():
	# play an alarm sound
	playsound('alarm.mp3')

# calculate the eye aspect ratio (EAR)
def eye_aspect_ratio(eye):
    A = euclidean_dist(eye[1], eye[5])
    B = euclidean_dist(eye[2], eye[4])
    C = euclidean_dist(eye[0], eye[3])
    ear = (A + B) / (2.0 * C)
    return ear

# initialize dlib's face detector and the facial landmark predictor
detector = dlib.get_frontal_face_detector()
predictor = dlib.shape_predictor("shape_predictor_68_face_landmarks.dat")

# set the threshold for drowsiness detection
EAR_THRESHOLD = 0.25
frame_check = 18
flag = 0
# start the video stream
cap = cv2.VideoCapture(0)

while True:
    # get the frame from the video stream and resize it
    _, frame = cap.read()
    frame = cv2.resize(frame, (640, 480))
    
    # detect faces in the grayscale frame
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    faces = detector(gray)
    
    for face in faces:
        # get the facial landmarks for the face region
        landmarks = predictor(gray, face)
        landmarks = np.array([[landmarks.part(i).x, landmarks.part(i).y] for i in range(68)])
        
        # extract the left and right eye regions
        left_eye = landmarks[36:42]
        right_eye = landmarks[42:48]
        
        # calculate the EAR for the left and right eyes
        left_ear = eye_aspect_ratio(left_eye)
        right_ear = eye_aspect_ratio(right_eye)
        
        # take the average of the EAR for both eyes
        ear = (left_ear + right_ear) / 2.0
        
        # draw the facial landmarks on the frame
        for i in range(68):
            cv2.circle(frame, (landmarks[i][0], landmarks[i][1]), 1, (0, 0, 255), -1)
        
        # check if the EAR is below the threshold
        
        if ear < EAR_THRESHOLD:
            flag += 1
            print(flag)
            if flag >= frame_check :
                cv2.putText(frame, "DROWSY", (300, 30), cv2.FONT_HERSHEY_SIMPLEX, 0.7, (0, 0, 255), 2)
                sound_alarm()
                jarvis.speak('Talk to me, Don\'t fell asleep')
                jarvis.speak('Or stop the vehicle aside and take a nap')
        else:
            flag = 0
    # show the frame
    cv2.imshow("Frame", frame)
    
    # exit the loop if 'q' is pressed
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

# release the resources
cap.release()
cv2.destroyAllWindows()
