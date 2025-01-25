import json
# import friday
from jarvis import *
import jarvis

def main(query):
    collection = json.load(open("collection.json"))
    query = query.lower()
    if query in collection:
        meaning = collection[query]
        if type(meaning) == list:
            for item in meaning:
                jarvis.speak(query +" means " +item)
                print(query +" means " +item)
        else:
            jarvis.speak(meaning)

    else:
        jarvis.speak("No such word")   