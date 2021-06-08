var toggle = document.getElementById('checkBtn');
toggle.onclick = function(){
    var ul = document.getElementById('navBarUl');

    if(ul.style.left === "-100%" || ul.style.left === ""){
        ul.style.left = "0";
        ul.style.transition = ".5s ease";
    }else{
        ul.style.left = "-100%";
        ul.style.transition = ".5s ease";
    }
}