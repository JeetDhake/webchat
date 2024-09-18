const sbar = document.querySelector(".users .search input"),
sbtn = document.querySelector(".users .search button"),
userlist = document.querySelector(".users .userlist");

sbtn.onclick = ()=>{
    sbar.classList.toggle("active");
    sbar.focus();
    sbtn.classList.toggle("active");
    sbar.value = "";
}

sbar.onkeyup = ()=>{
    let searchTerm = sbar.value;
    if(searchTerm != ""){
        sbar.classList.add("active");
    }
    else{
        sbar.classList.remove("active");
    }
    
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "search.php", true);
        
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    userlist.innerHTML = data;
    
                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" +  searchTerm);
    
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "user.php", true);
    
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!sbar.classList.contains("active")){
                    userlist.innerHTML = data;
                }

            }
        }
    }
    xhr.send();
}, 500);