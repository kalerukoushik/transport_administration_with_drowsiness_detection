import pyttsx3
import datetime
import speech_recognition as sr
import wikipedia
import webbrowser
import os, requests, bs4, sys, random
import smtplib
import time
import datetime
import urllib.request as urllib2
#from googlesearch import search 
from googlesearch import *
import googlesearch
import re

import age
import dictionary
import downloadImages
# import Drowsiness_Detection
# from Drowsiness_Detection import *



#This is used to import default, inbuilt voices of google 0 - Male, 1 - Female 
engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
engine.setProperty('voice', voices[1].id)


def speak(audio):
    engine.say(audio)
    engine.runAndWait()



#The below takeCOmmand() function is used to take your voice inputs from the microphone
def takeCommand():
    '''Takes microphone input'''
    r = sr.Recognizer()
    with sr.Microphone() as source:
        print('Speak')
        r.pause_threshold = 1
        audio = r.listen(source)

        try:
            query = r.recognize_google(audio, language='en-in')
            print(f"You said: {query}\n")
            
        except Exception as e:
            speak("")
            return None
        return query


def searchgoogle():
    results = wikipedia.summary(query, sentences=2)
    # speak("According to Wikipedia")
    print(results)
    speak(results)

#main function
def random_line(fname):
    lines = open(fname).read().splitlines()
    return random.choice(lines)

def jarvis():
    if __name__ == "__main__":
        while True:
            try:
                query = takeCommand().lower()
                if 'wikipedia' in query:      #search in wikipedia
                    # speak("Searching Wikipedia..")
                    query = query.replace("wikipedia", "")
                    results = wikipedia.summary(query, sentences = 2)
                    speak("According to wikipedia")
                    print(results)
                    speak(results)
                elif 'open youtube' in query:       #opening youtube
                    webbrowser.open('https://youtube.com')
                elif 'how are you' in query:
                    speak(' I am cool, because you are not using me much today')

                # elif 'play music' in query:     #play music
                #     music_dir = 'C:\\Users\\K Koushik\\Desktop\\Jarvis\\songs'
                #     songs = os.listdir(music_dir)
                #     print(songs)
                #     playsound(songs[0])
                #     play_music.play_music()
                #     if 'next' or 'change' in query:
                #         play_music.play_music()
                elif 'the time' in query:       #the time
                    strTime = datetime.datetime.now().strftime("%H:%M:%S")
                    speak(f"The time is {strTime}")
                elif 'the date' in query:
                    strDate = datetime.datetime.now()
                    speak(strDate.strftime("today's date is %wth %B, "+str(strDate.year)))
                elif 'search' in query:     #Searching in browser
                    # speak("Searching ..")
                    query = query.replace("search", "")
                    results = wikipedia.summary(query, sentences = 2)
                    print(results)
                    speak(results)
                
                #some crazy stuff
                
                elif 'is your name' in query:
                    speak("Jarvis is my name, helping you is my game")
                elif 'your age' in query:
                    age.age()
                elif 'your birthday' in query:
                    speak("We can pretend thats, it's on February 30th, wait for it we will celebrate that day..")
                elif 'you saw avengers endgame' in query:
                    speak("Yes, I love movies, what do u want to know about it?")
                    query = takeCommand().lower()
                    webbrowser.open("https://google.com/search?q=%s" % query)
                elif 'do you eat' in query:
                    speak("I am trained to eat you Brain")
                elif 'tell me a joke' in query:
                    speak(random_line('jokes.txt'))
                #craziness ends


                elif 'locate' in query:
                    query = query.replace('locate', '')
                    speak('locating ' +query)
                    webbrowser.open('https://google.co.in/maps?q=%s' %query)

                
                elif 'who is' or 'what is' in query:
                    query = query.replace("who is" or 'what is', "")
                    results = wikipedia.summary(query, sentences = 1)
                    print(results)
                    speak(results)
                
                elif 'what is the meaning of' in query:
                    query = query.replace("what is the meaning of ", "")
                    dictionary.main(query)
                

                

            except Exception as e:
                jarvis()

# check_net()
jarvis()