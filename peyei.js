const pf = document.querySelector(".login input[type='password']"),
togglebtn = document.querySelector(".login .field i");

togglebtn.onclick = ()=>{
    if(pf.type == "password"){
        pf.type = "text";
        togglebtn.classList.add("active");
    }
    else{
        pf.type = "password";
        togglebtn.classList.remove("active");
    }
}