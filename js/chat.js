// Start users list 
const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button");

searchBtn.onclick = ()=>{
    searchBtn.classList.toggle("active");
    searchBar.classList.toggle("show");
    searchBar.focus();
}

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    

    if (searchTerm != "") {
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");
    }
    // Ajax request to fetch users
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../Model/chatController.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
            const data = xhr.response;
            document.querySelector(".users .users-list").innerHTML = data;
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("action=search&searchTerm=" + searchTerm);
}

setInterval(() => {
    // Ajax request to fetch users
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../Model/chatController.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
            const data = xhr.response;
            if (!searchBar.classList.contains("active")) {
                document.querySelector(".users .users-list").innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("action=getUsers");
}, 500); // fetch users every 500ms

document.addEventListener("DOMContentLoaded", function () {
    const usersList = document.querySelector(".users-list");
    const chatWrapper = document.querySelector(".wrapper-chat");
    const chatPlaceholder = document.querySelector(".chat-placeholder");

    usersList.addEventListener("click", function (e) {
        const target = e.target.closest(".user-item");
        if (target) {
            e.preventDefault();


            // تغيير اسم المستخدم في الشات
            const userName = target.getAttribute("data-name");
            document.querySelector(".chat-username").textContent = userName;

            
            const userID = target.getAttribute("data-id");
            document.querySelector(".receiver-id").value = userID;

            document.querySelector(".input-field").focus();
            scrollToBottom(); // scroll to the bottom of the chat box
        }
    });
});
//End users list

// ----------------------------------------------------------------

// Start chat messages

const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendButton = form.querySelector("button");
const chatBox = document.querySelector(".chat-box");

// Send message on button click
form.onsubmit = (e) => {
    e.preventDefault(); // prevent default form submission
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../Model/chatController.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
            inputField.value = ""; // clear the input field after sending message
            scrollToBottom(); // scroll to the bottom of the chat box
        }
    }
    let formData = new FormData(form);
    formData.append("action", "sendMessage");
    xhr.send(formData);
}



setInterval(() => {
    // Ajax request to fetch messages
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../Model/chatController.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
        }
    }
    let formData = new FormData(form);
    formData.append("action", "getMessages");
    xhr.send(formData);
}, 500); // fetch messages every 500ms
    
function scrollToBottom() {
    // Scroll to the bottom after the page components are loaded
document.addEventListener("DOMContentLoaded", () => {
    chatBox.scrollTop = chatBox.scrollHeight + 500; // scroll to the bottom of the chat box
});
    
}