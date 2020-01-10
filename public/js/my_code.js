function createForm() {
    var prodcolor = document.getElementsByName("color-picker")[0].value;
    var pheight = document.getElementsByName("height-picker")[0].value;
    var ph = pheight + "px";
    var pwidth = document.getElementsByName("width-picker")[0].value;
    var pw = pwidth + "px";

    var square = document.createElement("div");
    square.className = 'created-product';
    square.style.backgroundColor = prodcolor;
    square.style.height = ph;
    square.style.width = pw;
    var test = document.getElementsByName("test")[0];
    document.removeChild(test);
    document.getElementsByName("test")[0].appendChild(square);
}
