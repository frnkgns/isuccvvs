const dropArea = document.getElementById("drop-area");
const inputfile = document.getElementById("input-file");
const imageview = document.getElementById("img-view");

//itong part naman is para sa image or profile ni candidate
inputfile.addEventListener("change", uploadImage);

function uploadImage(){
    let imgLink = URL.createObjectURL(inputfile.files[0]);
    imageview.style.backgroundImage = `url(${imgLink})`;
    imageview.textContent = "";
    imageview.style.border = 0;
}

//then nag add rin tayo ng drag n drop function
dropArea.addEventListener("dragover", function(e){
    e.preventDefault();
});

dropArea.addEventListener("drop", function(e){
    e.preventDefault();
    inputfile.files = e.dataTransfer.files;
    uploadImage();
});
