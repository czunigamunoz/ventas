

function menu(){
    var menuIco, menuMain;
    menuIco = document.getElementById('menu-ico');
    menuMain = document.getElementById('menu-main');
    menuIco.addEventListener('click', (e) => {
        menuMain.classList.toggle('menu__active');
    });
}

function btnHome(){
    var btnMobile, btnDesktop;
    btnMobile = document.getElementById('btnMobile');
    btnDesktop = document.getElementById('btnDesktop');
    [btnMobile, btnDesktop].forEach( btn.addEventListener('click', ()=>{
        
    }));
}

function start(){
    menu();
    /* btnHome(); */
}

document.addEventListener('DOMContentLoaded', start, false);