var state = false;
var menu = document.getElementById('menu');
var toggleBtn = document.getElementById('toggleBtn');

function toggleMenu(curState){
    if(curState == true){
        menu.style.display = 'block';
    }else{
        menu.style.display = 'none';
    }
}

toggleBtn.addEventListener('click', function () {
    if(state == false){
        state = true;
        toggleMenu(state);
    }else{
        state = false;
        toggleMenu(state);
    }
})