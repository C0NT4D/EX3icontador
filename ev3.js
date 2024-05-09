document.addEventListener("DOMContentLoaded", main);

function main() {
    changeColor();
    tamañoDiv();
   
 
}
function changeColor() {
    document.getElementsByTagName('h1').addEventListener("click", function () {
        let texto = document.getElementsByTagName('h1');
        if (texto.style.backgroundColor === "") {
            texto.style.backgroundColor = "blue";
        } else {
            texto.style.backgroundColor = "";
        }
    });
}

    function tamañoDiv() {
        let fontSize = 16;
        let contador = Math.pow(fontSize, 2);
        let content = document.getElementsByTagName('h1');
    
        content.addEventListener("click", function () {
            if (content.style.fontSize === "2em") {
                while (fontSize < contador) {
                    fontSize += 1;
                    content.style.fontSize = fontSize + "px";
                }
    
            } else {
                content.style.fontSize = "2em";
            }
        });
    }


