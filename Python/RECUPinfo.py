import MySQLdb
db = MySQLdb.connect(host="localhost", user="root", passwd="root", db="test")
cur=db.cursor()
cur.execute("""SELECT * FROM Test""")
tableau = cur.fetchall()
for i in tableau:
	print(i[1])
