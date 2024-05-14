<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SETHS CHAT ROOM</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="gradient">
    <div class="person-selector">
      <button
        class="button person-selector-button active person"
        id="seth-selector"
      >
        Seth
      </button>
      <button class="button person-selector-button" id="Rah-selector">
        Rah
      </button>
      <!-- <div class="person-selector">
        <button class="button person-selector-button active-person" id="seth-selector">Seth</button>
        <button class="button person-selector-button" id="Rah-selector">Rah</button>
    </div> -->
    </div>
    <div class="chat-container">
      <h2 class="chat-header">Seth chatting.....</h2>

      <div class="chat-messages">
        <div class="message blue-bg">
          <div class="message-sender">Seth</div>
          <div class="message-text">
            Hey Rah, my name is Seth, a plasure to meet you.
          </div>
        </div>
        <div class="message message-timestamp">10:30 AM</div>
        <!-- </div> -->
        <div class="message purple-bg">
          <div class="message-sender">Rah</div>
          <div class="message-text">
            I'm Rah, always good to make some new friends.
          </div>
        </div>
        <div class="message-timestamp">18:35 AM</div>
      </div>
      <div class="input_section">
        <form class="chat-input-form">
          <!-- <input
            type="text"
            class="chat_input"
            required=""
            placeholder="message.."
          />
          <input type="text" />
          <button type="submit" class="button send-button">Send</button> -->
          <input type="text" class="text_area" />
          <button class="button send-button">Send</button>
        </form>
        <button class="button clear-chat-button">clear chat</button>
      </div>
      <script src="app.js"></script>
    </div>
  </body>
</html>