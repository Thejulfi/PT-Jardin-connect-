import os
import MySQLdb
db = MySQLdb.connect(host="localhost", user="root", passwd="root", db="test")
cur=db.cursor()
cur.execute(open('RQ.sql', 'r'))
db.commit()


