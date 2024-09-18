const form = document.querySelector(".typing-area"),
inputf = form.querySelector(".inputf"),
sendbtn = form.querySelector(".btn"),
chatbox = document.querySelector(".chat-box");
shrbtn = form.querySelector(".share");

form.onsubmit = (e)=>{
    e.preventDefault();

}

sendbtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "insertchat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputf.value = "";
                scrolltobottom();
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

chatbox.onmouseenter = ()=>{
    chatbox.classList.add("active");
}
chatbox.onmouseleave = ()=>{
    chatbox.classList.remove("active");
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "getchat.php", true);
    
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatbox.innerHTML = data;
                if(!chatbox.classList.contains("active")){
                    scrolltobottom();
                }
               
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
    
}, 500);

function scrolltobottom(){
    chatbox.scrollTop = chatbox.scrollHeight;
}