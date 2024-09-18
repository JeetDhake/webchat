const pf = document.querySelector(".signup input[type='password']"),
togglebtn = document.querySelector(".signup .field i");

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

const drop = document.getElementById("drop");
const inputf = document.getElementById("img");
const imgview = document.getElementById("img-view");

inputf.addEventListener("change", uploadImage);

function uploadImage(){
    inputf.files[0];
    let imgLink = URL.createObjectURL(inputf.files[0]);
    imgview.style.backgroundImage = `url(${imgLink})`;
    imgview.textContent = "";
    
}

drop.addEventListener("dragover", function(e){
    e.preventDefault();
});
drop.addEventListener("drop", function(e){
    e.preventDefault();
    inputf.files = e.dataTransfer.files;
    uploadImage();
});


