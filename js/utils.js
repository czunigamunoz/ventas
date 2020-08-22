export function menu(){
    var menuIco, menuMain;
    menuIco = document.getElementById('menu-ico');
    menuMain = document.getElementById('menu-main');
    menuIco.addEventListener('click', (e) => {
        menuMain.classList.toggle('menu__active');
    });
}

export function searchSubString(text, subText, index){
    console.log(text, subText);
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