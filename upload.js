function upload_from(id){

    const elements = document.querySelectorAll('.abs');
    
    elements.forEach(element => {
        if(id !== element.id){
            element.style.display = 'none';
        }
    });

    const element = document.getElementById(id);
    if (element.style.display === 'flex') {
        element.style.display = 'none';
    } else {
        element.style.display = 'flex';
    }
}



const imgf = document.getElementById("img");
const audf = document.getElementById("aud");
const vidf = document.getElementById("vid");
const docf = document.getElementById("doc");

const drop0 = document.getElementById("drop0");
const drop1 = document.getElementById("drop1");
const drop2 = document.getElementById("drop2");
const drop3 = document.getElementById("drop3");
const imgview = document.getElementById("img-view");
const imgview1 = document.getElementById("img-view1");
const imgview2 = document.getElementById("img-view2");
const imgview3 = document.getElementById("img-view3");

imgf.addEventListener("change", uploadImage);
audf.addEventListener("change", uploadAudio);
vidf.addEventListener("change", uploadVideo);
docf.addEventListener("change", uploadDocument);

function uploadImage(){
    imgf.files[0];
    let imgLink = URL.createObjectURL(imgf.files[0]);
    imgview.style.backgroundImage = `url(${imgLink})`;
    imgview.textContent = "";
    
}
function uploadAudio(){
    let x = audf.files[0];
    let imgLink = URL.createObjectURL(audf.files[0]);
    imgview1.style.backgroundImage = `url(${imgLink})`;
    let fileName = x.name;
    imgview1.innerHTML = `<i class='fa-solid fa-headphones-simple fa-xl'></i> <br> ${fileName}`;
    console.log(fileName);
}
function uploadVideo(){
    const x = vidf.files[0];
    let imgLink = URL.createObjectURL(vidf.files[0]);
    imgview2.style.backgroundImage = `url(${imgLink})`;
    const fileName = x.name;
    imgview2.innerHTML = `<i class='fa-regular fa-file-video fa-xl'></i> <br> ${fileName}`;
    
}
function uploadDocument(){
    const x = docf.files[0];
    let imgLink = URL.createObjectURL(docf.files[0]);
    imgview3.style.backgroundImage = `url(${imgLink})`;
    const fileName = x.name;
    imgview3.innerHTML = `<i class='fa-solid fa-file-invoice fa-xl'></i> <br> ${fileName}`;
    
}

drop0.addEventListener("dragover", function(e){
    e.preventDefault();
});
drop0.addEventListener("drop", function(e){
    e.preventDefault();
    imgf.files = e.dataTransfer.files;
    uploadImage();
});

drop1.addEventListener("dragover", function(e){
    e.preventDefault();
});
drop1.addEventListener("drop", function(e){
    e.preventDefault();
    audf.files = e.dataTransfer.files;
    uploadAudio();
});

drop2.addEventListener("dragover", function(e){
    e.preventDefault();
});
drop2.addEventListener("drop", function(e){
    e.preventDefault();
    vidf.files = e.dataTransfer.files;
    uploadVideo();
});

drop3.addEventListener("dragover", function(e){
    e.preventDefault();
});
drop3.addEventListener("drop", function(e){
    e.preventDefault();
    docf.files = e.dataTransfer.files;
    uploadDocument();
});