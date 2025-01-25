import pyttsx3
import speech_recognition as sr


def speak(text):
    engine = pyttsx3.init()
    voices = engine.getProperty('voices')
    # print(voices)
    engine.setProperty('voice', voices[18].id)
    engine.say(text)
    engine.runAndWait()


def listen():
    r = sr.Recognizer()
    with sr.Microphone() as source:
        print("Listening...")
        audio = r.listen(source)

    try:
        print("Recognizing...")
        query = r.recognize_google(audio)
        print(f"You said: {query}")
        return query.lower()
    except sr.UnknownValueError:
        print("Sorry, I didn't understand. Please try again.")
        return ""
    except sr.RequestError:
        print("Sorry, I couldn't reach the speech recognition service.")
        return ""


def assistant():
    while True:
        command = "hello"

        if "hello" in command:
            speak("Hello! How can I assist you?")
        elif "goodbye" in command:
            speak("Goodbye!")
            break
        else:
            speak("I'm sorry, I don't know how to help with that.")


if __name__ == "__main__":
    assistant()
