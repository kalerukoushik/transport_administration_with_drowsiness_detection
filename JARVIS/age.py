import pyttsx3
import datetime
import speech_recognition as sr
import wikipedia
import webbrowser
import os, requests, bs4, sys
import smtplib
import time
import datetime
from datetime import *
import jarvis
def age():
    jarvis.speak("You know, it's rude to ask an assistant their age")
    jarvis.speak("Any how..") 
    dob = "01/05/2019"
    dob = datetime.strptime(dob, '%d/%m/%Y')
    jarvis.speak("Here are your age statistics...")
    jarvis.speak ("%d Years " % ((datetime.today() - dob).days/365))
    jarvis.speak("or")
    jarvis.speak ("%d Months" % ((datetime.today() - dob).days/30))
    jarvis.speak("or")
    jarvis.speak ("%d Days" % ((datetime.today() - dob).days*24))
    jarvis.speak("or")
    jarvis.speak ("%d Minutes" % ((datetime.today() - dob).days*1440))
    jarvis.speak("or")
    jarvis.speak ("%d Seconds" % ((datetime.today() - dob).days*86400))
    jarvis.speak("")
    jarvis.speak("Ohh God it's damn big to calculate")
    jarvis.speak("I think you are satisfied with my age")
