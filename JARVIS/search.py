import webbrowser
import googlesearch
from googlesearch import search
try: 
    from googlesearch import search 
except ImportError:  
    print("No module named 'google' found") 
  
# to search 
query = "whatsapp"
  
for j in search(query, tld="co.in", num=10, stop=1, pause=2): 
    webbrowser.open(j) 
