import mysql.connector
import requests
import time


print("Engine1 Project Started!")

for counter in range(50):
    db = mysql.connector.connect(user="root", password="mysql", host="localhost", database="mydb")

    cursor = db.cursor(buffered=True)

    # Creating Task For Categories
    cursor.execute("SELECT * FROM categories WHERE status = '0'")

    categories = cursor.fetchall()

    if len(categories) > 0:
        for val in categories:

            cursor.execute("SELECT * FROM tasks WHERE type = %s AND tasks.range = %s AND tasks.status != '3'", ('0', val[0]))
            tasks = cursor.fetchall()

            if len(tasks) > 0:
            	print('Category Task Already Exists')
            else:

            	cursor.execute("INSERT INTO tasks (type, status, tasks.range) VALUES ('0', %s, %s)", ('0', val[0]))
            	result = db.commit()

            	print(cursor.rowcount, "record inserted.")

    cursor.execute("SELECT * FROM files WHERE status = '0'")

    files = cursor.fetchall()

    if len(files) > 0:
        for val in files:

            cursor.execute("SELECT * FROM tasks WHERE type = %s AND tasks.range = %s AND tasks.status != '3'",('1',val[0]))
            tasks = cursor.fetchall()

            if len(tasks) > 0:
            	print('File Task Already Exists')
            else:

            	cursor.execute("INSERT INTO tasks (type, status, tasks.range) VALUES ('1', %s, %s)",('0', val[0]))
            	result = db.commit()

            	print(cursor.rowcount, "record inserted.")


    cursor.execute("SELECT * FROM coupons WHERE status = '0'")

    coupons = cursor.fetchall()

    if len(coupons) > 0:
        for val in coupons:

            cursor.execute("SELECT * FROM tasks WHERE type = %s AND tasks.range > %s AND tasks.status != '3'",('2',val[0]-5))
            tasks = cursor.fetchall()

            if len(tasks) > 0:
            	print('Coupons Task Already Exists')
            else:

            	cursor.execute("INSERT INTO tasks (type, status, tasks.range) VALUES ('2', %s, %s)",('0', val[0]))
            	result = db.commit()

            	print(cursor.rowcount, "record inserted.")

        

    
    
    # disconnect from server
    db.close()