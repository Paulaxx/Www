function myFunction() {
    var x = document.getElementById("dropdown");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function funx(element) {
    element.style.float = "none";
}

function funx2(element) {
    element.style.display = "block";
}

window.addEventListener("load", function noise() {
    var w = window.innerWidth;
    if (w < 1000) {
        const container = document.querySelector("#menu");
        const as = container.querySelectorAll("a");
        as.forEach(funx);

        const container2 = document.querySelector("#dropdown");
        container2.style.display = "none";

        const container3 = document.querySelector("#menu");
        const as3 = container3.querySelectorAll("a");
        as3.forEach(funx2);
    }
});