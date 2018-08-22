import requests
import json
import os,sys
from PIL import Image

jpgfile = Image.open('/home/ron/Git Repositories/dataset/adidas_01.jpg')
requests.post('http://localhost:5000/', data ={'image':jpgfile})
