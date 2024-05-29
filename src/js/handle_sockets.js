socket.on('recieve_room_messages',(msg)=>{
  console.log(msg);
  addMessage(msg.message,msg.imageurl,msg.username)
  scrollToBottom('mmmmmm')
  })


  socket.on('private', function(msg) {
    console.log(msg);
  addMessage(msg.message,msg.imageurl,msg.username)
  scrollToBottom('mmmmmm')
});