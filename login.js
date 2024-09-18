const form  = document.querySelector(".login form"),
conbtn = form.querySelector(".btn input"),
errtxt = form.querySelector(".error");

form.onsubmit = (e)=>{
    e.preventDefault();

}
conbtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "log.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);

                if(data == "success"){
                    location.href = "users.php";
                }
                else{
                    errtxt.classList.add("active");
                    
                    errtxt.style.dispaly = "block";
                    errtxt.textContent = data;
                    
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}