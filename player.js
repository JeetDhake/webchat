function play(url, type){
    const mediaDiv = document.getElementById('player');
    const yer = document.getElementById('yer');
    
    if (type === 'video') {
        yer.innerHTML = `<video controls width="200">
            <source src="uploads/${url}">
        </video>`;
    } else if (type === 'audio') {
        yer.innerHTML = `<audio controls>
            <source src="uploads/${url}">
        </audio>`;
    }
    
    mediaDiv.style.display = 'block';

}

function clsply() {
    document.getElementById('player').style.display = 'none'; // Hide the div
}

// <audio controls>
// <source src="uploads/'.$row['aud'].'">
// </audio>

// <video controls width="200">
//         <source src="uploads/'.$row['vid'].'">
// </video>
