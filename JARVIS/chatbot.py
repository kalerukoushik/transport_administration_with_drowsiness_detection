from nltk.chat.util import Chat, reflections
from nltk.chat.util import *
import pyttsx3
import datetime
import speech_recognition as sr
import wikipedia
import webbrowser
import os, requests, bs4, sys
import smtplib
import time
import datetime
import urllib.request as urllib2
#from googlesearch import search 
from googlesearch import *
import googlesearch
#end

engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
engine.setProperty('voice', voices[1].id)


def speak(audio):
    engine.say(audio)
    engine.runAndWait()


#util.py location:
#C:\Users\K Koushik\AppData\Local\Programs\Python\Python36\Lib\site-packages\nltk\chat\util.py


pairs = [
    [
        r"my name is (.*)",
        ["Hello %1, How are you today ?",]
    ],
    [
        r"what are you doing",
        ["I am watching you", "I am talking to you", "I am getting executed", "I am staring at you, so that you wont feel drowsy",]
    ],
    [
        r"(what (.*)calculate|why|why (.*) calculate|(.*) why)",
        ["Visualizing your eye landmarks and Calculating its eucleadian distance", "Because i am programed to look after you, so that you dont fell asleep",]
    ],
     [
        r"(what is your name|who are you|what are you)",
        ["My name is jarvis and I'm your personal assistant",]
    ],
    [
        r"how are you ?",
        ["I'm doing good\nHow about You ?",]
    ],
    [
        r"(fine|yeah (.*)| yeah)",
        ["wow, good to hear that",]
    ],
    [
        r"(wow| wow (.*))",
        ["Yeah", "yes, it is",]
    ],
    [
        r"(sorry (.*)|sorry)",
        ["Its alright","Its OK, never mind",]
    ],
    [
        r"i am (.*) doing good",
        ["Nice to hear that","Alright :)",]
    ],
    [
        r"hi|hey|hello",
        ["Hello", "Hey there",]
    ],
    [
        r"(.*) age?",
        ["I'm a computer program dude\nSeriously you are asking me this?","I was born on 30th February",]
        
    ],
    [
        r"what (.*) want ?",
        ["Make me an offer I can't refuse",]
        
    ],
    [
        r"(.*) created ?",
        ["Koushik created me using Python's NLTK library ","top secret ;)",]
    ],
    [
        r"(.*) (location|city) ?",
        ['Hyderabad, Telangana',]
    ],
    [
        r"(how is the weather in (.*)? | how is weather in (.*)?)",
        ["Weather in %1 is awesome like always","Too hot man here in %1","Too cold man here in %1","Never even heard about %1"]
    ],
    [
        r"i work in (.*)?",
        ["%1 is an Amazing company, I have heard about it.",]
    ],
    [
        r"(.*)raining in (.*)",
        ["No rain since last week here in %2","Damn its raining too much here in %2"]
    ],
    [
        r"how (.*) health(.*)",
        ["I'm a computer program, so I'm always healthy ",]
    ],
    [
        r"(.*) (sports|game) ?",
        ["I'm a very big fan of Cricket",]
    ],
    [
        r"who (.*) sports person ?",
        ["Messy","Ronaldo","Roony"]
    ],
    [
        r"who (.*) (moviestar|actor)?",
        ["Ravi Teja",]
    ],
    # [
    #     r"((.*)ate|(.*)eat",
    # ],
    [
        r"(quit|bye|bhai|see you)",
        ["Bye take care. See you soon ","It was nice talking to you. See you soon"]],
]

my_dummy_reflections= {
    "go"     : "gone",
    "hello"    : "hey there"
}

def jarvis():
    speak("Hello! I am Jarvis") #default message at the start    
    chat = Chat(pairs, reflections)
    chat.converse()
if __name__ == "__main__":
    jarvis()