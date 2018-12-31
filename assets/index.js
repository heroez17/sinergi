var mysql = require("mysql");
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "ibenk1234",
    database: "db_antri"
});




io.on('connection',function(socket){
	socket.on('chat message',function(msg){
		io.emit('chat message',msg);
		console.log(msg);
		});
		
		socket.on('tampil',function(daa){
		io.emit('tampil',daa);
		console.log(daa);
		});
	
	});



http.listen(3000,function(){
console.log('listening on *:3000');
});