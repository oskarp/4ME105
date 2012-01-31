This is a very simple demonstration of how a REST service works.

Make it work
============
A few things is needed to make this work

* Make a file called movies.moo in the root of the project and make sure it is writeable
* Make sure the baseUri is set  correctly in dispatch.php


Some sample commands
============
Create a movie
curl -X PUT -d "title=The Life Of Brian&year=1979&grade=9.4" http://replacewithyourservername/4ME105/movie/1

Get a movie
curl -X GET http://replacewithyourservername/4ME105/movie/1

Update a movie
curl -X POST -d "title=The Life Of Brian&year=1979&grade=10" http://replacewithyourservername/4ME105/movie/1

Delete a movie
curl -X DELETE http://replacewithyourservername/4ME105/movie/1



Credits
============
This project makes use of the Tonic framework (http://peej.github.com/tonic/)