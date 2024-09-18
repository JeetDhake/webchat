const form  = document.querySelector(".signup form"),
conbtn = form.querySelector(".btn input"),
errtxt = form.querySelector(".error");

form.onsubmit = (e)=>{
    e.preventDefault();

}
conbtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "sent.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "users.php";
                }
                else{
                    errtxt.classList.add("active");
                    errtxt.textContent = data;
                    errtxt.style.dispaly = "block";
                    
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}