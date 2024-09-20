const form = document.querySelector(".typing-area"),
    inputf = form.querySelector(".inputf"),
    sendbtn = form.querySelector(".btn"),
    chatbox = document.querySelector(".chat-box"),
    shrbtn = form.querySelector(".share");

const frm1 = document.querySelector(".sub1"),
    frm2 = document.querySelector(".sub2"),
    frm3 = document.querySelector(".sub3"),
    frm4 = document.querySelector(".sub4");

const imgbtn = frm1.querySelector('.imgbtn'),
    audbtn = frm2.querySelector('.audbtn'),
    vidbtn = frm3.querySelector('.vidbtn'),
    docbtn = frm4.querySelector('.docbtn');

const elementsx = document.querySelectorAll('.abs');
frm1.onsubmit = (e) => {
    e.preventDefault();
}
frm2.onsubmit = (e) => {
    e.preventDefault();
}
frm3.onsubmit = (e) => {
    e.preventDefault();
}
frm4.onsubmit = (e) => {
    e.preventDefault();
}

form.onsubmit = (e) => {
    e.preventDefault();
}

sendbtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "insertchat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputf.value = "";
                scrolltobottom();
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

imgbtn.onclick = () => {
    let xhr1 = new XMLHttpRequest();
    xhr1.open("POST", "insertimg.php", true);
    xhr1.onload = () => {
        if (xhr1.readyState === XMLHttpRequest.DONE) {
            if (xhr1.status === 200) {

                elementsx.forEach(element => {
                    element.style.display = 'none';
                });

                scrolltobottom();
            }
        }
    }
    let formData = new FormData(frm1);
    xhr1.send(formData);
}

audbtn.onclick = () => {
    let xhr2 = new XMLHttpRequest();
    xhr2.open("POST", "insertaud.php", true);
    xhr2.onload = () => {
        if (xhr2.readyState === XMLHttpRequest.DONE) {
            if (xhr2.status === 200) {
                
                elementsx.forEach(element => {
                    element.style.display = 'none';
                });

                scrolltobottom();
            }
        }
    }
    let formData = new FormData(frm2);
    xhr2.send(formData);
}

vidbtn.onclick = () => {
    let xhr3 = new XMLHttpRequest();
    xhr3.open("POST", "insertvid.php", true);
    xhr3.onload = () => {
        if (xhr3.readyState === XMLHttpRequest.DONE) {
            if (xhr3.status === 200) {
                
                elementsx.forEach(element => {
                    element.style.display = 'none';
                });

                scrolltobottom();
            }
        }
    }
    let formData = new FormData(frm3);
    xhr3.send(formData);
}

docbtn.onclick = () => {
    let xhr4 = new XMLHttpRequest();
    xhr4.open("POST", "insertdoc.php", true);
    xhr4.onload = () => {
        if (xhr4.readyState === XMLHttpRequest.DONE) {
            if (xhr4.status === 200) {
                
                elementsx.forEach(element => {
                    element.style.display = 'none';
                });

                scrolltobottom();
            }
        }
    }
    let formData = new FormData(frm4);
    xhr4.send(formData);
}

chatbox.onmouseenter = () => {
    chatbox.classList.add("active");
}
chatbox.onmouseleave = () => {
    chatbox.classList.remove("active");
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "getchat.php", true);

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatbox.innerHTML = data;
                if (!chatbox.classList.contains("active")) {
                    scrolltobottom();
                }

            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);

}, 500);

function scrolltobottom() {
    chatbox.scrollTop = chatbox.scrollHeight;
}