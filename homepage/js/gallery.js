var prev = document.getElementById("prev");
var next = document.getElementById("next");

var gallery = document.getElementById("gallery");

var imgGallery = new Array(
    "img/gallery/gallery1.jpg",
    "img/gallery/gallery2.JPG",
    "img/gallery/gallery3.jpg",
);
let i = 0;

next.onclick = function() {
    if(i < 2){
        gallery.src = imgGallery[i+1];
        i++;
    }
}

prev.onclick = function() {
    if(i > 0){
        gallery.src = imgGallery[i-1];
        i--;
    }
}

