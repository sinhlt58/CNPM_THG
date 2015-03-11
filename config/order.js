
$(document).ready(function(){

    var changeColor = "blue";

    setInterval(test, 100);

    function test(){
        if (changeColor === "blue"){
            changeColor = "yellow";
        }else{
            changeColor = "blue";
        }
        $('#test').css("background-color", changeColor);
    }
});