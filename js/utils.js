export {menu, searchSubString, titleLinkHome, adminAcces};



function menu(){
    var menuIco, menuMain;
    menuIco = document.getElementById('menu-ico');
    menuMain = document.getElementById('menu-main');
    menuIco.addEventListener('click', (e) => {
        menuMain.classList.toggle('menu__active');
    });
}

function searchSubString(text, subText, index){
    var i, position, num;
    num = index || 0;
    for(position=num; position<=text.length - subText.length; position++){
        i = 0;
        while(i<subText.length && text[position+i] === subText[i]){
            i++;
        }
        if(i === subText.length){
            return position;
        }
    }
    return -1;
}

function titleLinkHome(){
    var title;
    title = document.querySelectorAll('.menu-title');
    title.forEach(btn =>{
        btn.addEventListener('click', ()=>{
            location.href = 'index.php';
        });
    });
}

function adminAcces(){
    var logo;
    logo = document.getElementById('logo-text');
    logo.addEventListener('click', (e) =>{
        location.href = "login.php";
    });
}