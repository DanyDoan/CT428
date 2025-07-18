//node.js
var http = require('http');

var server = http.createServer(function(req, res){
    res.writeHead(200, {'Content-type': 'text/xml'});
    res.end('Hello world!');
})

server.listen(800, "localhost", function(){
    console.log("Server running at http://localhost:800");
});