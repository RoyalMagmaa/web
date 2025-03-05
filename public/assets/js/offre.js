
function toggleWishlist(element) {
    if (element.innerHTML === "\u2661") { // Cœur vide
        element.innerHTML = "\u2764"; // Cœur plein
    } else {
        element.innerHTML = "\u2661";
    }
}