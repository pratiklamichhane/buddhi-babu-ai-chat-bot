<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buddhi Babu</title>

    <!-- Style Custom Css Starts Here -->
    <link rel="stylesheet" href="/style.css">

    <!-- FavIcon Added Here -->

    <!-- Link For Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    
    <!-- Link For Google Icons  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @include('css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
</head>
<body>
      <!-- chat-container for outgoing and outgoing chat-->
    <div class="chat-container"></div>

    
  <!-- User Pormpt Input Container Starts Here -->

            <div class="user-input-container">
                <div class="user-input-content">
                    <div class="user-input-textarea">
                        <textarea id="chat-input" placeholder="Enter your prompt here" required></textarea>
                        <span id="send-btn" class="material-symbols-rounded">send</span>
                    </div>
                    <div class="typing-controls">
                        <span id="theme-btn" class="material-symbols-rounded">light_mode</span>
                        <span id="delete-btn" class="material-symbols-rounded">delete</span>
                    </div>
                </div>
            </div>
  
            <script>
                $(document).ready(function () {
    const PromptInput = $("#chat-input");
    const SendBtn = $("#send-btn");
    const ChatContainer = $(".chat-container");
    const ThemeBtn = $("#theme-btn");
    const DeleteBtn = $("#delete-btn");

    let UserPrompt = null;

    const CreateElement = (html, ClassName) => {
        const ChatDiv = $("<div></div>").addClass("chat " + ClassName).html(html);
        return ChatDiv;
    };


    const DataFromLocalStorage = () => {
        let ThemeSwitcher = localStorage.getItem("Theme-Switcher");
        $("body").toggleClass("light-mode", ThemeSwitcher === "light_mode");
        ThemeBtn.text(ThemeSwitcher || "light_mode");

        let AllChats = localStorage.getItem("All-Chats");
        if (AllChats) {
            ChatContainer.html(AllChats);
        } else {
            ChatContainer.html(`
                <div class="Default-Text">
                    <h1>Buddhi Babu</h1>
                    <p>Future of AI !</p>
                </div>
            `);
        }
        ChatContainer.scrollTop(ChatContainer.prop("scrollHeight"));
    };

    DataFromLocalStorage();

    const GetGeminiResponses = async (IncominChatDiv) => {
        let PElement = $("<p></p>");
        try {
            SendBtn.prop("disabled", true);
            const Responses = await $.post('/chat-fetch', { prompt: UserPrompt , _token: "{{ csrf_token() }}" });
            PElement.html(Responses.result.trim());
            PromptInput.val("");
        } catch (error) {
            console.error(error);
            PElement.addClass("error");
            PElement.text("Oops something went wrong while getting responses please try again");
        }
        IncominChatDiv.find(".loading-dots-animation").remove();
        IncominChatDiv.find(".chat-details").append(PElement);
        ChatContainer.scrollTop(ChatContainer.prop("scrollHeight"));
        localStorage.setItem("All-Chats", ChatContainer.html());
    };

    const CopyResponses = (CopyBtn) => {
        let ResponseText = $(CopyBtn).parent().find("p");
        navigator.clipboard.writeText(ResponseText.text());
        $(CopyBtn).text("done");
        setTimeout(() => $(CopyBtn).text("content_copy"), 1000);
    };

    const TypyingAnimation = () => {
        const html = `<div class="chat-content-box">
                        <div class="chat-details">
                            <img src="https://i.ibb.co/crKsfZc/blue-modern-robotic-logo.png" alt="chatbot-image">
                            <div class="loading-dots-animation">
                                <div class="loading-dot" style="--delay:0.2s;" ></div>
                                <div class="loading-dot" style="--delay:0.3s;" ></div>
                                <div class="loading-dot" style="--delay:0.4s;" ></div>
                            </div>
                        </div> 
                        <span class="material-symbols-rounded">content_copy</span>
                    </div>`;
        const IncominChatDiv = CreateElement(html, "incoming");
        ChatContainer.append(IncominChatDiv);
        ChatContainer.scrollTop(ChatContainer.prop("scrollHeight"));
        GetGeminiResponses(IncominChatDiv); // Getting Generated Responses
    };

    const OutgoinChat = () => {
        UserPrompt = PromptInput.val().trim();
        if (!UserPrompt) return;
        const html = `<div class="chat-content-box">
                            <div class="chat-details">
                                <img src="https://charmouthtennisclub.org/wp-content/uploads/2021/01/placeholder-400x400.jpg" alt="user-image">
                                <p></p>
                            </div>
                        </div>`;
        const OutgoinChatDiv = CreateElement(html, "outgoing");
        ChatContainer.append(OutgoinChatDiv);
        OutgoinChatDiv.find("p").text(UserPrompt);
        $(".Default-Text").remove();
        ChatContainer.scrollTop(ChatContainer.prop("scrollHeight"));
        setTimeout(TypyingAnimation, 500);
    };

    ThemeBtn.on("click", () => {
        $("body").toggleClass("light-mode");
        localStorage.setItem("Theme-Switcher", ThemeBtn.text());
        ThemeBtn.text($("body").hasClass("light-mode") ? "dark_mode" : "light_mode");
    });

    DeleteBtn.on("click", () => {
        if (confirm("Are you sure you want to delete all chats?")) {
            localStorage.removeItem("All-Chats");
        }
        DataFromLocalStorage();
    });

    let InitialHeight = PromptInput.prop("scrollHeight");

    PromptInput.on("input", () => {
        PromptInput.height(InitialHeight).height(PromptInput.prop("scrollHeight"));
    });

    PromptInput.on("keydown", (e) => {
        if (e.key === "Enter" && !e.shiftKey && $(window).width() > 800) {
            e.preventDefault();
            OutgoinChat();
        }
    });

    SendBtn.on("click", OutgoinChat);
});
            </script>
</body>
</html>
