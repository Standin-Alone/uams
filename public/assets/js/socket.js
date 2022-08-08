
function socket(){
  
    return  io.connect(window.location.origin+':8080',{ transports: ['websocket','polling'],allowEIO3:true,rejectUnauthorized: true});
}





