(function(){

    var color1= document.getElementById("color1");
    color1.addEventListener("input", function() {
        document.getElementById("Option_Name").value = color1.value;
    },false); 


})();