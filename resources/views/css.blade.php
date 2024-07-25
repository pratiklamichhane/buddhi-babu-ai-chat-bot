<style>
        *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
/* Default Color */

:root{
    --text-color: #ffffff;
    --icon-color: #acacbe;
    --icon-hover-bg: #5b5e71;
    --placeholder-color: #cccccc;
    --outgoing-chat-bg: black;
    --incoming-chat-bg: #444654;
    --outgoing-chat-border: #343541;
    --incoming-chat-border: #444654;
}

/* Light Mode */
.light-mode{
    --text-color: #343541;
  --icon-color: #a9a9c;
  --icon-hover-bg: #f1f1f3;
  --placeholder-color: #9f9f9f;
  --outgoing-chat-bg: #ffffff;
  --incoming-chat-bg: #f7f7f8;
  --outgoing-chat-border: #ffffff;
  --incoming-chat-border: #d9d9e3;
}
body{
    background: var(--outgoing-chat-bg);
}
.chat-container{
    max-height: 100vh;
    padding-bottom: 150px;
    overflow-y: auto;
}
.Default-Text{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: var(--text-color);
    height: 70vh;
    text-align: center;
    padding: 0 10px;
}
.Default-Text h1{
    font-size: 3.3rem;
}
.Default-Text p{
    margin-top: 2px;
    font-size: 1.70rem;
}
.chat-container .chat{
    padding: 25px 10px;
    display: flex;
    justify-content: center;
    color: var(--text-color);
}
.chat-container .outgoing{
    background-color: var(--outgoing-chat-bg);
    border: 1px solid var(--outgoing-chat-border);
}
.chat-container .incoming{
    background-color: var(--incoming-chat-bg);
    border: 1px solid var(--incoming-chat-border);
}
.chat .chat-content-box{
    max-width: 1200px;
    width: 100%;
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
}
.chat .chat-content-box span{
    color: var(--icon-color);
    font-size: 1.3rem;
    visibility: hidden;
}
.chat:hover .chat-content-box:not(:has(.loading-dots-animation)) span{
    visibility: visible;
}
.chat-container .chat-details{
}
.chat-container .chat-details p{
   white-space: pre-wrap;
   font-size: 1.05rem;
   padding: 0 5px 0 25px;
}

li {
    list-style-type: none;
}

p.error{
 color: rgb(255, 43, 43);
}

.chat-container .chat-details img{
   width: 40px;
   height: 40px;
   border-radius: 2px;
   object-fit: cover;
   align-self: flex-start;
}
span.material-symbols-rounded{
    user-select: none;
    cursor: pointer;
}
.loading-dots-animation{
    display: inline-flex;
    padding-left: 25px ;
}
.loading-dots-animation .loading-dot{
    background: var(--text-color);
    height: 7px;
    width: 7px;
    border-radius: 50%;
    margin: 0 3px;
    opacity: 0.7;
    animation: MakeLoadingAnimation 1.5s ease-in-out var(--delay) infinite;
}

@keyframes MakeLoadingAnimation {
    0%, 44% {
        transform: translate(0px);
    }
    22%{
        opacity: 0.4;
        transform: translateY(-6px);
    }
    44% {
        opacity: 0.2;
    }
}

.user-input-container{
    position: fixed;
    bottom: 0;
    width: 100%;
    background: var(--outgoing-chat-bg);
    border: 1px solid var(--incoming-chat-border);
    display: flex;
    justify-content: center;
    padding: 20px 10px;
}
.user-input-container .user-input-content{
    display: flex;
    align-items: flex-start;
    max-width: 950px;
    width: 100%;
}
.user-input-container .user-input-textarea{
    display: flex;
    position: relative;
    width: 100%;
}
.user-input-textarea textarea{
    width: 100%;
    height: 55px;
    border: none;
    resize: none;
    font-size: 1rem;
    color: var(--text-color);
    background: var(--incoming-chat-bg);
    border-radius: 4px;
    outline: 1px solid var(--incoming-chat-bg);
    padding: 15px 45px 15px 20px;
    max-height: 250px;
    overflow-y: auto;
}
.user-input-textarea textarea::placeholder{
    color: var(--placeholder-color);
}
.user-input-textarea span {
    position: absolute;
    bottom: 0;
    right: 0;
    visibility: hidden;
}
.user-input-textarea textarea:valid ~ span {
    visibility: visible;
}
.user-input-content span{
    height: 55px;
    width: 55px;
    color: var(--text-color);
    display: flex;
    align-items: center;
    justify-content: center;
}
.typing-controls{
    display: flex;
}
.typing-controls span{
    margin-left: 7px;
    font-size: 1.4rem;
    border-radius: 4px;
    background: var(--incoming-chat-bg);
    border: var(--incoming-chat-bg);
}

:where(.chat-container, textarea)::-webkit-scrollbar{
    width: 6px;
}
:where(.chat-container, textarea)::-webkit-scrollbar-track{
    background: var(--incoming-chat-bg);
    border-radius: 25px;
}
:where(.chat-container, textarea)::-webkit-scrollbar-thumb{
    background: var(--icon-color);
    border-radius: 25px;
}
    </style>