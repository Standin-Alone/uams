

var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

var MySQLEvents = require('mysql-events');
var dsn = {
  host:     'localhost',
  user:     'root',
  password: ''
};


var watcher = mysqlEventWatcher.add('uams_db.user.field.value',function(){
  
})
var myCon = MySQLEvents(dsn);


io.sockets.on('connection', function(socket){
  console.warn('connected')



 
});



http.listen(9090, function(data) {

  console.log('Listening on Port 9090');
});








