function myMove() {
    var elem = document.getElementById("textinimage");
    var pos = 400;
    var id = setInterval(frame, 20);

    function frame() {
        if (pos == 450) {
            clearInterval(id);
        } else {
            pos++;
            elem.style.right = pos + "px";
        }
    }
}
