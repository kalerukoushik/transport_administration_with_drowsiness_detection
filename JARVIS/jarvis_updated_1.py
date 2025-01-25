import pyttsx3
import datetime
import speech_recognition as sr
import wikipedia
import webbrowser
import os
import random

# import age
# import dictionary
# import downloadImages
# import Drowsiness_Detection


engine = pyttsx3.init()


def speak(audio):
    voices = engine.getProperty('voices')
    engine.setProperty('voice', 'english_rp+f3')
    engine.say(audio)
    engine.runAndWait()


def takeCommand():
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


def jarvis():
    while True:
        try:
            query = input("Type:> ")

            if 'wikipedia' in query:
                query = query.replace("wikipedia", "")
                results = wikipedia.summary(query, sentences=2)
                speak("According to Wikipedia")
                print(results)
                speak(results)
            elif 'open youtube' in query:
                webbrowser.open('https://youtube.com')
            elif 'how are you' in query:
                speak('I am cool because you are not using me much today')
            elif 'the time' in query:
                strTime = datetime.datetime.now().strftime("%H:%M:%S")
                speak(f"The time is {strTime}")
            elif 'the date' in query:
                strDate = datetime.datetime.now()
                speak(strDate.strftime("Today's date is %wth %B, " + str(strDate.year)))
            elif 'search' in query:
                query = query.replace("search", "")
                results = wikipedia.summary(query, sentences=2)
                print(results)
                speak(results)
            elif 'is your name' in query:
                speak("Jarvis is my name, helping you is my game")
            elif 'your age' in query:
                # age.age()
                speak("I am ageless!")
            elif 'your birthday' in query:
                speak("We can pretend that it's on February 30th. Wait for it, we will celebrate that day.")
            elif 'you saw avengers endgame' in query:
                speak("Yes, I love movies. What do you want to know about it?")
                query = takeCommand().lower()
                webbrowser.open("https://google.com/search?q=%s" % query)
            elif 'do you eat' in query:
                speak("I am trained to eat your brain")
            elif 'tell me a joke' in query:
                # speak(random_line('jokes.txt'))
                speak("Why don't scientists trust atoms? Because they make up everything!")
            elif 'locate' in query:
                query = query.replace('locate', '')
                speak('Locating ' + query)
                webbrowser.open('https://google.co.in/maps?q=%s' % query)
            elif 'who is' in query or 'what is' in query:
                query = query.replace("who is", "").replace("what is", "")
                results = wikipedia.summary(query, sentences=1)
                print(results)
                speak(results)
            elif 'what is the meaning of' in query:
                query = query.replace("what is the meaning of ", "")
                # dictionary.main(query)
                speak(f"The meaning of {query} is unknown to me.")
            
        except Exception as e:
            print(e)
            speak("Sorry, I didn't get that. Can you please repeat?")


jarvis()
