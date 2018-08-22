#!flask/bin/python
from flask import Flask, render_template, request, Markup, jsonify
from werkzeug import secure_filename
import test
from datetime import datetime
app = Flask(__name__)

@app.route('/upload')
def upload_file():
   return render_template('upload.html')
	
@app.route('/uploader', methods = ['GET', 'POST'])
def upload_file2():
   if request.method == 'POST':
      f = request.files['file']
      lat = request.form['latitude']
      long = request.form['longitude']
      date = request.form['date']
      Date = datetime.strptime(date, '%d/%m/%Y')
      ext = f.filename.split(sep='.')
      f.save(secure_filename('img.'+ext[-1]))
      result = test.predict(float(lat), float(long), Date)
      #message = Markup('<a href="http://192.168.43.19/hackinfi/index.php/user_authentication>Click Here</a>')
      #flash(message)
      #return render_template('http://192.168.43.19/hackinfi/index.php/user_authentication')
      if result == 'legal':
          return '<h1>The image and the loction sent by tells the billboard to be '+result+'</h1><button id="close">close</button><script>document.getElementById("close").onclick = function(){ window.close();}</script>'
      else:
          result = ', '.join(result)
          return '<h1>These billboards are illegal - '+result+'</h1><button id="close">close</button><script>document.getElementById("close").onclick = function(){ window.close();}</script>'
      		
if __name__ == '__main__':
   app.run(host='0.0.0.0', debug = False)
