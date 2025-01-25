import folium

fg = folium.FeatureGroup("the map")
fg.add_child(folium.GeoJson(data=(open('india_states.json', 'r', encoding='utf-8-sig').read())))

fg.add_child(folium.Marker(location=[17.3850, 78.4867], popup='Here is it!'))

map = folium.Map(location=[17.3850, 78.4867], zoom_start=5)
map.add_child(fg)
map.save('test.html')