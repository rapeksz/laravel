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

function disableForms() {
    var select_color = document.getElementById("product-color-one");
    var insert_color = document.getElementById("product-color-two");

    if (select_color.value == "red" || select_color.value == "yellow" || select_color.value == "blue") {
        insert_color.disabled = true;
    }
    else if (insert_color.value !== null) {
        select_color.disabled = true;
    }
    else {
        //
    }

}
