import pymysql as sql

def connect():
    conn = sql.connect(host="localhost", user="root", passwd="", db="files")
    cur = conn.cursor()
    #cur.execute("CREATE TABLE IF NOT EXISTS flogin (id INTEGER PRIMARY KEY AUTO_INCREMENT, name TEXT, position TEXT, username TEXT, passw TEXT, dept TEXT, permit TEXT)")
    conn.commit()
    conn.close()

def insert(name, position, username, passw, dept, permit):
    conn = sql.connect(host="localhost", user="root", passwd="", db="files")
    cur = conn.cursor()
    record = [name, position, username, passw, dept, permit]
    cur.execute("INSERT INTO flogin (name, position, username, passw, dept, permit) VALUES (%s, %s, %s, %s, %s, %s)" , record)
    conn.commit()
    conn.close()

def view():
    conn = sql.connect(host="localhost", user="root", passwd="", db="files")
    cur = conn.cursor()
    cur.execute("SELECT * FROM flogin")
    data = cur.fetchall()
    conn.close()
    return data

def search(permit="", name="", position="", username="", passw="", dept=""):
    conn = sql.connect(host="localhost", user="root", passwd="", db="files")
    cur = conn.cursor()
    cur.execute("SELECT * FROM flogin WHERE permit = %s OR name = %s", [permit, name])
    data = cur.fetchall()
    conn.close()
    return data

def delete(id):
    conn = sql.connect(host="localhost", user="root", passwd="", db="files")
    cur = conn.cursor()
    cur.execute("DELETE FROM flogin WHERE id = %s", [id])
    conn.commit()
    conn.close()

def update(id, name, position, username, passw, permit, dept):
    conn = sql.connect(host="localhost", user="root", passwd="", db="files")
    cur = conn.cursor()
    cur.execute("UPDATE flogin SET name = %s, position = %s, username = %s, passw = %s, dept = %s, permit = %s WHERE id = %s", [name, position, username, passw, dept, permit, id])
    conn.commit()
    conn.close()

connect()       #must always run whenever program is opened
