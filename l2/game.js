import { Puzzle } from "./puzzle.js";

var _picture = 'pictures/picture1.jpeg';
var _size = 4;
var canvas;
var puzzle;
var img;
var size_input;


function init() {
    canvas = document.getElementById("puzzle_canvas");
    size_input = document.getElementById("size");
    load_img_into_canvas(_picture, canvas)
    var image = document.getElementById('img');
    var image2 = document.getElementById('img2');
    var image3 = document.getElementById('img3');
    var image4 = document.getElementById('img4');
    var image5 = document.getElementById('img5');
    var image6 = document.getElementById('img6');
    var image7 = document.getElementById('img7');
    var image8 = document.getElementById('img8');
    var image9 = document.getElementById('img9');
    var image10 = document.getElementById('img10');
    var image11 = document.getElementById('img11');
    var image12 = document.getElementById('img12');

    var runButton = document.getElementById("play");


    runButton.onclick = fun;

    image.addEventListener('click', function () { imagee(image); });
    image2.addEventListener('click', function () { imagee(image2); });
    image3.addEventListener('click', function () { imagee(image3); });
    image4.addEventListener('click', function () { imagee(image4); });
    image5.addEventListener('click', function () { imagee(image5); });
    image6.addEventListener('click', function () { imagee(image6); });
    image7.addEventListener('click', function () { imagee(image7); });
    image8.addEventListener('click', function () { imagee(image8); });
    image9.addEventListener('click', function () { imagee(image9); });
    image10.addEventListener('click', function () { imagee(image10); });
    image11.addEventListener('click', function () { imagee(image11); });
    image12.addEventListener('click', function () { imagee(image12); });

    Promise.all([
        loadIMG('pictures/picture1.jpeg', 'img'),
        loadIMG('pictures/picture2.jpg', 'img2'),
        loadIMG('pictures/picture3.jpeg', 'img3'),
        loadIMG('pictures/picture4.jpg', 'img4'),
        loadIMG('pictures/picture5.jpg', 'img5'),
        loadIMG('pictures/picture6.jpg', 'img6'),
        loadIMG('pictures/picture7.jpg', 'img7'),
        loadIMG('pictures/picture8.jpg', 'img8'),
        loadIMG('pictures/picture9.jpg', 'img9'),
        loadIMG('pictures/picture10.jpg', 'img10'),
        loadIMG('pictures/picture11.jpg', 'img11'),
        loadIMG('pictures/picture12.jpg', 'img12'),
    ]).then(function () {
        console.log('Wszystko z równoległej się załadowało!');
    }).catch(function () {
        console.log('Błąd ładowania galerii rownoległej');
    });
}

function loadIMG(url, id) {
    var P = new Promise(function (resolve, reject) {
        var img = new Image();
        img.onload = function () { resolve(url); };
        img.onerror = function () { reject(url); };
        img.src = url;
        document.getElementById(id).src = url;
    }
    );
    return P;
}

function fun() {
    if (size_input.value > 0) {
        _size = size_input.value;
    }
    load_img_into_canvas(_picture, canvas);
}

function imagee(img) {
    var src = img.src;
    let separate = src.split('/');
    _picture = "pictures/" + separate[separate.length - 1];
}

function won_alert() {
    let won = puzzle.the_end();
    if (won === 1) {
        setTimeout(function () {
            alert("You win!")
            fun();
        }, 4000);
    }
}

function click(event) {
    let rect = canvas.getBoundingClientRect()
    let x = event.clientX - rect.left;
    let y = event.clientY - rect.top;
    let coords = puzzle.getTileCoords(x, y);
    if (puzzle.isMovable(coords)) {
        puzzle.slide(puzzle.getTileIndexByCoords(coords));
        puzzle.draw_tiles(canvas);
        won_alert();
    }
}

function mouseMove(event) {
    let rect = canvas.getBoundingClientRect()
    let x = event.clientX - rect.left;
    let y = event.clientY - rect.top;
    let coords = puzzle.getTileCoords(x, y);
    if (puzzle.isMovable(coords)) {
        if (puzzle.highlightt === 0) {
            puzzle.highlight(canvas, coords);
            puzzle.highlightt = 1;
        }
    }
    else {
        puzzle.draw_tiles(canvas);
        puzzle.highlightt = 0;
    }
}

function load(e) {
    canvas.width = img.width;
    canvas.height = img.height;
    puzzle = new Puzzle(_size, img);
    puzzle.draw_tiles(canvas);
    canvas.onclick = function (e) {
        click(e);
    };

    canvas.onmousemove = function (e) {
        mouseMove(e);
    };
}

function load_img_into_canvas(img_path, canvas) {
    img = new Image();
    img.src = img_path;
    img.onload = load;
}

window.onload = init;
