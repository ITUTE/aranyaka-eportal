import pymysql as sql

def connect():
    conn = sql.connect(host="localhost", user="root", passwd="", db="files")
    cur = conn.cursor()
    #cur.execute("CREATE TABLE IF NOT EXISTS faculty (id INTEGER PRIMARY KEY AUTO_INCREMENT, name TEXT, position TEXT, username TEXT, passw TEXT, permit TEXT, dept TEXT)")
    conn.commit()
    conn.close()

def insert(name, position, username, passw, permit, dept):
    conn = sql.connect(host="localhost", user="root", passwd="", db="files")
    cur = conn.cursor()
    record = [name, position, username, passw, permit, dept]
    cur.execute("INSERT INTO faculty (name, position, username, passw, permit, dept) VALUES (%s, %s, %s, %s, %s, %s)" , record)
    conn.commit()
    conn.close()

def view():
    conn = sql.connect(host="localhost", user="root", passwd="", db="files")
    cur = conn.cursor()
    cur.execute("SELECT * FROM faculty")
    data = cur.fetchall()
    conn.close()
    return data

def search(permit="", name="", position="", username="", passw="", dept=""):
    conn = sql.connect(host="localhost", user="root", passwd="", db="files")
    cur = conn.cursor()
    cur.execute("SELECT * FROM faculty WHERE permit = %s OR name = %s", [permit, name])
    data = cur.fetchall()
    conn.close()
    return data

def delete(id):
    conn = sql.connect(host="localhost", user="root", passwd="", db="files")
    cur = conn.cursor()
    cur.execute("DELETE FROM faculty WHERE id = %s", [id])
    conn.commit()
    conn.close()

def update(id, name, position, username, passw, permit, dept):
    conn = sql.connect(host="localhost", user="root", passwd="", db="files")
    cur = conn.cursor()
    cur.execute("UPDATE faculty SET name = %s, position = %s, username = %s, passw = %s, permit = %s, dept = %s WHERE id = %s", [name, position, username, passw, permit, dept, id])
    conn.commit()
    conn.close()

connect()       #must always run whenever program is opened
