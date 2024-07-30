function toggleChat() {
    var chatWindow = document.getElementById('chat-window');
    if (chatWindow.style.display === 'none' || chatWindow.style.display === '') {
        chatWindow.style.display = 'block';
    } else {
        chatWindow.style.display = 'none';
    }
}

function sendMessage() {
    var chatBody = document.getElementById('chat-body');
    var chatInput = document.getElementById('chat-input');
    var message = chatInput.value.trim();
    if (message) {
        var messageDiv = document.createElement('div');
        messageDiv.textContent = message;
        messageDiv.className = 'chat-message chat-message-sent';
        chatBody.appendChild(messageDiv);
        chatInput.value = '';
        chatBody.scrollTop = chatBody.scrollHeight; // Scroll to the bottom
    }
}