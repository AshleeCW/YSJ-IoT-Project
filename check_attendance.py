#!/usr/bin/env python
import time
import RPi.GPIO as GPIO
from mfrc522 import SimpleMFRC522
import mysql.connector

db = mysql.connector.connect(
  host="cs2s.yorkdc.net",
  user="ashlee.w",
  passwd="X9GQ3STN",
  database="ashleewilliamson_attend"
)

cursor = db.cursor()
reader = SimpleMFRC522()

try:
  while True:
    print("Place Card to record attendance")
    id, text = reader.read()

    cursor.execute("Select id, name FROM users WHERE rfid_uid="+str(id))
    result = cursor.fetchone()

    if cursor.rowcount >= 1:
      print("Welcome " + result[1])
      cursor.execute("INSERT INTO attendance (user_id) VALUES (%s)", (result[0],) )
      db.commit()
    else:
      print("User does not exist.")
    time.sleep(2)
except KeyboardInterrupt:
	print("Keyboard exit")
finally:
  GPIO.cleanup()
