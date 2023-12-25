#!/usr/bin/env python
import mysql.connector
import sys

conn = mysql.connector.connect(host="localhost",port="3306", user="root", passwd="", database="test")
cursor = conn.cursor()
cursor.execute("select * from test where test_no ="+sys.argv[1]+" and question_no="+sys.argv[2])
rec= cursor.fetchall()
print("total Data: ", cursor.rowcount)


cursor.execute("UPDATE user_test SET content =, vocabulary= , grammar= where test_no ="+sys.argv[1]+" and question_no="+sys.argv[2])
cursor.close()
conn.close()