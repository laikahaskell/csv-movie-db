import csv
import sys
from datetime import date
d = date.today()
objTitle = input("Enter film/album title: ")
objArtist = input("Enter artist: ")
objYear = input("Enter release year: ")
objRating = input("Enter your rating: ")
with open(sys.argv[1], 'a', newline='') as csvFile:
    csvWriter = csv.writer(csvFile)
    csvWriter.writerow([objTitle, objArtist, objYear, objRating, d.isoformat()])

