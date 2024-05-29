const scrollToBottom = (id) => {
  const element = document.getElementById(id);
  element.scrollTop = element.scrollHeight;
console.log('dd')
}


const addMessage = (message,imageurl,username,isSender = false)=>{
let classes = isSender ? 'mine':'other';
  var div = document.createElement('div'); //container to append to
            div.classList.add('chat', 'column_flex', classes)
            div.innerHTML = `
                    <div class='user_avater row_flex'>
                        <img src="${imageurl} " alt="">
                        <span> ${username}</span>
                    </div>
                    <div class='msg'>
                      ${message}
                    </div>`;
            document.querySelector('.ch').append(div)
}