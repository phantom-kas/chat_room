
const fs = require('fs');
const https = require('http')
const express = require('express');
const app = express();
const socketio = require('socket.io');
app.use(express.static(__dirname))

//we need a key and cert to run https
//we generated them with mkcert
// $ mkcert create-ca
// $ mkcert create-cert
const key = fs.readFileSync('cert.key');
const cert = fs.readFileSync('cert.crt');

//we changed our express setup so we can use https
//pass the key and cert to createServer on https
const expressServer = https.createServer({key, cert}, app);
//create our socket.io server... it will listen to our express port
const io = socketio(expressServer,{
    cors: {
        origin:'*',
        methods: ["GET", "POST"]
    }
});
expressServer.listen(8181);


let rooms_connced_sockets = {

}

io.on('connect',(socket)=>{
    const userName = socket.handshake.auth.userName;
    const password = socket.handshake.auth.password;
    const room_name_key = `room_${socket.handshake.auth.room}`;
    if(password !== "ligma"){
        socket.disconnect(true);
        return;
    }

    socket.join(room_name_key)
  


   socket.on('send',(msg)=>{
    socket.to(`room_${msg.room}`).emit("recieve_room_messages",msg);
  
   })
})
