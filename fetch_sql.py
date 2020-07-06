import mysql.connector
from mysql.connector import Error

try:
    connection = mysql.connector.connect(host='',
                                         database='',
                                         user='',
                                         password='')

    sql_select_Query = "SELECT * from users"
    cursor = connection.cursor()
    cursor.execute(sql_select_Query)
    users = cursor.fetchall()
    print("Total number of rows in Users is: ", cursor.rowcount)

    print("\nPrinting each User record")
    for row in users:
        print("Id = ", row[0], )
        print("RFID = ", row[1])
        print("Username  = ", row[2])
        print("Added date  = ", row[3], "\n")

except Error as e:
    print("Error reading data from MySQL table", e)
finally:
    if (connection.is_connected()):
        connection.close()
        cursor.close()
        print("MySQL connection is closed")
