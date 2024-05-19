const sethSelectorBtn= document.querySelector('seth-selector')
const rahSelectorBtn= document.querySelector('rah-selector')
const chatHeaderBtn= document.querySelector('.chat-header')
const chatMessages= document.querySelector('.chat-message')
const chatInputForm= document.querySelector('.chat-input-form')
const chatInput= document.querySelector('.chat-input')
const clearChatBtn= document.querySelector('.clear-chat-button')

const createchatMessageElement = (message) => `
<div class="message ${message.sender === 'Seth' ? 'blue-bg' : 'purple-bg'}">
        <div class="message-sender">${message.sender}</div>
        <div class="message-text">${message.text}</div>
        </div>
         <div class="message-timestamp">${message.timestamp}</div>

`
let messageSender = 'Seth'

const updateMessageSender = (name) => {
    messageSender = name
    chatHeader.innerText = `${messageSender} chatting....` 
    chatInput.placeholder = `Type here, ${messageSender}`

    if (name === 'Seth') {
       sethSelectorBtn.classList.add('active-person') 
       rahSelectorBtn.classList.remove('active-person') 

    }
    if (name === 'Rah') {
        rahelectorBtn.classList.add('active-person') 
        sethSelectorBtn.classList.remove('active-person') 
    }
    chatInput.focus()
 
}

sethSelectorBtn.onclick= () => updateMessageSender('Seth')
rahSelectorBtn.onclick= () => updateMessageSender('Rah')


const sendMessage = (e) => {
    e.preventDefault()

    
    const timestamp = new Date().toLocaleString('en-US', {hour: 'numeric', minute: 'numeric', hour12: true});
    const message = {
        sender:'',
        text: chatInput.ariaValueMax,
        timestamp

    }
    chatMessages.innerHTML += chatMessageElement(message)

}
chatInputForm.addEventListener('submit', sendMessage)
