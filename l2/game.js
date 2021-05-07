import { Puzzle } from "./puzzle.js";

var _picture = 'pictures/picture1.jpeg'
var _size = 4

window.onload = init();

function init() {
    const canvas = document.getElementById("puzzle_canvas");
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

    const exec = () => {
        console.log(_picture);
        //load_img_into_canvas(_picture, canvas);
        _picture = 'pictures/picture2.jpg';
        load_img_into_canvas('pictures/picture2.jpg', canvas);
    };

    document.getElementById("play").removeEventListener('click', exec);
    document.getElementById("play").addEventListener('click', exec);

    /*image.addEventListener('click', function(){imagee(image);});
    image2.addEventListener('click', function(){imagee(image2);});
    image3.addEventListener('click', function(){imagee(image3);});
    image4.addEventListener('click', function(){imagee(image4);});
    image5.addEventListener('click', function(){imagee(image5);});
    image6.addEventListener('click', function(){imagee(image6);});
    image7.addEventListener('click', function(){imagee(image7);});
    image8.addEventListener('click', function(){imagee(image8);});
    image9.addEventListener('click', function(){imagee(image9);});
    image10.addEventListener('click', function(){imagee(image10);});
    image11.addEventListener('click', function(){imagee(image11);});
    image12.addEventListener('click', function(){imagee(image12);});*/
}

function imagee(img){
    var src = img.src;
    let separate = src.split('/');
    _picture = "pictures/" + separate[separate.length-1];
}

function load_img_into_canvas(img_path, canvas) {
    let img = new Image();
    img.src = img_path;
    img.addEventListener("load", () => {
        canvas.width = img.width;
        canvas.height = img.height;
        let puzzle = new Puzzle(_size, img);
        puzzle.draw_tiles(canvas)
        canvas.addEventListener("click", event => {
            let rect = canvas.getBoundingClientRect()
            let x = event.clientX - rect.left;
            let y = event.clientY - rect.top;
            let coords = puzzle.getTileCoords(x, y);
            if (puzzle.isMovable(coords)) {
                puzzle.slide(puzzle.getTileIndexByCoords(coords))
                puzzle.draw_tiles(canvas)
            }
    });
    canvas.addEventListener("mousemove", event => {
        let rect = canvas.getBoundingClientRect()
        let x = event.clientX - rect.left;
        let y = event.clientY - rect.top;
        let coords = puzzle.getTileCoords(x, y);
        if (puzzle.isMovable(coords)) {
            if(puzzle.highlightt === 0){
                puzzle.highlight(canvas, coords);
                puzzle.highlightt = 1;
            }
        }
        else{
            puzzle.draw_tiles(canvas);
            puzzle.highlightt = 0;
        }
    });

    });
}