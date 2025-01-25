import pyttsx3

engine = pyttsx3.init()

# Get available voices
voices = engine.getProperty('voices')
for i, voice in enumerate(voices):
    print(f"Voice {i+1}")
    print("ID:", voice.id)
    print("Name:", voice.name)
    print("Languages:", voice.languages)
    print("")

    # Set the voice
    engine.setProperty('voice', voice.id)
    engine.say("Hello, how are you?")
    engine.runAndWait()
