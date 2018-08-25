# Illegal Hoarding

This is a web app which can be used to check whether a billboard is legal or illegal.

## Website

The website is designed for both, the MCD as well as the people. So during the login page, anyone can login.
If MCD logins, they will be able to view the whole database as well as the complaints that are currently pending. And if a person logins, he/she will be able to make a complaint using the web app.

## RESTapi

The user will click the picture of the billboard from his cellphone. When the user uploads it, three things are uploaded to the server using the REST api and they are -
1. Photo of the Billboard - It is used to find out the company it belongs to using image processing
2. Location - It is used to check whether the billboard should exist at that location or not. In order to get the correct results, the user should be in the 50m radius of the billboard. If the billboard should exist there, the algorithm will verify whether the billboard is of the same company or not.
3. Current Time - Time is used to check if the billboard is expired or not. Based on that it will be decided whether the billboard is legal or not.

## Image Processing

The image processing is done using YOLO which uses darknet. There is a pretrained dataset for 47 major brands. All the files are present here except for the dataset which can be downoaded from [here](https://drive.google.com/open?id=16fv3XXI4mlKg-1KEH20-lBVG00BWwyLf). The results are given in real time and multiple billboards can be verified in the same image.
