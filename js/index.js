

function menu(){
    const menuIco = document.getElementById('menu-ico');

    const menuMain = document.getElementById('menu-main');

    menuIco.addEventListener('click', (e) => {
        menuMain.classList.toggle('menu__active');
    });
}

function inicio(){
    menu();
}

document.addEventListener('DOMContentLoaded', inicio, false);